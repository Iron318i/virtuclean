<?php

add_action( 'admin_enqueue_scripts', 'admin_assets' );
function admin_assets(){
    wp_enqueue_style('theme-admin-style', get_template_directory_uri() . '/inc/email_generator/admin_style.css');
    wp_enqueue_script('theme-admin-script', get_template_directory_uri() .'/inc/email_generator/admin_script.js');
    wp_localize_script( 'theme-admin-script', 'backajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'ajax-example-nonce' ) ,
        //"permalink" => get_post_permalink($post),
    ));
}

add_action('init', 'create_email_generator' );
function create_email_generator(){
    register_post_type('email_generator', 
        array(
        'labels' => array(
            'name'          => __('Email Generator'), 
            'singular_name' => __('Email Generator'),
        ),
        'public'        => true,
        'exclude_from_search' => true,
        'menu_icon'     => 'dashicons-welcome-widgets-menus',
        'taxonomies'    => array(),
        'hierarchical'  => true, 
        'has_archive'   => false,
        'supports'      => array('title',
                                 'editor',
                                 'thumbnail'
                                ), 
    ));
}

add_action('init', 'create_email_tax');
function create_email_tax(){
	// заголовки
	$labels = array(
		'name'              => 'Newsletter Type',
		'singular_name'     => 'Newsletter Type',
	); 
	$args = array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => $labels,
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => 'post_categories_meta_box', // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
	);
	register_taxonomy('emails_types', array( 'email_generator' ), $args );
}

// Add button for generate html code for emails
add_action('add_meta_boxes', 'add_your_meta_box'); 
function add_your_meta_box(){
    add_meta_box('your-metabox-id', 'Generate Email Code', 'function_of_metabox', 'email_generator', 'side', 'high');
}  
function function_of_metabox(){
    ?>
        <input type="button" class="button button-primary button-large" value="Generate Code" id="generate-email-code"/>
    <?php 
}


// Add modal for display html code
add_action('add_meta_boxes', 'add_custom_meta_box', 'email_generator');
function add_custom_meta_box($post_type) {
    if ($post_type == 'email_generator') {
        ?>
        <div id="email_generator_modal" class="email_generator_modal">
            <div class="email_generator_modal_close">X</div>
            <div class="email_generator_modal_loader">
            <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                <path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
                <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                    C22.32,8.481,24.301,9.057,26.013,10.047z">
                    <animateTransform attributeType="xml"
                    attributeName="transform"
                    type="rotate"
                    from="0 20 20"
                    to="360 20 20"
                    dur="0.5s"
                    repeatCount="indefinite"/>
                    </path>
                </svg>
            </div>

            <textarea name="email_generator_inner_content" class="email_generator_inner_content" id="email_generator_inner_content"></textarea>

        </div>
        <?php
    }
}

// Ajax render html template
add_action( 'wp_ajax_render_template', 'render_template_via_ajax' );
add_action( 'wp_ajax_nopriv_render_template', 'render_template_via_ajax' );
function render_template_via_ajax(){
    $c_id = $_POST['post_id'];
    
    if ( isset($c_id) && !empty($c_id) ) {
        // Check post tax
        $tax = get_the_terms( $c_id, 'emails_types' );  
            if ($tax[0]->slug == 'email-week'){
                // get acf fields from this post
                $email_fields   = get_fields($c_id);
                $render_code    = render_weekly( $email_fields );
                echo json_encode( array('html'   => $render_code,
                                        'status' => 200) );
                die();
            }
            elseif ( $tax[0]->slug == 'email-blog'){
                // get acf fields from this post
                $email_fields   = get_fields($c_id);
                $render_code    = render_blog( $email_fields );
                echo json_encode( array('html'   => $render_code,
                                        'status' => 200) );
                die();
            }
            else{
                #error
                echo json_encode( array('status' => 400 ) );
                die(); 
            }


        // Finish him
        echo json_encode( array('status' => $tax  ) );
        //echo json_encode( array('status' => 200 ) );
        die();
    }
    else{
        echo json_encode( array('status' => 400 ) );
        die(); 
    }

	echo json_encode( array('response' => $c_id ) );
	die();	
}

?>