<?php $author_url = get_author_posts_url(get_the_author_meta("ID")); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action('turio_post_before'); ?>
        <div class="blog-card-alpha wow animate fadeInUp" data-wow-duration="1500ms" data-wow-delay="<?php echo (($num+1)*2) ?>00ms">
            <div class="blog-thumb">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                <?php  endif ?>
                <div class="blog-lavel">
                    <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><i class="bi bi-calendar3"></i><?php echo get_the_date(); ?></a>
                </div>
            </div>
            <div class="blog-content">
                <div class="blog-body-top">
                    <a href="<?php echo esc_url( $author_url ) ?>" class="blog-writer"> <i class="bi bi-person-circle"></i> <?php _e('By ', 'turio'); ?><?php echo get_the_author(); ?> </a>
                    <a href="<?php echo esc_url( get_comments_link() ); ?>" class="blog-comments"><i class="bi bi-chat-dots-fill"></i><?php echo wp_kses_post('(' . get_comments_number() . ')' . ' ' . 'Comment'); ?></a>
                </div>
                <h4 class="blog-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php echo esc_html(substr(get_the_title(), '0', '55'), 'turio'); ?>
                    </a>
                </h4>
            </div>
        </div>
    <?php do_action('turio_post_after'); ?>
</article>