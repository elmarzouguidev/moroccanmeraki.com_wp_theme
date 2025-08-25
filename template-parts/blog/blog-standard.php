<div class="blog-sidebar-wrapper mb-110 mt-110">
    <div class="container">
        <div class="row <?php echo !is_active_sidebar('right_sidebar') ? 'justify-content-center' : ''; ?>">
            <div class="col-lg-8">
                <?php
                    if ( have_posts() ) :

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();
                            $format = get_post_format() ? : 'single';
                            /*
                            * Include the Post-Type-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                            */
                            get_template_part( 'loop-templates/content', $format );

                        endwhile; 
                        wp_reset_postdata();
                    else :
                        get_template_part( 'loop-templates/content', 'none' );
                    endif;
                    ?>
                    <div class="col-12 d-flex justify-content-center">
                        <?php get_template_part( 'template-parts/blog/pagination' ); ?>
                    </div>
            </div>
            <?php 
                echo get_sidebar();
            ?>  
        </div>
    </div>
</div>
