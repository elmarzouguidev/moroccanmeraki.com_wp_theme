<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package turio
 */

get_header();

if( ! is_front_page() ):
	get_template_part( 'template-parts/breadcrumbs/breadcrumb-page' );
endif;
?>
<div class="page-wrapper <?php echo Egns_Helpers::turio_is_woocommerce() ? 'mt-120 mb-120' : '' ?> ">
    <?php
        do_action( 'turio_page_before' );
            while ( have_posts() ) :
                the_post();
                get_template_part( 'loop-templates/content', 'page' );
            endwhile;
            wp_reset_postdata();

        do_action( 'turio_page_after' );
    ?>
</div>
<?php
get_footer();