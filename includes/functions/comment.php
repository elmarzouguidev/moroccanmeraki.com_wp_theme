<?php

if (!function_exists('turio_commets')) :
    function turio_commets($comment, $args, $depth)
    {
?>

        <li class="comment" <?php esc_attr(comment_class()); ?> id="comment-<?php esc_attr(comment_ID()) ?>">
            <div class="comment mt-4 mt-sm-0">
                <div class="d-flex align-items-center pr-4">
                    <div class="commmentor">
                        <?php echo get_avatar($comment, $size = '120'); ?>
                    </div>
                    <div class="info">
                        <h6><?php echo esc_html(get_comment_author()) ?></h6>
                        <span><?php printf(/* translators: 1: date and time(s). */esc_html__('%1$s at %2$s', 'turio'), esc_html(get_comment_date()),  esc_html(get_comment_time())) ?></span>
                    </div>
                </div>
                <div class="comment-content">
                    <?php comment_text() ?>
                </div>
                <?php if (!($args['post_type'] == 1)) : ?>
                    <div class="reply-btn">
                        <?php if ($depth < $args['max_depth'] && comments_open()) :  ?>
                            <i class="bi bi-reply-all-fill"></i>
                        <?php endif ?>
                        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                <?php endif ?>
            </div>
        </li>

<?php
    }
endif;
