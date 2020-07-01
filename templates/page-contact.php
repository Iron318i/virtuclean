<?php

/**
 * Template Name: Contact Us
 *
 */

get_header();

?>

	<div class="v_contact_us">
		<?php get_template_part('template-parts/template', 'hero'); ?>
        <section class="contactUS_info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>For all enquiries contact:</h2>
                        <p><span>Address:</span> 4348 NW 120th AVE Coral Springs FL 33065</p>
                        <p><span>Telephone:</span> 855-284-6557</p>
                        <p><span>Email:</span> SALES@VIRTUOX.NET</p>
                        <p><span>Web:</span> www.virtuclean.com</p>
                        <h3>Please contact us if you have any questions, concerns, or suggestions!</h3>
                        <a href="/want-to-become-a-virtuclean-reseller/" class="btn_buy_on_click">Reseller request form</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php //get_template_part('template-parts/accessories','block'); ?>

<?php //get_template_part('template-parts/form','question'); ?>
<!--    <section class="home_reviews">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-12">-->
<!--                    <h2>--><?php //echo get_field('title_reviews_all','option');?><!--</h2>-->
<!--                </div>-->
<!--                <div class="col-12 recent_reviews_slider ">-->
<!--                    <div class="recent_reviews_owl owl-carousel owl-theme">-->
<!--                        --><?php
//                        if (have_rows('reviews', 'options')):
//                            while (have_rows('reviews', 'options')): the_row();
//                                // vars
//                                $photo = get_sub_field('photo');
//                                $autor = get_sub_field('autor');
//                                $content = get_sub_field('content');
//                                $date = get_sub_field('date');
//                                ?>
<!--                                <div class="item row">-->
<!--                                    <div class="col-lg-3 col-md-12 recent_reviews_image">-->
<!--                                        <img src="--><?php //echo $photo['url']; ?><!--" alt="--><?php //echo $photo['alt']; ?><!--">-->
<!--                                        <span class="reviews_autor">--><?php //echo $autor; ?><!--</span>-->
<!--                                        <time>-->
<!--                                            --><?php //echo $date; ?>
<!--                                        </time>-->
<!--                                    </div>-->
<!--                                    <div class="col-lg-9 col-md-12 recent_reviews_content">-->
<!--                                        <p>--><?php //echo $content; ?><!--</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            --><?php
//
//                            endwhile;
//                        endif;
//                        ?>
<!--                    </div>-->
<!--                    <div id="counter_slider"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

<?php get_footer(); ?>