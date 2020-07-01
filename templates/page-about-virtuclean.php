<?php
/**
 * Template Name: About Virtuclean
 *
 */
get_header();
?>

<div class="about-virtuclean">

    <?php get_template_part('template-parts/template', 'hero'); ?>
    <section class="content-product">
	<div class="container">
	    <div class="row">
		<div class="col-xl-5">
		    <?php
		    $id_product = get_field('main_product', 'options');
		    if (isset($id_product)) :
			?>
			<?php
			$args = array(
			    'post_type' => 'product',
			    'p' => $id_product
			);
			$loop = new WP_Query($args);

			while ($loop->have_posts()) : $loop->the_post();
			    global $product;
			    $post_thumbnail_id = $product->get_image_id();
			    ?>
			    <div class="box_info_product">
				<div class="title_product">
				    <h2>Buy <?php echo get_the_title() ?></h2>
				</div>
				<div class="about_product_owl owl-carousel owl-theme">
				    <div class="item">
					<?php
					if ($product->get_image_id()) {
					    $html = wc_get_gallery_image_html($post_thumbnail_id, true);
					} else {
					    $html = '<div>';
					    $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
					    $html .= '</div>';
					}

					echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
					?>
				    </div>
				    <?php
				    $attachment_ids = $product->get_gallery_image_ids();
				    if ($attachment_ids && $product->get_image_id()) {
					foreach ($attachment_ids as $attachment_id) {
					    ?>
					    <div class="item">
						<?php echo apply_filters('woocommerce_single_product_image_thumbnail_html', virtuclean_get_gallery_image_template($attachment_id), $attachment_id); ?>
					    </div>
					    <?php
					}
				    }
				    ?>
				</div>
				<div class="">
				    <div class="block-inf-pr">
					<div class="product_price">
					    <p><span class="title"><?php echo get_field('title_price_label', 'option'); ?></span></p>
					    <p class="price">
						<del>
						    <span>
							<span class="price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
							<?php echo $product->get_regular_price(); ?>
						    </span>
						</del>
						<ins>
						    <span>
							<span class="price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
							<?php echo $product->get_price(); ?>
						    </span>
						</ins>
					    </p>
					    <a href="<?php echo home_url('/checkout/?add-to-cart=' . $id_product . '&quantity=1'); ?>" class="btn_buy_on_click">
						<?php echo get_field('button_by_on_click', 'option'); ?>
					    </a>
					</div>
					<!--											<div class="product_shop_form">-->
					<!--												--><?php
