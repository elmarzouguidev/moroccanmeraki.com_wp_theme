<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action('turio_post_before'); ?>
    <?php if (has_post_thumbnail() && !is_single()) { ?>
        <div class="blog-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail() ; ?>
            </a>
            <div class="blog-lavel">
                <?php Egns_Helpers::turio_the_first_category();?>
            </div>
        </div>
    <?php } elseif (is_single()) {
        turio_blog_post_header();
    }
    ?>
    <?php
    if (!is_single() ) {
    ?>
        <?php if(is_sticky(get_the_ID())) { ?>
            <div class="sticky-post-icon">
                <i class="bi bi-pin-angle"></i>
            </div>
       <?php } ?>
        <div class="blog-content">
            <?php echo turio_blog_meta(); ?>
            <?php turio_blog_archive_title(); ?>
        </div>
    <?php
    } else {
        turio_blog_post_thumbnail();
    ?>
        <div class="post-body">
            <?php the_content(); ?>
            <?php Egns_Helpers::turio_get_post_pagination(); ?>
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