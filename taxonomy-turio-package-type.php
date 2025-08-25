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
    $turio_theme_options = get_option('turio_theme_options');
    $package_post_per_page = '';
    if(isset($turio_theme_options['tour_package_per_post'])){
        $package_post_per_page = $turio_theme_options['tour_package_per_post'];
    }

    get_template_part( 'template-parts/breadcrumbs/breadcrumb-archive' );
?>
<div class="tour-package-wrapper mb-110 mt-110">
   
    <div class="container">
        <div class="row g-4">
        <?php
            global $wp_query;
    
            if(!empty($package_post_per_page)){
            $args = array_merge( $wp_query->query_vars, ['posts_per_page' => $package_post_per_page ] );
            }else{
            $args = array_merge( $wp_query->query_vars, ['posts_per_page' => 9 ] );
            }
            
            query_posts( $args );

            if ( have_posts() ) :
        
                while ( have_posts() ) :
                    the_post();

   
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
                <?php get_template_part( 'template-parts/blog/pagination' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
