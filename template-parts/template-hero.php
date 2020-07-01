<?php 

if (is_home() && get_option('page_for_posts') ) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
    $featured_image = $img[0];
} else { 
    $featured_image = get_the_post_thumbnail_url();
}
?>

<section class="hero <?php echo get_field('hero_size') ? '--large' : ''; ?>">
    <img src="<?php echo $featured_image; ?>" alt="<?php echo is_home() ? "Blog" : get_the_title(); ?>">
    <div class="container">
        <?php the_breadcrumb($post); ?>
        <div class="col-xl-6 content">
            <?php if (get_field('hero_under')): ?>
                <blockquote>
                    <?php the_field('hero_under'); ?>
                </blockquote>
            <?php endif; ?>
            <h1><?php echo is_home() ? "Blog" : get_the_title(); ?></h1>
            <?php if (get_field('hero_subtitle')): ?>
                <p class="subtitle"><?php the_field('hero_subtitle'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
