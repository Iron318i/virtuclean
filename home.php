<?php 

global $wp_query;

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$wp_query = new WP_Query( 
	array(
		'post_type'=> 'post',
		'post_status' => 'publish',
		'order'    => 'DESC',
		'paged' => $paged
	)
);

get_header();

get_template_part('template-parts/template', 'hero');
?>

<section class="blogSec">
	<div class="container">
		<div class="row">
			<?php if ( $wp_query-> have_posts() ) : ?>
                <?php $count_post_blog = 1; ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                    <?php //var_dump($count_post_blog) ?>
                    <?php if($count_post_blog == 4) : ?>
                        <?php
                            $product_id = get_field('main_product', 'option');
                            $product = wc_get_product($product_id);
                            $thePrice = $product->get_price();
                        ?>
                        <div class="col-md-4 blogSec-item">
                            <div class="single_post-product">
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
						<div class="col-lg-4 blogSec-item">
						<div class="blogSec-item__img">
							<a href="<?php echo get_the_permalink(); ?>" title="">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							</a>
						</div>
						<time datetime="<?php echo get_the_date('Y-m-d'); ?>">
							<?php echo get_the_date('dS F, Y'); ?>
						</time>
						<h3>
							<?php the_title(); ?>   
						</h3>
						<p>
							<?php //the_excerpt(); ?>
                            <?php
                                 echo wp_trim_words( get_the_content(), 70, '...' );
                            ?>
						</p>
						<a class="more_info_btn --dark" href="<?php echo get_the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php echo get_field('name_link_article','option');?>
						</a>
					</div>
                    <?php else: ?>
					<div class="col-lg-4 blogSec-item">
						<div class="blogSec-item__img">
							<a href="<?php echo get_the_permalink(); ?>" title="">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							</a>
						</div>
						<time datetime="<?php echo get_the_date('Y-m-d'); ?>">
							<?php echo get_the_date('dS F, Y'); ?>
						</time>
						<h3>
							<?php the_title(); ?>   
						</h3>
						<p>
							<?php //the_excerpt(); ?>
                            <?php
                                 echo wp_trim_words( get_the_content(), 70, '...' );
                            ?>
						</p>
						<a class="more_info_btn --dark" href="<?php echo get_the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php echo get_field('name_link_article','option');?>
						</a>
					</div>
                     <?php endif; ?>
                    <?php $count_post_blog++; ?>
                <?php endwhile; ?>

			<?php endif; wp_reset_postdata(); ?>
		</div>
		<?php 


		the_posts_pagination(
			array(
				'show_all'     => false, // показаны все страницы участвующие в пагинации
				'end_size'     => 1,     // количество страниц на концах
				'mid_size'     => 1,     // количество страниц вокруг текущей
				'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
				'prev_text'    => __('<span>PreVious PAGE</span>'),
				'next_text'    => __('<span>NEXT PAGE</span>'),
				'add_args'     => false
			)
		);

		?>
	</div>	
</section>

<?php

wp_reset_query();

get_footer();