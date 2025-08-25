<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package turio
 */
get_header(); 

get_template_part( 'template-parts/breadcrumbs/breadcrumb-search' );

    Egns_Helpers::turio_dynamic_blog_layout();

get_footer();

?>