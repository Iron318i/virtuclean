<?php

/**
 * Single post template
 *
 * @package     WordPress
 * @subpackage  RST v3
 * @since       1.0.0
 * @author      Serhii Sokol
 */

?>

<?php

/**
 * Include header.php or header-XXX.php for custom page
 *
 * @link        https://codex.wordpress.org/Function_Reference/get_header
 */

get_header();

get_template_part('template-parts/template', 'hero');

$product_id = get_field('main_product', 'option');
$product = wc_get_product($product_id);
$thePrice = $product->get_price();

?>
<section class="single_post">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<time datetime="<?php echo get_the_date('Y-m-d'); ?>">
					<?php echo get_the_date('dS F, Y'); ?>
				</time>
				<?php the_content(); ?>
			</div>
			
			<div class="col-md-4 ">
				<div class="box_info_product" style=""><div class="inner-wrapper-sticky" style="position: relative; transform: translate3d(0px, 0px, 0px);">
 				<div class="single_post-product box_info js">
					<?php echo $product->get_image(); ?>
					<h3>
						<?php echo get_the_title($product_id);?>
					</h3>
					<div class="single_post-product__bt">
						<div class="single_post-product__price">
							<label>
                                <?php echo get_field('title_price_label','option');?>
							</label>
							<span>
								<?php echo get_woocommerce_currency_symbol(get_woocommerce_currency()) . $thePrice; ?>
							</span>
						</div>
						<a class="btn_get_in_touch --sm" href="/cart/?add-to-cart=<?php echo $product_id; ?>" title="">
                            <?php echo get_field('header_name_bottom','option');?>
						</a>
					</div>
				</div>
			</div>	
		</div>
</div>
			</div>
		</div>
		<?php get_template_part('template-parts/template', 'related'); ?>

	
</section>

<?php

/**
 * Include footer.php of footer-XXX.php for custom page
 *
 * @link        https://codex.wordpress.org/Function_Reference/get_footer
 */
get_footer();

?>
