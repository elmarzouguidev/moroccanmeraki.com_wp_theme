<?php
/**
 * Template Name: Empty Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package turio
 */
get_header();

if ( ! is_front_page() ) {
	get_template_part( 'template-parts/breadcrumbs/breadcrumb-page' );
}

while ( have_posts() ) : the_post();
	get_template_part( 'loop-templates/content', 'empty' );
endwhile;
wp_reset_postdata();

get_footer();

