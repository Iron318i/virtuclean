<?php
/**
 * Template Name: Acessories
 */
get_header();

get_template_part('template-parts/template', 'hero');
?>

<section class="accessories">
    <div class="container">
<?php //var_dump(get_field('ac_select_ac'));  ?>
	<div class="row">

	<?php if (get_field('ac_select_ac')): ?>

		<?php
		foreach (get_field('ac_select_ac') as $key => $item):
		    $product = wc_get_product($item->ID);
		    $thePrice = $product->get_price();
		    $images = $product->get_gallery_image_ids();
		    ?>

		    <div class="col-lg-6 col-xl-3 accessories-item">
			<div class="accessories-item__wrapper">
			    <div class="accessories-item__slider owl-carousel owl-theme">
	<?php foreach ($images as $image): ?>
	    			<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
				<?php endforeach; ?>
			    </div>
			    <div class="accessories-item__main">
				<h3><?php echo $item->post_title; ?></h3>
				<div class="full_content">
	<?php
	$content = $item->post_content;
	echo $content;
	?>
				</div>
				<div class="smoll_content">
	<?php
	$content = $item->post_content;
	$trimmed_content = wp_trim_words($content, 20, '<a  class="btn_m_acss" href="' . get_permalink() . '">... Read More</a>');
	echo $trimmed_content;
	?>
				</div>
				<div class="accessories-item__bt">
				    <div class="accessories-item__price">
					<label><?php echo get_field('title_price_label', 'option'); ?></label>
					<span>
	<?php echo get_woocommerce_currency_symbol(get_woocommerce_currency()) . $thePrice; ?>
					</span>
				    </div>
				    <a href="/cart/?add-to-cart=<?php echo $item->ID; ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/../../uploads/2019/05/shopping-bag.png" alt="Add to cart" class="add-to-cart-img">
				    </a>
				</div>
			    </div>
			</div>
		    </div>

    <?php endforeach ?>

	    <?php endif; ?>

	</div>
    </div>
</section>

<?php
get_footer();
