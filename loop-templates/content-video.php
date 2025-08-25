<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action('turio_post_before'); ?>
    <?php if (Egns_Helpers::has_turio_embeded_video() && !is_single()) { ?>
        <div class="blog-thumb">
            <?php echo Egns_Helpers::turio_dynamic_video_layout(); ?>
        </div>
    <?php } elseif (is_single()) {
        turio_blog_post_header();
    }
    ?>
    <?php
    if (!is_single()) {
    ?>
        <div class="blog-content">
            <?php echo turio_blog_meta(); ?>
            <?php turio_blog_archive_title(); ?>
        </div>
    <?php
    } else {
        echo Egns_Helpers::turio_dynamic_video_layout();
    ?>
        <div class="post-body">
            <?php the_content(); ?>
        </div>
    <?php
        turio_blog_post_footer();
        $get_category_list = get_the_category( get_the_ID() );
        $categories = ''; 
        ?>
        <?php if( count( $get_category_list) > 0 || !empty( get_the_tag_list() ) ) :   ?>
            <div class="blog-category-tag">
                <div class="row mt-4">
                <?php if( count( $get_category_list ) > 0 ) : ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="justify-content-start blog-category">
                            <h5>
                                <?php echo esc_html('Categories: ') ?>
                            </h5>
                            <div class="blog-categories">
                                <ul>
                                    <?php

                                        foreach ($get_category_list as $value) {
                                            echo '<li><a href="'.esc_url( get_category_link( $value->cat_ID ) ).'"> '.esc_html($value->name).' </a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if( !empty( get_the_tag_list() ) ) :  ?>
                    <div class="col-md-6 col-sm-12 mt-4 mt-sm-0">
                        <div class="justify-content-start blog-tags-wrapper">
                            <div class="blog-tags">
                                <h5><?php echo esc_html__('Tags :', 'turio') ?></h5>
                                <?php echo get_the_tag_list(
                                    $before = '<ul><li>',
                                    $sep    = '</li><li>',
                                    $after  = '</li></ul>'
                                    ); 
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php
    }
    ?>

    <?php do_action('turio_post_after'); ?>
</article>