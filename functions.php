<?php
global $wp_query;

/**
 * Require ACF configs
 */
require_once 'inc/acf.php';

/**
 * Init scripts and styles
 */
require_once 'inc/init.php';

/**
 * breadcrumbs
 */
require_once 'inc/breadcrumb.php';

/**
 * Post types
 */
require_once 'inc/post-types/index.php';

/**
 * Email generator
 */
//require_once 'inc/email_generator/acf_fields.php';
require_once 'inc/email_generator/email_templates_generator.php';
require_once 'inc/email_generator/email_templates_render.php';


/**
 * Define theme constants
 */
define('VIRTUCLEAN_THEME_VERSION', 0.1);

show_admin_bar(false);

/**
 * setup
 */
function virtuclean_setup() {
    register_nav_menus(array(
	'top' => 'Top menu',
    ));

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'virtuclean_setup');

/**
 * Function, that require svg-file and return or print it
 *
 * @param string $filename - file name excluding file extension
 * @param bool $return - true == include file || false == return path
 * @param bool $content - returns SVG inner content
 * @param string $dir - if svg files directory not eq. "svg" - set target directory related to theme root
 *
 * @return string/void
 *
 * @since       1.0.0
 * @author      Serhii Sokol
 */
function svg($filename, $return = false, $content = true, $dir = 'assets/dist/svg') {
    $dir = mb_substr($dir, 0, 1) == '/' ? mb_substr($dir, 1, mb_strlen($dir)) : $dir;
    $dir = mb_substr($dir, -1, 1) == '/' ? mb_substr($dir, 0, mb_strlen($dir) - 1) : $dir;
    $path = get_template_directory() . '/' . $dir . '/' . $filename . '.svg';

    if ($return == false) {
	@require $path;
    } else {
	if ($content = true) {
	    return file_get_contents($path);
	} else {
	    return $path;
	}
    }
}

function svg_media_uploads($src) {
    echo '<img src="' . $src . '" />';
}

show_admin_bar(false);

/**
 * dev_lyuda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package virtuclean
 */
if (!function_exists('virtuclean_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function virtuclean_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sleeptest, use a find and replace
	 * to change 'sleeptest' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('virtuclean', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	// register_nav_menus( array(
	// 	'menu-1' => esc_html__( 'Primary', 'sleeptest' ),
	// ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
	    'search-form',
	    'comment-form',
	    'comment-list',
	    'gallery',
	    'caption',
	));

	// add_post_type_support('post', 'excerpt');
	// Set up the WordPress core custom background feature.
	add_theme_support('custom-background', apply_filters('virtuclean_custom_background_args', array(
	    'default-color' => 'ffffff',
	    'default-image' => '',
	)));

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support('custom-logo', array(
	    'height' => 250,
	    'width' => 250,
	    'flex-width' => true,
	    'flex-height' => true,
	));
    }

endif;
add_action('after_setup_theme', 'virtuclean_setup');

function register_my_menu() {
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_menu');


/**
 * Declare WooCommerce support
 */
add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support() {
    add_theme_support('woocommerce');
}

add_filter('woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments');

function iconic_cart_count_fragments($fragments) {
    ob_start();
    ?>
    <span class="header-cart-count"><?php
	$count = WC()->cart->get_cart_contents_count();
	echo $count;
	?></span>
    <?php
    $fragments['.header-cart-count'] = ob_get_clean();
    return $fragments;
}

// widget FOOTER
function true_register_wp_sidebars() {

    register_sidebar(
	    array(
		'id' => 'footer_menu_first',
		'name' => 'Footer Widget 1',
		'description' => 'Add widgets here.',
		'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	    )
    );
}

add_action('widgets_init', 'true_register_wp_sidebars');

// add theme options
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
	'page_title' => 'Theme Options',
	'menu_title' => 'Theme Options',
	'menu_slug' => 'virtuclean-general-settings',
	'capability' => 'edit_posts',
	'redirect' => false
    ));
}

