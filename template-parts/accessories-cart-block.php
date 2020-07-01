<?php
$wp_query = new WP_Query(
	array(
    'posts_per_page' => 4,
    'tax_query' => array(
	'relation' => 'AND',
	array(
	    'taxonomy' => 'product_cat',
	    'field' => 'slug',
	    'terms' => 'accessories'
	)
    ),
    'post_type' => 'product',
    'order' => 'DESC'
	)
);
?>
<section class="tpl-acces" style="background-color: #fff;">
    <?php if ($wp_query->have_posts()) : ?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	    <?php
	    $product = wc_get_product($post->ID);
	    $thePrice = $product->get_price();
	    $images = $product->get_gallery_image_ids();
	    ?>
	    <div class="item">
		<div class="wrap">
		    <div class="slider">
			<?php foreach ($images as $image): ?>
	    		<div style="background-image: url('<?php echo wp_get_attachment_url($image); ?>')" class="img"></div>
	    		<!--                                    <img src="--><?php //echo wp_get_attachment_url( $image );  ?><!--" alt="">-->
			<?php endforeach; ?>
		    </div>
		    <div class="text">
			<h3><?php echo $post->post_title; ?></h3>
			<p></p>
			<div class="smoll_content">
			    <?php
			    $content = $post->post_content;
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
			    <a href="/cart/?add-to-cart=<?php echo $post->ID; ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/../../uploads/2019/05/shopping-bag.png" alt="Add to cart" class="add-to-cart-img">
			    </a>
			</div>
		    </div>
		</div>
	    </div>
	<?php endwhile; ?>

    <?php endif;
    wp_reset_postdata();
    ?>

</section>
