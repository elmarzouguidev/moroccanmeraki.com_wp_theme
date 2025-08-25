<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package turio
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
$criteria_info = get_post_meta(get_the_ID(), 'turio_criteria_options', true);

?>
<div class="row blog-padding comment-page">
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12">
        <div class="comment-section">
            <div class="comment-list">
                <?php
                // You can start editing here -- including this comment!
                if (have_comments()) : ?>
                    <h4 class="comments-title"><?php comments_number(esc_html__('0 Comments', 'turio'), esc_html__('1 Comment', 'turio'), esc_html__('% Comments', 'turio')); ?></h4>
                    <?php
                    wp_list_comments(array(
                        'style'      => 'ul',
                        'short_ping' => true,
                        'callback' => 'turio_commets',
                        'post_type' => is_singular('turio-package')
                    ));
                    ?>
                    <?php
                    the_comments_navigation();

                    // If comments are closed and there are comments, let's leave a little note, shall we?
                    if (!comments_open()) :
                    ?>
                        <p class="no-comments"><?php Egns_Helpers::turio_translate_with_escape_('Comments are closed.'); ?></p>
                <?php
                    endif;

                endif; // Check for have_comments().
                ?>
            </div>
        </div>
    </div>
    <?php if (comments_open()) : ?>
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="comment-form-wrapper mt-50">
                <?php

                // Custom comments_args here: https://codex.wordpress.org/Function_Reference/comment_form
                $commenter = wp_get_current_commenter();
                $req = get_option('require_name_email');
                $aria_req = ($req ? " aria-required='true' " : '');

                $comments_args = array(
                    'title_reply'   => esc_html__('Leave a comment', 'turio'),
                    'comment_field' => ' <div class="custom-input-group"><label class="mb-3">' . esc_attr__('Comment', 'turio') . '</label><textarea class="form-control text__area" id="comment" name="comment" cols="45" rows="8" ' . $aria_req . 'placeholder="' . esc_attr__('Share a Comment here', 'turio') . '"></textarea></div>',
                    'fields'     => apply_filters('comment_form_default_fields', array(

                        'author' => '<div class="custom-input-group"><div class="mb-4"> <label>' . esc_attr__('Name', 'turio') . '</label><input id="author" name="author" type="text" class="form-control" value="' . esc_attr($commenter['comment_author'])
                            . '" placeholder="' . esc_attr__('Full Name', 'turio') . '" ' . $aria_req . '></div>',

                        'email' => '<div class="mb-4"> <label>' . esc_attr__('Email', 'turio') . '</label><input  class="form-control"  id="email" name="email" type="email"  value="' . esc_attr($commenter['comment_author_email'])
                            . '" placeholder="' . esc_attr__('Email Here', 'turio') . '" ' . $aria_req . '></div></div>',

                        'website' => '<div class="custom-input-group"> <label>' . esc_attr__('Website', 'turio') . '</label><input class="form-control" id="website" name="website" type="text" placeholder="' . esc_attr__('Website(optional)', 'turio') . '" /></div>',
                    )),
                    'class_submit' => 'btn btn-submit',
                    'label_submit' => esc_html__('Submit Now', 'turio'),
                    'format'       => 'xhtml'
                );

                ?>

                <?php
                comment_form($comments_args);
                ?>
            </div>
        </div>
    <?php endif ?>
</div><!-- #comments -->