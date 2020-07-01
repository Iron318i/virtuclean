<?php get_header();
/* Template Name: Home Template */
?>
<?php
$first_block = get_field('first_block');
$home_about_virtuclean = get_field('home_about_virtuclean');
$advantages_h = get_field('advantages_virtuclean');

?>
<section class='home-first' style="background-image: url(<?php echo $first_block['backround_h_f']['url']; ?>);">
	<a class="scrool_down" href="#second_h_block">
		<div class="text-explore">
           <?php echo $first_block['title_scrool_down']; ?>
		</div>
		<div class="scroll-explore"></div>
	</a>
	<div class="virtuclean-text">
        <?php svg('virtuclean-text');?>
	</div>
	<div class="container">
		<div class="virtuclean-v">
            <?php svg('virtuclean-v'); ?>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="home-first-text">
					<?php echo $first_block['title_h_f']; ?>
					<div class="sold">
					<img src="https://www.virtuclean.com/wp-content/uploads/2019/11/Sold.png" alt="">
					</div>
                    <div  class="after-header">
                        <p><?php echo $first_block['subtitle__h_f']; ?></p>
                    </div>
                    <div class="btn_h_baner">
                        <?php
                        $id_product = get_field('main_product', 'options');
                        if (isset($id_product)) :
                            ?><a href="<?php echo home_url('/checkout/?add-to-cart='.$id_product.'&quantity=1');?>" class="btn_buy_on_click"><?php echo get_field('header_name_bottom','option');?></a>
                        <?php endif; ?>
                        <a class="more_info_btn_border" href="<?php echo $first_block['link_more_info']; ?>">More info</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="h_about_virtuClean" id="second_h_block">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-5 col-lg-12">
				<div class="h_about_video_box">
					<span class="text-border">Video</span>
					<div class="vplayer">
                        <?php echo $home_about_virtuclean['vodeo_link']; ?>
						<div class="substrate"></div>
					</div>
				</div>
			</div>
			<div class="col-xl-7 col-lg-12">
				<div class="box_content">
					<span class="text-border">Review</span>
                    <?php //svg('triangle_home_about'); ?>
                    <div class="box-image">
                        <img src="/wp-content/uploads/2019/06/Rectangle.png" alt="">
                    </div>
					<div class="h_about_content">
						<h2><?php echo $home_about_virtuclean['title']; ?></h2>
						<p><?php echo $home_about_virtuclean['content']; ?></p>
						<a class="more_info_btn" href="<?php echo $home_about_virtuclean['link_more_info']; ?>"><?php echo $home_about_virtuclean['title_link_about_moreinfo']; ?></a>
                        <?php
                        $id_product = get_field('main_product', 'options');
                        if (isset($id_product)) :
                            ?>
                            <a href="<?php echo home_url('/checkout/?add-to-cart='.$id_product.'&quantity=1');?>" class="btn_buy_on_click"><?php echo get_field('button_by_on_click','option');?></a>
                        <?php endif; ?>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/product','block'); ?>

<!--as_seen_on-->
<section class="h_as_seen_on">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>As seen on</h2>
            </div>
            <div class="col-12 icons-wrap">
                <div class="icon">
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/dist/img/NBC-image.png' alt="">
                </div>
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/buy-picture-frames-cbs-png-logo-7.png" alt="">
                </div>
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/The_CW_logo_4800x2000.png" alt="">
                </div>
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/479px-American_Broadcasting_Company_Logo.png" alt="">
                </div>
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/Fox_Logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="h_advantages">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<div class="h_adv_content_title">
					<span class="text_border">
                         <?php svg('Advantages');?>
                    </span>
					<h2><?php echo $advantages_h['title_advantages']; ?></h2>
				</div>
			</div>
			<?php
			if (have_rows('advantages_virtuclean')):
				while (have_rows('advantages_virtuclean')): the_row();
					if (have_rows('advantages_items')):
						while (have_rows('advantages_items')): the_row();
							// vars
							$name = get_sub_field('name_advantages');
							$image = get_sub_field('image_advantages');
							?>
							<div class="col-lg-3 col-md-4 col-6">
								<div class="h_advantages_box">
									<img src="<?php echo $image['sizes']['large'] ?>" alt="Virtuclean"/>
									<div class="h_advantages_title"><?php echo $name; ?></div>
								</div>
							</div>
						<?php endwhile;
					endif;
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>

<center><div class="bansold">
    <img src="https://www.virtuclean.com/wp-content/uploads/2019/11/banner-3-1.png" alt="">
    </div></center>
<section class="virtuclean_product_sec">
	<div class="container">
		<div class="row">

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
					<div class="col-xl-7 col-lg-12 left_content">
						<div class="home_product_owl owl-carousel owl-theme">
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
					</div>
					<div class="col-xl-5 col-lg-12 right-col">
						<div class="title_product">
							<h2><?php echo get_the_title() ?></h2>
						</div>
						<div class="descr">
							<p><?php echo $product->get_short_description(); ?></p>
                            <a class="more-info" href="<?php echo get_permalink() ?>"><?php echo get_field('title_link_product_all','option');?></a>
						</div>
						<div class="block-inf-pr">
							<div class="product_price">
								<p><span class="title"><?php echo get_field('title_price_label','option');?></span></p>
								<p><span class="price">
								<del>
									<span class="price">
										<span class="price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
                                        <?php echo $product->get_regular_price(); ?>
									</span>
								</del>
								<ins>
									<span class="price">
										<span class="price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
										<?php echo $product->get_price(); ?>
									</span>
								</ins>
								</span>
								</p>
								<a href="<?php echo home_url('/checkout/?add-to-cart='.$id_product.'&quantity=1');?>" class="btn_buy_on_click">
                                    <?php echo get_field('button_by_on_click','option');?>
                                </a>
							</div>
