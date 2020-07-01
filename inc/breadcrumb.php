<?php

/**
 * breadcrumbs
 */

function the_breadcrumb($post) {

	$current_title = is_home() ? "Blog" : $post->post_title;
	$current_permalink = is_home() ? get_permalink( get_option( 'page_for_posts' ) ) : get_permalink($post->ID);

	echo '<ul class="hero-breadcrumb">';

	echo '<li><a href="' . get_site_url() . '">Home</a></li>';

	if ($post->post_parent) {
		echo '<li><a href="' . get_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a></li>';
	};

	echo '<li><a href="' . $current_permalink . '">' . mb_strimwidth($current_title, 0, 20, "...") . '</a></li>';

	echo '</ul>';
};
