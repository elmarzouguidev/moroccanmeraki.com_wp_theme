<?php
/**
 *
 * This is the main template file which will display posts etc.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package turio
 */

get_header();
if( is_home() ):
	get_template_part( 'template-parts/breadcrumbs/breadcrumb-archive' );
endif;

	Egns_Helpers::turio_dynamic_blog_layout();
?>
<?php
get_footer();
