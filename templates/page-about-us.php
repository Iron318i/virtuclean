<?php

/**
 * Template Name: About Us
 */

get_header();

get_template_part('template-parts/template', 'hero');

?>

<section class="white-block about-us">
    <div class="container">
        <div class="row">
            <div class="column col-md-12 col-xl-8 col-lg-6">
                <div class="content">
                    <?php
                    while ( have_posts() ) : the_post(); ?>
                        <div class="page-content">
                            <?php the_content(); ?>
                        </div>
                     <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="column col-md-12 col-xl-4 col-lg-6">
                <div class="content">
                    <div class="form-wrapper">
                        <?php echo do_shortcode(get_field('contact_form')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer();
