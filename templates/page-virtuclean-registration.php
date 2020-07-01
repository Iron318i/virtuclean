<?php

/**
 * Template Name: Registration
 *
 */

get_header();

?>

	<div class="registration-virtuclean">

		<?php get_template_part('template-parts/template', 'hero'); ?>
        <section class="registration-content first-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <?php the_content(); ?>
                </div>
            </div>
        </div>
        </section>
		<section class="registration-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="reg_box">
                            <p><?php echo get_field('text_top_registration');?></p>
                            <div class="registr_form_product">
                                <?php
                                $cf = get_field('form_registration_v_r');
                                if( isset($cf) ) : ?>
                                    <?php echo do_shortcode('[contact-form-7 id="'.$cf.'" title="Contact form"]');?>
                                <?php else: ?>
                                    Please, add shortcode form in Theme Options - Question Form!
                                <?php endif; ?>
                            </div>
                            <p><?php echo get_field('text_bottom_registration');?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	</div>
<script type="text/javascript">
    var wpcf7Elm = document.querySelector( '.wpcf7' );
    wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
        location = '/thank-you-for-registration-device/';
    }, false );
</script>

<?php get_footer(); ?>