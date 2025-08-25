<?php

// Contact Form Remove P Tag
add_filter('wpcf7_autop_or_not', '__return_false');

// Review & Rating Table Column
function egns_add_custom_column_on_rating_table($columns)
{
    $columns['review_rating']           = esc_html('Rating');
    $columns['review_message']          = esc_html('Review');
    $columns['tour_title']              = esc_html('Tour Title');
    $columns['turio_tour_actions']   = esc_html('Actions');
    return $columns;
}
add_filter('manage_edit-review-rating_columns', 'egns_add_custom_column_on_rating_table');

function egns_review_rating_custom_column($column, $post_id)
{
    $allow_html['button'] = array(
        'post-id'       => array(),
        'class'         => array(),
        'id'            => array(),
        'name'          => array(),
        'value'         => array(),
        'type'          => array(),
    );
    $post_meta_by_post_id = get_post_meta($post_id, 'tour_booking_review_rating', true);

    if (isset($post_meta_by_post_id['review_rating']) &&  $column === 'review_rating') {
        $review_rating_list = '';
        $rating_criteria_count = count($post_meta_by_post_id['review_rating']);
        $rating_criteria_rating = 0;
        foreach ($post_meta_by_post_id['review_rating'] as $rating) {
            $rating_icons = '';
            $rating_criteria_rating += $rating['reivew_criteria_rating'];
            for ($x = 1; $x <= 5; $x++) {
                if ($rating['reivew_criteria_rating'] >= $x) {
                    $rating_icons .= wp_kses_post('<span class="dashicons dashicons-star-filled"></span>');
                } else {
                    $rating_icons .= wp_kses_post('<span class="dashicons dashicons-star-empty"></span>');
                }
            }
            $review_rating_list .= '<li><span>' . $rating['reivew_criteria'] . ' : </span><div class="rating">' . $rating_icons . '</div></li>';
        }
        $rating_avg = round(($rating_criteria_rating / $rating_criteria_count));
        $review_rating_list .= esc_html('Average : ' . $rating_avg . '');
        echo wp_kses_post($review_rating_list);
    }

    if (isset($post_meta_by_post_id['review_message']) &&  $column === 'review_message') {
        echo wp_kses_post($post_meta_by_post_id['review_message']);
    }
    if (isset($post_meta_by_post_id['tour_title']) && $column === 'tour_title') {
        echo esc_html($post_meta_by_post_id['tour_title']);
    }
    if ($column === 'turio_tour_actions') {
        $action_options_approve = '<button value="approve" class="turio_tour_action" post-id=' . $post_id . '>Approve</>';
        $action_options_unapprove = '<button value="reject" class="turio_tour_action" post-id=' . $post_id . '>Unapprove</>';
        if (isset($post_meta_by_post_id['review_status']) && $post_meta_by_post_id['review_status'] == 'approve') {
            echo wp_kses($action_options_unapprove, $allow_html);
        } else {
            echo wp_kses($action_options_approve, $allow_html);
        }
    }
}
add_action('manage_review-rating_posts_custom_column', 'egns_review_rating_custom_column', 10, 2);

// Remove Review & Rating and Enquiries Actions Button
add_filter('page_row_actions', 'egns_remove_review_rating_actions', 10, 2);
function egns_remove_review_rating_actions($actions, $post)
{
    if ('review-rating' == $post->post_type || 'enquiries' == $post->post_type) {
        return array();
    }
    return $actions;
}

// Remove woocommerce download options 
function egns_remove_my_account_downloads($items)
{
    unset($items['downloads']);
    return $items;
}
add_filter('woocommerce_account_menu_items', 'egns_remove_my_account_downloads', 999);

// 1. Show plus minus buttons
function turio_display_quantity_plus()
{
    echo '<button type="button" class="plus"><i class="bi bi-plus-lg"></i></button>';
}
add_action('woocommerce_after_quantity_input_field', 'turio_display_quantity_plus');

function turio_display_quantity_minus()
{
    echo '<button type="button" class="minus"><i class="bi bi-dash-lg"></i></button>';
}
add_action('woocommerce_before_quantity_input_field', 'turio_display_quantity_minus');
