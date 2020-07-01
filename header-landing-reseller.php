<?php

/**
 * Header file
 *
 * @package     WordPress
 * @subpackage  RST v3
 * @since       1.0.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="landing-wrapper">
        <header class="header">
        <div class="fullscreen-menu">
                    <ul>
                                <li><a href="#advantages">Advantages</a></li>
                                <li><a href="#product">VIRTUCLEAN  2.0</a></li>
                                <li><a href="#accessories">ACCESSORIES </a></li>
                                <li><a href="#quantity">PRICES</a></li>
                                <li><a href="#sanitizers">COMPARE</a></li>
                                <li><a href="#video">VIDEO </a></li>
                                <li><a href="#reviews">FEEDBACKS </a></li>
                                <li><a href="#form">Contacts</a></li>
                            </ul>
                </div>
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/dist/img/logo.png" alt="">
                    </div>
                    <div class="col-10">
                        <nav id="menu">
                            <ul>
                                <li><a href="#advantages">Advantages</a></li>
                                <li><a href="#product">VIRTUCLEAN  2.0</a></li>
                                <li><a href="#accessories">ACCESSORIES </a></li>
                                <li><a href="#quantity">PRICES</a></li>
                                <li><a href="#sanitizers">COMPARE</a></li>
                                <li><a href="#video">VIDEO </a></li>
                                <li><a href="#reviews">FEEDBACKS </a></li>
                                <li><a href="#form">Contacts</a></li>
                            </ul>
                        </nav>
                        <div class="burger">
							<span></span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>




