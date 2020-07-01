<?php 

$wp_query = new WP_Query( 
	array(
		'post_type'=> 'post',
		'post_status' => 'publish',
		'posts_per_page' => '3',
		'order'    => 'DESC',
		'post__not_in' => array(get_the_ID())
	)
);

?>

<div class="related">
	<h2>Popular articles</h2>
	<div class="row">
		<?php if ( $wp_query-> have_posts() ) : ?>

			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<div class="col-lg-4 blogSec-item">
					<div class="blogSec-item__img">
						<a href="<?php echo get_the_permalink(); ?>" title="">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
						</a>
					</div>
					<time datetime="<?php echo get_the_date('Y-m-d'); ?>">
						<?php echo get_the_date('d S F, Y'); ?>
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
			<?php endwhile; ?>

		<?php endif; wp_reset_postdata(); ?>
	</div>	
</div>	