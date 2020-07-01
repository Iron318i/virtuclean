<?php
/**
 * Template Name: Compare Product
 *
 */
get_header();
?>

<div class="compare-virtuclean">
<?php get_template_part('template-parts/template', 'hero'); ?>
    <div class="v_compare">
	<div class="container">
	    <div class="row">
		<div class="col-12">
		    <h2>Are All SLEEP Sanitizers Created Equally?</h2>
		    <div class="v_compare__container">
<?php
if (have_posts()) : while (have_posts()) : the_post();
	the_content();
    endwhile;
else:
    ?>
    			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>
<?php get_template_part('template-parts/accessories', 'block'); ?>

<?php get_template_part('template-parts/form', 'question'); ?>
<section class="home_reviews">
    <div class="container">
	<div class="row">
	    <div class="col-12">
		<h2><?php echo get_field('title_reviews_all', 'option'); ?></h2>
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
				    <span class="time">
					<?php echo $date; ?>
				    </span>
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

<?php get_footer(); ?>