<div class="blog-wrapper mb-110 mt-110">
    <div class="container">
        <div class="row g-4">
            <?php
                if ( have_posts() ) :

                    /* Start the Loop */
                    while ( have_posts() ) :
                        echo '<div class="col-lg-4 col-md-6 col-sm-12">';
                            the_post();
                            $format = get_post_format() ? : 'single';
                            /*
                            * Include the Post-Type-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                            */
                            get_template_part( 'loop-templates/content', $format );
                        echo '</div>';

                    endwhile; 
                    wp_reset_postdata();
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


    