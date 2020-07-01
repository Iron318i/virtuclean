<?php

/**
 * Header file
 *
 * @package     WordPress
 * @subpackage  RST v3
 * @since       1.0.0
 * @author      Serhii Sokol
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
        $header_landing = get_field('header_landing');
        $product_id = get_field('main_product', 'options');
    ?>
<main id="main" class="site-main">
    <div id="site_type" class="syte_type mfp-hide">
        <h3>For international orders click here</h3>
        <br>
        <a href="https://virtuclean.co.uk/" class="USA">
            <img src="/wp-content/uploads/2019/10/EU.png" alt="">
        </a>
        <a href="https://virtuclean.co.uk/" class="EU">
            <img src="/wp-content/uploads/2019/09/flag-velikobritanii.png" alt="">
        </a>
    </div>
        <header  class="landing__header">
            <div class="l__logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src=" <?php echo $header_landing['logo']; ?>" alt="Logo" width="107px" height="52px"/>
                </a>
            </div>
            <nav role="navigation" class="l__menu">
                    <a href="#l_about">About</a>
                    <a href="#l_features">Product Features</a>
                    <a href="#l_video">HOW TO USE</a>
                    <a href="#l_reviews">Reviews</a>
                    <a href="#landing_faq">FAQ</a>

<!--                    <a href="#l_contact">Contacts</a>-->
                     <a href="#site_type" class="site_type">
                        <img src="/wp-content/uploads/2019/10/EU.png" alt="" width="25" height="25" style="object-fit: contain">
                    </a>
                    <a href="#site_type" class="site_type" >
                        <img src="/wp-content/uploads/2019/09/flag-velikobritanii.png" alt="" width="25" height="25" style="object-fit: contain">
                    </a>
            </nav>
            <div class="l_righ">
                <div class="head-lang">
                    <a href="#site_type" class="site_type" style="margin-right: 7px;">
                        <img src="/wp-content/uploads/2019/10/EU.png" alt="" width="25" height="25" style="object-fit: contain">
                    </a>
                    <a href="#site_type" class="site_type" >
                        <img src="/wp-content/uploads/2019/09/flag-velikobritanii.png" alt="" width="25" height="25" style="object-fit: contain">
                    </a>
                </div>
                <div class="l_head_phone">
                    <a href="tel:<?php echo $header_landing['phone']; ?>"><?php echo $header_landing['phone']; ?></a>
                </div>
                <div class="l_order_now">
                    <a href="/cart/?add-to-cart=<?php echo $product_id; ?>"><?php echo $header_landing['link_name']; ?></a>
                </div>
                <div class="l_btn_menu"></div>
            </div>

        </header>




