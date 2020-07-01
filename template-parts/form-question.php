<section class="question-form h_question-form"  style="background-image: url(<?php echo get_field('form_background', 'option')['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="column col-12 col-lg-6 col-md-10">
                <div class="content">
                    <span class="ingroduction"><?php echo get_field('subtitle_question_all', 'option'); ?></span>
                    <h2 class="form-title"><?php echo get_field('title_questions', 'option'); ?></h2>
                    <h5 class="form-address"><?php echo get_field('get_in_touch_content', 'option'); ?></h5>
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