<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package turio
 */
get_header(); ?>
<?php
    get_template_part( 'template-parts/breadcrumbs/breadcrumb-archive' );
    $turio_theme_options = get_option('turio_theme_options');
    $package_post_per_page = '';
    if(isset($turio_theme_options['tour_package_per_post'])){
        $package_post_per_page = $turio_theme_options['tour_package_per_post'];
    }

?>
<div class="tour-package-wrapper mb-110 mt-110">
    <div class="container">
        <div class="row g-4">
        <?php
            global $wp_query;

            if(!empty($package_post_per_page)){
                $args = array_merge( $wp_query->query_vars, ['posts_per_page' => $package_post_per_page ], [ 'paged'=> $_REQUEST['page'] ?? '' ] );

            }else{
                $args = array_merge( $wp_query->query_vars, ['posts_per_page' => 9 ], [ 'paged'=> $_REQUEST['page'] ?? ''] );
            }
            
            query_posts( $args );
            if ( have_posts() ) :
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */
                    get_template_part( 'loop-templates/content-archive', get_post_type() );
                    wp_reset_postdata();
                endwhile; 
            else :
                get_template_part( 'loop-templates/content', 'none' );

            endif;
            
            ?>

        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
               <?php egns_tax_pagination(); ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