//												echo apply_filters('woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
//													sprintf('<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
//														esc_url($product->add_to_cart_url()),
//														esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
//														esc_attr(isset($args['class']) ? $args['class'] : 'button'),
//														isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
//														esc_html($product->add_to_cart_text())
//													),
//													$product, $args);
//
					?>
					<!--											</div>-->
				    </div>
				</div>
			    </div>
			    <?php
			endwhile;
			wp_reset_query();
			?>
		    <?php else: ?>
    		    <div>Please, add product link in Home Page</div>
		    <?php endif; ?>
		</div>
		<div class="col-xl-7">
		    <div class="product_description">
			<div class="tabs">
			    <div class="tabs">
				<?php if (have_rows('tabs_virtuclean')): ?>
    				<div class="tab-title">
					<?php $i = 0; ?>
					<?php while (have_rows('tabs_virtuclean')): the_row(); ?>
					    <a class="<?php echo ($i == 1 ? 'selected' : ''); ?>" href="#"><?php echo get_sub_field('title'); ?></a>
					    <?php $i++; ?>
					<?php endwhile; ?>
    				</div>
    				<div class="tab-content">
					<?php $i = 0; ?>
					<?php while (have_rows('tabs_virtuclean')): the_row(); ?>
					    <div class="row tab-item <?php echo ($i == 1 ? 'selected' : ''); ?>"><?php echo get_sub_field('description'); ?></div>
					    <?php $i++; ?>
					<?php endwhile; ?>
    				</div>
				<?php endif; ?>
			    </div>
			</div>
		    </div>
		    <div class="virtuclean_info">
			<h3 class="virtuclean_info_head"> <?php echo get_field('title_info_product'); ?></h3>
			<div class="virtuclean_image_info">
			    <div class="box-image">
				<img src="<?php echo get_field('image_component_virtuclean'); ?>" alt="Virtuclean 2.0">
			    </div>
			    <p class="tubing_port">
				<span class="text-btn"><?php echo get_field("сomponents_title_1"); ?></span>
				<span class="btn-image"></span>
			    </p>
			    <p class="on-off">
				<span class="text-btn"><?php echo get_field("сomponents_title_2"); ?> </span>
				<span class="btn-image"></span>
			    </p>
			    <p class="USB">
				<span class="text-btn"><?php echo get_field("сomponents_title_3"); ?></span>
				<span class="btn-image"></span>
			    </p>
			    <p class="air-intake">
				<span class="btn-image"></span> <br>
				<span class="text-btn"><?php echo get_field("сomponents_title_4"); ?></span>
			    </p>
			</div>

			<div class="compare_block">
			    <h2>Are All Sleep Sanitizers Created Equally?</h2>
			    <div class="info">
				<div class="cover">
				    <img src="/wp-content/uploads/2019/10/image.jpg" alt="">
				</div>
				<div class="content">
				    <table class="compare__table">
					<tbody>
                                            <tr class="c_name">
                                                <td style="color: #f0681e;">VirtuCLEAN 2.0</td>
                                                <td>Lumin</td>
                                                <td>SoClean2</td>
                                            </tr>
                                            <tr class="c_prices">
                                                <td style="color: #f0681e;" class="t_price">$279</td>
                                                <td class="t_price">$299</td>
                                                <td class="t_price">$348</td>
                                            </tr>
                                            <tr>
                                                <td style="color: #f0681e;"  class="t_portable">Yes</td>
                                                <td  class="t_portable">No</td>
                                                <td  class="t_portable">No</td>
                                            </tr>
                                            <tr>
                                                <td style="color: #f0681e;" class="t_size">4.5"x 1.7"</td>
                                                <td class="t_size">12.25" x 8.5"x 7.75"</td>
                                                <td class="t_size">11”x11”x13”</td>
                                            </tr>
					</tbody>
				    </table>
				</div>
			    </div>
			    <a href="/compare-products/" class="more_info" >More Info <span><i class="fas fa-arrow-right"></i></span></a>
			</div>


			<div class="virtuclean_bottom_text">
			    <div class="v_sanitizing">
				<h3><?php echo get_field("sanitizing_bag"); ?></h3>
				<p><?php echo get_field("sanitizing_bag_description"); ?></p>
			    </div>
			    <div class="v_important">
				<h3><?php echo get_field("important"); ?></h3>
				<p><?php echo get_field("important_description"); ?></p>
			    </div>
			</div>
			<div class="user-manual">
			    <h3><?php echo get_field("title_download_user_manual"); ?></h3>
			    <a href="/wp-content/themes/virtuclean/assets/dist/img/Virtuox_VirtuCLEAN_2.0User_manual_2020.pdf" download> <?php svg('pdf-file'); ?><?php echo get_field("download_label"); ?> </a>
			</div>
		    </div>
		    <!--                         <div class="banner">
						<div class="text">
						    <h2>Pay over 6 months<br> with 0% interest</h2>
						    <p>Everyone deserves affordable sleep apnea care</p>
						</div>
						<a href="https://www.carecredit.com/Pay/749FCR/">
						    <img width="275" style="max-width:100%;" src="https://www.virtuclean.com/wp-content/uploads/2020/03/Frame-1.png"/>
						</a>
					    </div> -->
		    <div class="recent_reviews home_reviews">
			<div class="recent_reviews_slider">

			    <section class="prod_ban">
				<div class="prodbanner">
				    <img src="https://www.virtuclean.com/wp-content/uploads/2019/12/prodbanner.png" alt="">
				</div> </section>
			    <h2><?php echo get_field('title_reviews_all', 'option'); ?></h2>
			    <div class="recent_reviews_owl owl-carousel owl-theme">
				<?php
				if (have_rows('reviews', 'options')):
				    while (have_rows('reviews', 'options')): the_row();
					// vars
					$photo = get_sub_field('photo');
					$autor = get_sub_field('autor');
					$content = get_sub_field('content');
					$date = get_sub_field('date');
					?>
					<div class="item">
					    <div class="recent_reviews_image">
						<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>">
						<span class="reviews_autor"><?php echo $autor; ?></span>
						<span class="time">
						    <?php echo $date; ?>
						</span>
					    </div>
					    <div class="recent_reviews_content">
						<p><?php echo $content; ?></p>
					    </div>
					</div>
					<?php
				    endwhile;
				endif;
				?>
			    </div>
			    <div id="counter_slider"></div>
			</div>
		    </div>
		</div>
	    </div>
    </section>
    <?php get_template_part('template-parts/form', 'question'); ?>
</div>

<?php get_footer(); ?>
