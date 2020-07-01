<?php

/**
 * Template Name: Old Page
 */

get_header();

?>

<section class="section1" style="background-image:url(<?php echo get_field("oldpage_section1_background"); ?>);">
    <div class="container">
        <div class="row">
			<?php the_breadcrumb($post); ?>
            <div class="col-lg-6 col-md-12">
              <div class="content">
                  <div class="subtitle">
	                <?php echo get_field("oldpage_subtitle"); ?>
                  </div>
                  <div class="title">
                      <?php echo get_field("oldpage_title"); ?>
                  </div>
                  <div class="description">
                      <?php echo get_field("oldpage_description1"); ?>
                      <?php
                            $id_product = get_field('link_product_virtuclean_old');
                            if (isset($id_product)) :
                        ?>
                            <div class="btn"><a href="<?php echo home_url('/checkout/?add-to-cart='.$id_product.'&quantity=1');?>" class="more_info_btn_border">ORDER NOW</a></div>
                        <?php endif;?>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>

<section class="section2">
    <div class="container">
        <div class="row">
            <div class="vplayer">
                <?php echo get_field("oldpage_video");  ?>
            </div>
        </div>
    </div>
</section>


<section class="section3 oldpage_tabs">
    <div class="container">
        <div class="row">
            <div class="tabs">
                <?php if( have_rows('oldpage_tabs') ): ?>
                    <div class="tab-title">
	                    <?php $i = 0;?>
                        <?php while( have_rows('oldpage_tabs') ): the_row(); ?>
                            <a class="<?php echo ($i==1 ? 'selected' : ''); ?>" href="#"><?php echo get_sub_field('tab_title');?></a>
                            <?php $i++;?>
                        <?php endwhile; ?>
                    </div>
                    <div class="tab-content">
                        <?php while( have_rows('oldpage_tabs') ): the_row(); ?>
	                        <?php echo get_sub_field('tab_content');?>
	                    <?php endwhile; ?>
                    </div>
	            <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="section4 oldpage_order_form" style="background-image:url(<?php echo get_field("oldpage_section4_background"); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="title">
						<?php echo get_field("oldpage_section4_title"); ?>
                    </div>
                    <div class="subtitle">
			            <?php echo get_field("oldpage_section4_subtitle"); ?>
                    </div>
                    <div class="form-wrapper">
						<?php
						$cf = get_field('form_questions','option');
						if( isset($cf) ) : ?>
							<?php echo do_shortcode($cf);?>
						<?php else: ?>
							Please, add shortcode form in Theme Options - Question Form!
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>