// product gallery
function virtuclean_get_gallery_image_template($attachment_id, $main_image = false) {

    $image_size = apply_filters('woocommerce_gallery_full_size', apply_filters('woocommerce_product_thumbnails_large_size', 'large'));
    $image = wp_get_attachment_image(
	    $attachment_id, $image_size, false, apply_filters(
		    'woocommerce_gallery_image_html_attachment_image_params', array(
	'title' => _wp_specialchars(get_post_field('post_title', $attachment_id), ENT_QUOTES, 'UTF-8', true),
	'data-caption' => _wp_specialchars(get_post_field('post_excerpt', $attachment_id), ENT_QUOTES, 'UTF-8', true),
	'data-src' => esc_url($full_src[0]),
	'data-large_image' => esc_url($full_src[0]),
	'data-large_image_width' => esc_attr($full_src[1]),
	'data-large_image_height' => esc_attr($full_src[2]),
	'class' => esc_attr($main_image ? 'wp-post-image' : ''),
		    ), $attachment_id, $image_size, $main_image
	    )
    );
    return $image;
}

/*
 * Changing the minimum quantity to 2 for all the WooCommerce products
 */

function woocommerce_quantity_input_min_callback($min, $product) {
    $min = 1;
    return $min;
}

add_filter('woocommerce_quantity_input_min', 'woocommerce_quantity_input_min_callback', 10, 2);

/**
 * Override loop template and show quantities next to add to cart buttons
 */
