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

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<?php wp_head(); ?>

	<script type="text/javascript">
	    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	    console.log(ajaxurl);
	</script>
    </head>

    <body <?php body_class(); ?>>


	<main id="main" class="site-main">
	    <header class="virtuclean-header <?php if (!is_front_page()) {
	    echo 'page_bg';
	} ?>">
		<?php
		$top_popaps = get_field('top_popaps', 'option');
		?>
		<div class="save-popap-top">
		    <span class="close-popap"><i class="fas fa-times"></i></span>
		    <!--<a class="btn_link" href="">RESELLER ENQUIRIES</a>-->
		    <div class="desctop">
<?php echo $top_popaps['content_desctop']; ?>
		    </div>
		    <div class="mobile">
		    <?php echo $top_popaps['mobile_content']; ?>
		    </div>
		    <?php
		    $id_product = get_field('main_product', 'options');
		    if (isset($id_product)) :
			?>
    		    <a href="<?php echo home_url('/checkout/?add-to-cart=' . $id_product . '&quantity=1'); ?>"><?php echo get_field('header_name_bottom', 'option'); ?></a>
<?php endif; ?>
		</div>
		<nav class="header-container" role="navigation">
		    <div class="logo">
			<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
			    <img src="<?php echo get_field('image_logo', 'option'); ?>" alt="Logo" width="180px" height="41px" class="virtuclean-logo-img"/>
			</a>
		    </div>

		    <div class="head_righ">
			<!--				<div class="old-version">-->
			<!--					<span>Old version</span>-->
			<!--					<a href="--><?php //echo get_field('link_old_version','option'); ?><!--" target="_blank"><span>--><?php //echo get_field('title_old_header','option'); ?><!--</span> --><?php //echo get_field('name_product_header','option'); ?><!--</a>-->
			<!--				</div>-->
			<div class="head-lang">
			    <a href="#site_type" class="site_type" style="margin-right: 7px;">
				<img src="/wp-content/uploads/2019/10/EU.png" alt="" width="30" height="25" style="object-fit: contain">
			    </a>
			    <a href="#site_type" class="site_type" >
				<img src="/wp-content/uploads/2019/09/flag-velikobritanii.png" alt="" width="30" height="25" style="object-fit: contain">
			    </a>
			</div>
			<div class="header-phone">
			    <a href="tel:<?php echo get_field('number_phone', 'option'); ?>"><?php echo get_field('number_phone', 'option'); ?></a>
			</div>
			<div class="head-get-in-touch">
			    <?php
			    $id_product = get_field('main_product', 'options');
			    if (isset($id_product)) :
				?>
    			    <a href="<?php echo home_url('/checkout/?add-to-cart=' . $id_product . '&quantity=1'); ?>" class="btn_get_in_touch"><?php echo get_field('header_name_bottom', 'option'); ?></a>
<?php endif; ?>
			</div>
			<div class="head-mobile">
			    <span>menu</span>
			</div>
		    </div>
		    <?php if (!is_cart() AND ! is_checkout()): ?>
    		    <div class="pp_mobile_all" style="display: none!important">
    			<div class="pp_mobile_all__img">
    			    <img src="/wp-content/uploads/2019/07/High-resolution-pic_0401-1.png" alt="">
    			</div>
			    <?php
			    $id_product = get_field('main_product', 'options');
			    $args = array(
				'post_type' => 'product',
				'p' => $id_product
			    );
			    $loop = new WP_Query($args);
			    while ($loop->have_posts()) : $loop->the_post();
				global $product;
				?>
	                        <div class="pp_mobile_all__content">
	                            <h2><?php echo get_the_title() ?></h2>
	                            <p class="price">
	                                Only <span class="price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
	                                <span class="price_numb"><?php echo $product->get_price(); ?></span>
	                            </p>
	                        </div>
				<?php
			    endwhile;
			    wp_reset_query();
			    ?>
    		    </div>
		    <?php endif; ?>
		    <div class="my-head-cart my-head-cart<?php echo WC()->cart->get_cart_contents_count() ?>">

			<a class="a-cart"  href="<?php echo wc_get_cart_url(); ?>">
			    <div class="cart-contents" >
				<img src="<?php echo get_template_directory_uri(); ?>/../../uploads/2019/05/shopping-bag.png" alt="Logo" width="21px" height="25px" class="virtuclean-logo-img"/>
				<span class="header-cart-count">0</span>
			    </div>
			</a>
		    </div>
		</nav>
		<div class="menu_box">
		    <?php
		    $id_product = get_field('main_product', 'options');
		    if (isset($id_product)) :
			?>
    		    <a href="<?php echo home_url('/checkout/?add-to-cart=' . $id_product . '&quantity=1'); ?>" class="btn_get_in_touch"><?php echo get_field('header_name_bottom', 'option'); ?></a>
		    <?php endif; ?>
		    <span>Menu</span>
		    <?php wp_nav_menu(array('container' => false, 'menu' => 'Header menu')); ?>
		    <div class="mobile-contact">
			<div class="head-lang" style="padding-top: 7px;">
			    <a href="#site_type" class="site_type" style="margin-right: 7px;">
				<img src="/wp-content/uploads/2019/10/EU.png" alt="" width="30" height="25" style="object-fit: contain">
			    </a>
			    <a href="#site_type" class="site_type" >
				<img src="/wp-content/uploads/2019/09/flag-velikobritanii.png" alt="" width="30" height="25" style="object-fit: contain">
			    </a>
			</div>
			<div class="header-phone">
			    <a style="padding: 0;" href="tel:<?php echo get_field('number_phone', 'option'); ?>"><?php echo get_field('number_phone', 'option'); ?></a>
			</div>
		    </div>
		</div>

	    </header>




