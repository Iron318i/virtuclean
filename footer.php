<?php
/**
 * Footer template
 *
 * @package     WordPress
 * @subpackage  RST v3
 * @since       1.0.0
 * @author      Serhii Sokol
 */
?>

<footer class="footer">
    <div class="container">
	<div class="row footer_wrap">
	    <div class="col-xl-6 col-lg-4">
		<?php if (is_active_sidebar('footer_menu_first')) : ?>
    		<div id="footer_menu_first" class="footer_menu_first footer_item">
			<?php dynamic_sidebar('footer_menu_first'); ?>
    		</div>
		<?php endif; ?>
	    </div>
	    <div class="col-xl-3 col-lg-4">
		<div class="footer_get_in_touch">
		    <h3 class="footer_title"><?php echo get_field('title_get_in_touch', 'option'); ?> </h3>
		    <div class="footer_text">
			<p><?php echo get_field('get_in_touch_content', 'option'); ?></p>
			<?php
			$search = array(' ', '(', ')', '-');
			$replace = array('');
			$subject = get_field('number_phone', 'option');
			$tel_href = str_replace($search, $replace, $subject);
			?>
			<a href="tel:<?php echo $tel_href; ?>"><?php echo get_field('number_phone', 'option'); ?></a>
		    </div>

                    <a class="btn_link" href="/want-to-become-a-virtuclean-reseller">Reseller Enquiries</a>
		</div>
	    </div>
	    <div class="col-xl-3 col-lg-4">
		<div class="footer_newsletter">
		    <h3 class="footer_title"><?php echo get_field('title_newsletter', 'option'); ?></h3>
		    <div class="footer_text">
			<?php
			$cf = get_field('contact_newslatter', 'option');
			if (isset($cf[0])) :
			    ?>
			    <?php echo do_shortcode('[contact-form-7 id="' . $cf[0] . '" title="Newsletter"]'); ?>
			<?php endif; ?>
			<ul class="footer_network">
			    <li><a href="<?php echo get_field('link_facebook', 'option'); ?>"><i
					class="fi flaticon flaticon-021-facebook"></i></a></li>
			    <li><a href="<?php echo get_field('link_instagram', 'option'); ?>"><i
					class="fi flaticon flaticon-025-instagram"></i></a></li>
			    <li><a href="<?php echo get_field('link_to_twitter', 'option'); ?>"><i
					class="fi flaticon flaticon-043-twitter"></i></a></li>
			</ul>
		    </div>
		</div>
	    </div>
	    <div class="col-12" style="opacity: 0; height: 0;">
                <p style="color: #00a500" id="demo"></p>
                <p style="color: #00a500"><span data-minutes></span> minutes <span data-seconds></span>seconds</p>
            </div>
	</div>
    </div>
    <div class="copyright">
	<div class="container">
	    <div class="row">
		<div class="col-12 ">
		    <?php echo get_field('footer_bottom_information', 'option'); ?>
		</div>
	    </div>
	</div>
    </div>
</footer>
<?php
//$qwe = get_queried_object();
//var_dump($qwe);
if (is_front_page()):
    ?>
    <div id="popap-promo" class="home_popap">
        <div class="home_popap__img">
    	<img src="/wp-content/uploads/2019/08/VirtuClean-017-Edit.png" alt="">
        </div>
        <div class="home_popap__text">
    	<h2>Save $50</h2>
    	<p>Save $50 plus U.S. Free Shipping on VirtuCLEAN 2! Try it risk free</p>
	    <?php
	    $id_product = get_field('main_product', 'options');
	    if (isset($id_product)) :
		?><a href="<?php echo home_url('/checkout/?add-to-cart=' . $id_product . '&quantity=1'); ?>" class="btn_buy_on_click"><?php echo get_field('header_name_bottom', 'option'); ?></a>
	    <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

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





<div id="cart_popap" class="cart_popap">
    <?php
    $popaps_prodects = get_field('accessoties_top', 'options');
    $count_items = 1;
    foreach ($popaps_prodects as $key => $item):
	?>
	<?php
	$product = wc_get_product($item->ID);
	$thePrice = $product->get_price();
	$image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'single-post-thumbnail');
	?>
        <div class="cart_popap__item item">
    	<div class="cart_popap__img">
    	    <div class="box">
    		<img src="<?php echo $image[0]; ?>" alt="">
    	    </div>
    	</div>
    	<div class="cart_popap__text">
    	    <h3>Accessories VirtuClean</h3>
    	    <h2>Would you like to add <span class="pp_article">a</span> <span><?php echo $item->post_title; ?></span> to your purchase?</h2>
    	    <div class="full_content">
		    <?php
		    $content = $item->post_excerpt;
		    echo $content;
		    ?>
    	    </div>
    	    <div class="smoll_content">
		    <?php
		    $content = $item->post_excerpt;
		    $trimmed_content = wp_trim_words($content, 20, '<a  class="btn_m_acss" href="' . get_permalink() . '">... Read More</a>');
		    echo $trimmed_content;
		    ?>
    	    </div>
    	    <p class="product_price_line" style="margin: 0;height: 65px;display: inline-block;vertical-align: middle;width: 100%;text-align: right;border-top: 1px solid #EDEDED;">
    		<span class="product_price_text" style="font-family: 'Lato', sans-serif; display: inline-block;font-size: 18px;line-height: 37px;letter-spacing: 0.05em;color: #888888;">
			<?php echo get_field('title_price_label', 'option'); ?>
    		</span>
    		<span class="product_price_price" style="font-family: 'Lato', sans-serif; display: inline-block;margin-left: 15px;font-weight: bold;font-size: 18px;line-height: 204.3%;letter-spacing: 0.05em;color: #555555;">
			<?php echo get_woocommerce_currency_symbol(get_woocommerce_currency()) . $thePrice; ?>
    		</span>
    		<a href="<?php echo site_url() ?>/cart/?add-to-cart=<?php echo $item->ID; ?>" class="product_price_btn close_f" style="font-family: 'Lato', sans-serif; display: inline-block;background-color: #333333;height: 65px;width: 65px;vertical-align: middle;position: relative;margin-left: 10px;text-align: center;">
    		    <img src="<?php echo get_template_directory_uri(); ?>/../../uploads/2019/05/shopping-bag.png" alt="addtocart" width="21" height="25" style="padding-top: 15px; width: 21px!important;">
    		</a>
    	    </p>
    	</div>
        </div>
    <?php endforeach; ?>
</div>


</main>

<?php wp_footer(); ?>

</body>
</html>