add_filter('woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2);

function quantity_inputs_for_woocommerce_loop_add_to_cart_link($html, $product) {
    $label_quantity = get_field('title_quantity', 'option');
    $label_add_to_cart = get_field('title_add_to_cart', 'option');
    if ($product && $product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock() && !$product->is_sold_individually()) {
	$html = '<form action="' . esc_url($product->add_to_cart_url()) . '" class="cart" method="post" enctype="multipart/form-data">';
	//$html .= '<div class="quantity_box"><span class="title">'.$label_quantity.'</span><div class="product_qty_custom"><div class="product_qty_symbol"><span class="product_qty_plus">+</span><span class="product_qty_minus">-</span></div>'.woocommerce_quantity_input( array(), $product, false ).'</div></div>';
	$html .= '<div class="add_c_box"><button type="submit" class="button btn_add_to_cart"><img src="/wp-content/themes/virtuclean/../../uploads/2019/05/shopping-bag.png" alt="add_to_cart" class="add-to-cart-img"></button></div>';
	$html .= '</form>';
    }
    return $html;
}

add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_cart');

function redirect_to_cart($redirect_url) {
    global $woocommerce;
    $redirect_url = wc_get_cart_url();
    return $redirect_url;
}

//Chanche order biling adress
add_filter("woocommerce_checkout_fields", "virtuclean_custom_override_checkout_fields", 1);

function virtuclean_custom_override_checkout_fields($fields) {
    $fields['billing']['billing_phone']['priority'] = 3;
    $fields['billing']['billing_email']['priority'] = 4;
    unset($fields['billing']['billing_company']);
    return $fields;
}

add_filter('woocommerce_default_address_fields', 'virtuclean_custom_override_default_locale_fields');

function virtuclean_custom_override_default_locale_fields($fields) {
    $fields['first_name']['priority'] = 1;
    $fields['last_name']['priority'] = 2;
    $fields['country']['priority'] = 5;
    $fields['city']['priority'] = 6;
    $fields['state']['priority'] = 7;
    $fields['address_1']['priority'] = 8;

    $fields['postcode']['priority'] = 9;
    unset($fields['order']['order_comments']);


    return $fields;
}

add_action('wp_ajax_test', 'test');
add_action('wp_ajax_nopriv_test', 'test');

function test() {
    echo "test";
    die();
}

//gift virtuclean Wipes
add_action('wp_ajax_gift_product_wipes', 'gift_product_wipes');
add_action('wp_ajax_nopriv_gift_product_wipes', 'gift_product_wipes');

function gift_product_wipes() {

    global $woocommerce;

    function is_product_in_cart() {
	global $woocommerce;
	$product_id = 125;
	foreach ($woocommerce->cart->get_cart() as $cart_item) {
	    $product_in_cart = $cart_item['product_id'];
	    if ($product_in_cart === $product_id) {
		return true;
	    }
	}

	return false;
    }

    function is_pillow_in_cart() {
	global $woocommerce;
	$product_id = 1109;
	foreach ($woocommerce->cart->get_cart() as $cart_item) {
	    $product_in_cart = $cart_item['product_id'];
	    if ($product_in_cart === $product_id) {
		return true;
	    }
	}

	return false;
    }

    function is_wipes_in_cart() {
	global $woocommerce;
	$product_id = 1110;
	foreach ($woocommerce->cart->get_cart() as $cart_item) {
	    $product_in_cart = $cart_item['product_id'];
	    if ($product_in_cart === $product_id) {
		return true;
	    }
	}

	return false;
    }

    if ($woocommerce->cart->get_cart_contents_count() == 0) {
	$woocommerce->cart->add_to_cart(125, 1, 0, array(), array());
	$woocommerce->cart->add_to_cart(1110, 1, 0, array(), array());
    }

    if (!is_product_in_cart()) {
	$woocommerce->cart->add_to_cart(125, 1, 0, array(), array());
    }
    if (!is_pillow_in_cart() && !is_wipes_in_cart()) {
	$woocommerce->cart->add_to_cart(1110, 1, 0, array(), array());
    }


    die();
}

//gift virtuclean pillow
add_action('wp_ajax_gift_product_pillow', 'gift_product_pillow');
add_action('wp_ajax_nopriv_gift_product_pillow', 'gift_product_pillow');

function gift_product_pillow() {


    global $woocommerce;
    global $product;
    $product_id = 125;
    $quantity = 1;

    function is_product_in_cart() {
	global $woocommerce;
	$product_id = 125;
	foreach ($woocommerce->cart->get_cart() as $cart_item) {
	    $product_in_cart = $cart_item['product_id'];
	    if ($product_in_cart === $product_id) {
		return true;
	    }
	}

	return false;
    }

    function is_pillow_in_cart() {
	global $woocommerce;
	$product_id = 1109;
	foreach ($woocommerce->cart->get_cart() as $cart_item) {
	    $product_in_cart = $cart_item['product_id'];
	    if ($product_in_cart === $product_id) {
		return true;
	    }
	}

	return false;
    }

    function is_wipes_in_cart() {
	global $woocommerce;
	$product_id = 1110;
	foreach ($woocommerce->cart->get_cart() as $cart_item) {
	    $product_in_cart = $cart_item['product_id'];
	    if ($product_in_cart === $product_id) {
		return true;
	    }
	}

	return false;
    }

    if ($woocommerce->cart->get_cart_contents_count() == 0) {
	$woocommerce->cart->add_to_cart(125, 1, 0, array(), array());
	$woocommerce->cart->add_to_cart(1109, 1, 0, array(), array());
    }

    if (!is_product_in_cart()) {
	$woocommerce->cart->add_to_cart(125, 1, 0, array(), array());
    }
    if (!is_pillow_in_cart() && !is_wipes_in_cart()) {
	$woocommerce->cart->add_to_cart(1109, 1, 0, array(), array());
    }

    echo 'pillow';
    die();
}

//gift remove in cart
add_action('wp_ajax_gift_remove', 'gift_remove');
add_action('wp_ajax_nopriv_gift_remove', 'gift_remove');

function gift_remove() {

    function remove_all() {
	global $woocommerce;


	$product_id = 125;
	foreach ($woocommerce->cart->get_cart() as $cart_item) {
	    $product_in_cart = $cart_item['product_id'];
//            if ( $product_in_cart == $product_id ) {
	    //filter
	    $wipes_id = 1110;
	    foreach ($woocommerce->cart->get_cart() as $wipes_cart_iitem) {
		$wipes_in_cart1 = $wipes_cart_iitem['product_id'];
		if ($wipes_in_cart1 == $wipes_id) {
		    $wipesId = $woocommerce->cart->generate_cart_id($wipes_in_cart1);
		    $wipesItemKey = $woocommerce->cart->find_product_in_cart($wipesId);
		    $woocommerce->cart->remove_cart_item($wipesItemKey);
		    var_dump("removwipes");
		}
	    }

	    //pillow
	    $pillow_id = 1109;
	    foreach ($woocommerce->cart->get_cart() as $cart_item_pillow) {
		$pillow_in_cart = $cart_item_pillow['product_id'];
		if ($pillow_in_cart == $pillow_id) {
		    $pillowId = $woocommerce->cart->generate_cart_id($pillow_in_cart);
		    $pillowItemKey = $woocommerce->cart->find_product_in_cart($pillowId);
		    $woocommerce->cart->remove_cart_item($pillowItemKey);
		    var_dump("pill");
		}
	    }


	    //product
	    $productId = $woocommerce->cart->generate_cart_id($product_id);
	    $productItemKey = $woocommerce->cart->find_product_in_cart($productId);
	    $woocommerce->cart->remove_cart_item($productItemKey);

	    var_dump("product");

	    return true;
	    //  }
	}

	return false;
    }

    $test = remove_all();
    var_dump($test);

    die();
}

// free  pack of travel wipes
add_action('woocommerce_checkout_before_order_review', 'travel_apply_coupons');
add_action('woocommerce_before_cart', 'travel_apply_coupons');

function travel_apply_coupons() {

    $coupon_code = 'WIPES';

    if (WC()->cart->has_discount($coupon_code)) {
	if (WC()->cart->get_cart_contents_count() >= 1) {
	    WC()->cart->add_to_cart(1953, 1, 0, array(), array());
	}
    } else {
	$productId = WC()->cart->generate_cart_id(1953);
	$productItemKey = WC()->cart->find_product_in_cart($productId);
	WC()->cart->remove_cart_item($productItemKey);
    }
}

// free  pack of travel wipes
add_action('woocommerce_checkout_before_order_review', 'brandWipes80_apply_coupons');
add_action('woocommerce_before_cart', 'brandWipes80_apply_coupons');

function brandWipes80_apply_coupons() {

    $coupons_code_VTXMAR = 'VTXMAR';
    $coupons_code_VTCXID = 'VTCXID';
    $coupons_code_VTXVIP = 'VTXVIP';

    if (WC()->cart->has_discount($coupons_code_VTXMAR) || WC()->cart->has_discount($coupons_code_VTCXID) || WC()->cart->has_discount($coupons_code_VTXVIP)) {
	if (WC()->cart->get_cart_contents_count() >= 1) {
	    WC()->cart->add_to_cart(1110, 1, 0, array(), array());
	}
    } else {
	$productId = WC()->cart->generate_cart_id(1110);
	$productItemKey = WC()->cart->find_product_in_cart($productId);
	WC()->cart->remove_cart_item($productItemKey);
    }
}

//show only one delivery method
add_filter('woocommerce_package_rates', 'wc_hide_shipping_when_free_is_available', 10, 2);

function wc_hide_shipping_when_free_is_available($rates) {
    $free = array();
    foreach ($rates as $rate_id => $rate) {
	if ('free_shipping' === $rate->method_id) {
	    $free[$rate_id] = $rate;
	    break;
	}
    }
    return !empty($free) ? $free : $rates;
}

//free product in 10 minutes
add_action('woocommerce_before_cart_totals', 'set_cookie_before_cart');

function set_cookie_before_cart() {

    $var = WC()->cart->get_cart_hash();
    $value = time() + (60 * 10);
    //setcookie("woocomerse_items_changes", $var, $value, '/');
    if ($_COOKIE['woocomerse_items_changes'] != $var) {
	setcookie("timer_order", $value, $value, '/');
    }
    if (!isset($_COOKIE['woocommerce_items_in_cart'])) {
	unset($_COOKIE['woocomerse_items_changes']);
	setcookie("woocomerse_items_changes", "", time() - 300, "/");
    }
}

add_action('woocommerce_cart_is_empty', 'clear_timer_cookie');

function clear_timer_cookie() {
    if (!isset($_COOKIE['woocommerce_items_in_cart'])) {
	unset($_COOKIE['woocomerse_items_changes']);
	setcookie("woocomerse_items_changes", "", time() - 300, "/");

	unset($_COOKIE['timer_order']);
	setcookie("timer_order", "", time() - 300, "/");
    }
}

add_action('woocommerce_thankyou', 'clear_timer_cookie_thankyou_page');

function clear_timer_cookie_thankyou_page() {

    if (!isset($_COOKIE['woocommerce_items_in_cart'])) {
	unset($_COOKIE['woocomerse_items_changes']);
	setcookie("woocomerse_items_changes", "", time() - 300, "/");

	unset($_COOKIE['timer_order']);
	setcookie("timer_order", "", time() - 300, "/");
    }
}

//only one applied coupon
add_action('woocommerce_before_calculate_totals', 'one_applied_coupon_only', 10, 1);

function one_applied_coupon_only($cart) {
    if (is_admin() && !defined('DOING_AJAX'))
	return;

    if (did_action('woocommerce_before_calculate_totals') >= 2)
	return;

    // For more than 1 applied coupons only
    if (sizeof($cart->get_applied_coupons()) > 1 && $coupons = $cart->get_applied_coupons()) {
	// Remove the first applied coupon keeping only the last appield coupon
	$cart->remove_coupon(reset($coupons));
    }
}

remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
get_template_part('functions-dev');

