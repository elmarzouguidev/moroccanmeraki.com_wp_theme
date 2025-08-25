<?php
    get_header();

    get_template_part( 'template-parts/breadcrumbs/breadcrumb-single' );
?>

<div class="blog-details-wrapper">
    <div class="container">
        <div class="row <?php echo !is_active_sidebar('right_sidebar') ? 'justify-content-center' : '' ?>">
            <div class="col-lg-8">
                <?php
                    while ( have_posts() ) :
                        
                        the_post();
                        $format = get_post_format() ? : 'single';

                        get_template_part( 'loop-templates/content', $format );

                    endwhile; // End of the loop.
                ?>
                <?php 
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            </div>
            <?php echo get_sidebar(); ?>
        </div>
        
    </div>
</div>
<?php
get_footer();