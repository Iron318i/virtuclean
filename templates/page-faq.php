<?php

/**
 * Template Name: FAq
 */

get_header();

?>

<div class="faq-page">
	<?php get_template_part('template-parts/template', 'hero'); ?>
	<section class="white-block">
		<div class="container">
			<div class="row">
				<div class="column col-md-12">
					<div class="content">
						<h2 class="faq-title"><?php the_field('main_text_title') ?></h2>
						<div id="accordion">
							<?php if( have_rows('faq_accordion') ):
								while ( have_rows('faq_accordion') ) : the_row();?>

									<div class="accordion__item">
										<label> <?php the_sub_field('questions');?> </label>
										<div>
                                        <span>
                                        <?php the_sub_field('unswers');?>
                                        </span>
										</div>
									</div>

								<?php endwhile;
							else : ?>

								<h5 class="no-questions">No questions</h5>

							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part('template-parts/form','question'); ?>
</div>


<?php get_footer();
