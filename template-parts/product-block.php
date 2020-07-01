<?php
$wp_query = new WP_Query(
	array(
    'posts_per_page' => -1,
    'tax_query' => array(
	'relation' => 'AND',
	array(
	    'taxonomy' => 'product_cat',
	    'field' => 'slug',
	    'terms' => 'PPE'
	)
    ),
    'post_type' => 'product',
    'order' => 'ASC'
	)
);
?>
<section class="new-product">
    <div class="container-wrap">
        <h2>Personal protective equipment</h2>
        <div class="wrapper">
	    <?php if ($wp_query->have_posts()) : ?>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		    <?php
		    $product = wc_get_product($post->ID);
		    $thePrice = $product->get_price();
		    ?>
		    <div class="product-item">
			<div class="item-wrap">
			    <div class="item-slider">
				<div class="img" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
			    </div>
			    <div class="item-main">
				<h3><?php echo $post->post_title; ?></h3>
				<div class="full-content">
				    <?php
				    $content = $post->post_content;
				    echo $content;
				    ?>
				</div>
				<div class="item-footer">
				    <div class="item-price">
					<label><?php echo get_field('title_price_label', 'option'); ?></label>
					<span>
					    <?php echo get_woocommerce_currency_symbol(get_woocommerce_currency()) . $thePrice; ?>
					</span>
				    </div>
				    <?php
				    echo apply_filters(
					    'woocommerce_loop_add_to_cart_link', sprintf(
						    '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>', esc_url($product->add_to_cart_url()), esc_attr($product->get_id()), esc_attr($product->get_sku()), $product->is_purchasable() ? 'add_to_cart_button' : '', esc_attr($product->product_type), esc_html($product->add_to_cart_text())
					    ), $product
				    );
				    ?>
				</div>
			    </div>
			</div>
		    </div>
		<?php endwhile; ?>

	    <?php
	    endif;
	    wp_reset_postdata();
	    ?>
        </div>
        <div class="load-more">
           <a href="./ppe/"><span>Load More</span></a>
        </div>
    </div>
</section>
<script>
    $('a.add-card').click(function () {
	document.cookie = "user=one";
	location.reload();
    });
    $('a.a-cart').click(function () {
	document.cookie = "user=one";
	location.reload();
    });
</script>