<!--							<div class="product_shop_form">-->
<!--								--><?php
//								echo apply_filters('woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
//									sprintf('<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
//										esc_url($product->add_to_cart_url()),
//										esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
//										esc_attr(isset($args['class']) ? $args['class'] : 'button'),
//										isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
//										esc_html($product->add_to_cart_text())
//									),
//									$product, $args);
//								?>
<!--							</div>-->
						</div>

					</div>
				<?php
				endwhile;
				wp_reset_query();
				?>
			<?php else: ?>
				<div class="col-12">Please, add product link in Home Page</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php //get_template_part('template-parts/gift','block'); ?>
<?php get_template_part('template-parts/accessories','block'); ?>
<!-- <section class="banner">
    <div class="text">
        <h2>Pay over 6 months<br> with 0% interest</h2>
        <p>Everyone deserves affordable sleep apnea care</p>
    </div>
    <a href="https://www.carecredit.com/Pay/749FCR/">
        <img width="275" style="max-width:100%;" src="https://www.virtuclean.com/wp-content/uploads/2020/03/Frame-1.png"/>
    </a>
</section> -->
<section class="promo-home-product">
    <div class="l_ab_promo">
        <div class="promo-product-img">
            <img src="/wp-content/uploads/2019/07/High-resolution-pic_0401-1.png" alt="">
        </div>
        <div class="content">
            <span class="img-promo"><img src="/wp-content/uploads/2019/07/discount.png" alt=""></span>
            <h3>Try it risk free for 30 days!</h3>
            <p>30 DAY RISK FREE TRIAL; MONEY-BACK GUARANTEE: The VirtuCLEAN units carry a 30 Day Risk Free Trial. If you are not completely satisfied with your purchase, contact us within 30 days of the date of purchase.</p>
            <?php
            $id_product = get_field('main_product', 'options');
            if (isset($id_product)) :
                ?><a href="<?php echo home_url('/checkout/?add-to-cart='.$id_product.'&quantity=1');?>" class="btn_buy_on_click"><?php echo get_field('header_name_bottom','option');?></a>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/form','question'); ?>

<section class="home_reviews">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2><?php echo get_field('title_reviews_all','option');?></h2>
			</div>
			<div class="col-12 recent_reviews_slider ">
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
							<div class="item row">
								<div class="col-lg-3 col-md-12 recent_reviews_image">
									<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>">
                                    <span class="reviews_autor"><?php echo $autor; ?></span>
                                    <time>
                                        <?php echo $date; ?>
                                    </time>
								</div>
								<div class="col-lg-9 col-md-12 recent_reviews_content">
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
</section>
<section class="h_blog">
	<div class="container">
		<div class="row">
			<div class="col-12 title_box">
				<h2 class="title-name"><?php echo get_field('home_name_blog','option');?></h2>
				<a class="more_info_btn_border btn_right" href="/blog/"><?php echo get_field('home_name_link_blog','option');?></a>
			</div>
			<?php
			$args = [
				'posts_per_page' => 3,
				'orderby' => 'date'
			];
			$count_post_blog = 1;
			$query = new WP_Query($args);
			if ($query->have_posts()) :
				while ($query->have_posts()) :
					$query->the_post();
					$post_cat = get_the_category();
					if ($count_post_blog == 1):
						?>
						<div class="col-lg-7">
							<div class="h_blog_img">
								<?php echo get_the_post_thumbnail(); ?>
							</div>
							<div class="h_blog_content">
								<span><?php echo get_the_date('jS F, Y'); ?></span>
								<h3 class="h_blog_title"><?php the_title(); ?></h3>
								<div class="h_blog_text">
									<?php echo wp_trim_words(get_the_content(), 58, '...'); ?>
								</div>
								<div class="h_blog_info">
									<a class="more_info_btn" href="<?php echo get_permalink(); ?>"><?php echo get_field('name_link_article','option');?></a>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php $count_post_blog++; ?>
				<?php endwhile; ?>
				<div class="col-lg-5">
					<div class="row">
						<?php
						$count_blog = 1;
						while ($query->have_posts()) :
							$query->the_post();
							$post_cat = get_the_category();
							if ($count_blog > 1):
								?>
								<div class="col-lg-12">
									<div class="h_blog_img small">
										<?php echo get_the_post_thumbnail(); ?>
									</div>
                                    <div class="h_blog_content">
                                        <h3 class="h_blog_title"><?php the_title(); ?></h3>
                                        <div class="h_blog_info">
                                            <a class="more_info_btn" href="<?php echo get_permalink(); ?>"><?php echo get_field('name_link_article','option');?></a>
                                        </div>
                                    </div>
								</div>
							<?php endif; ?>
							<?php $count_blog++; ?>
						<?php endwhile; ?>
					</div>
				</div>
			<?php else : ?>
				<p><?php __('No News'); ?></p>
			<?php
			endif;
			unset($args);
			wp_reset_postdata();
            wp_reset_query();
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
