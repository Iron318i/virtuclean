<?php

/**
 * Load scripts and styles
 *
 * @link        http://developer.wordpress.org/reference/functions/wp_enqueue_script
 * @link        http://wp-kama.ru/function/wp_enqueue_script
 *
 * @package     WordPress
 * @subpackage  RST v3
 * @since       1.0.0
 * @author      Serhii Sokol
 */
function cart_script_disabled() {
    wp_dequeue_script('wc-cart');
}

add_action('wp_enqueue_scripts', 'cart_script_disabled');

function rst_load_assets() {
    //Load scripts and styles only for frontend

    if (!is_admin()) {

	//jQuery
	wp_deregister_script('jquery');

	wp_register_script('jquery', get_template_directory_uri() . '/assets/dist/vendor/jquery.min.js', VIRTUCLEAN_THEME_VERSION, true);

	// Styles
	wp_enqueue_style('popap-style', get_template_directory_uri() . '/assets/dist/vendor/magnific-popup.css', VIRTUCLEAN_THEME_VERSION);
	wp_enqueue_style('app', get_template_directory_uri() . '/assets/dist/css/app.min.css', VIRTUCLEAN_THEME_VERSION);
	wp_enqueue_style('landing-reseller', get_template_directory_uri() . '/assets/dist/css/landing-reseller-style.css', VIRTUCLEAN_THEME_VERSION);
	#TODO Rework
	wp_enqueue_style('app_default_etyle', get_template_directory_uri() . '/style.css', VIRTUCLEAN_THEME_VERSION);

	// Scripts
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/dist/vendor/owl.carousel.min.js', array('jquery'), VIRTUCLEAN_THEME_VERSION, true);
	wp_enqueue_script('popap', get_template_directory_uri() . '/assets/dist/vendor/magnific-popup.min.js', array('jquery'), VIRTUCLEAN_THEME_VERSION, true);
	wp_enqueue_script('sticky-sidebar', get_template_directory_uri() . '/assets/dist/vendor/jquery.sticky-sidebar.min.js', array('jquery'), VIRTUCLEAN_THEME_VERSION, true);
	wp_enqueue_script('app', get_template_directory_uri() . '/assets/dist/js/app.min.js', array('jquery', 'owl-carousel'), VIRTUCLEAN_THEME_VERSION, true);
	wp_enqueue_script('reseller-page', get_template_directory_uri() . '/assets/dist/js/main.js', array('jquery'), VIRTUCLEAN_THEME_VERSION, true);
	wp_enqueue_script('slick-page', get_template_directory_uri() . '/assets/dist/js/slick.js', array('jquery'), VIRTUCLEAN_THEME_VERSION, true);
	wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/assets/dist/vendor/jquery.cookie.js', array('jquery', 'owl-carousel'), VIRTUCLEAN_THEME_VERSION, true);


	wp_enqueue_script('ajax-script', get_template_directory_uri() . '/virtuclean_ajax.js', array('jquery'), VIRTUCLEAN_THEME_VERSION, true);
	wp_localize_script('ajax-script', 'myajax', array(
	    'url' => admin_url('admin-ajax.php')
		)
	);
    }
}

add_action('wp', 'rst_load_assets');
