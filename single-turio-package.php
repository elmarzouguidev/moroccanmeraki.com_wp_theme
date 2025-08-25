<?php
    $tour_id    = get_the_ID();
    $tour_permalink = get_the_permalink();
    // Rating Form Submit 
    $post_id = '';
    $tour_title = get_the_title();

    // Theme Options value 
    $theme_options = get_option('egns_theme_options'); // prefix of theme
    
    $tour_date      = is_array(Egns_Helpers::turio_package_info('tour_date')) ? Egns_Helpers::turio_package_info('tour_date') : '';
    $tour_product   = Egns_Helpers::turio_package_info('tour_product') ? Egns_Helpers::turio_package_info('tour_product') : '';
    // Get Product Information

    $children_price = get_post_meta($tour_product, 'turio_children_price', true);

    $turio_theme_options = get_option('turio_theme_options');

    if( !empty( Egns_Helpers::egns_get_theme_option('tour_criteria') ) ) {
        $review_rating_criteria =  Egns_Helpers::egns_get_theme_option('tour_criteria');
    }else {
        $review_rating_criteria = [ ['criteria_item' =>  'Overall'],['criteria_item' =>  'Accommodation'],['criteria_item' => 'Transport'],['criteria_item' => 'Food'], ['criteria_item' => 'Destination'] ];
    }
    
    // Handle Review & Rating
    if ((isset($_POST['custom_rating_nonce']))) {
        // Get Post Data
        $customer_name          = sanitize_text_field($_POST['customer_name']);
        $customer_email         = sanitize_text_field($_POST['customer_email']);
        $review_message         = wp_kses_post($_POST['review_message']);
        $customer_id            = wp_kses_post($_POST['customer_id']);
        $review_title           = wp_kses_post($_POST['review_title']);

        $post = array(
            'post_type'     => 'review-rating',
            'post_title'    => $customer_name,
            'post_status'   => 'publish',
        );
        $post_id = wp_insert_post($post);

        $review_rating_array = [];

        if (count($review_rating_criteria) > 0) {
            foreach ($review_rating_criteria as $rating) {
                $input_name = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $rating['criteria_item'])) . 'rating');
                if (isset($_POST[$input_name])) {
                    $reivew_rating = sanitize_text_field($_POST[$input_name]);
                } else {
                    $reivew_rating = 1;
                }
                $rating_criteria_array = [];
                $rating_criteria_array['reivew_criteria'] = $rating['criteria_item'];
                $rating_criteria_array['reivew_criteria_rating'] = $reivew_rating;
                $review_rating_array[] = $rating_criteria_array;
            }
        }
        $tour_package_with_links = esc_url($tour_permalink);
        $post_meta_array = array(
            'customer_id'           => $customer_id,
            'tour_url'              => $tour_package_with_links,
            'tour_title'            => $tour_title,
            'review_title'          => $review_title,
            'customer_email'        => $customer_email,
            'customer_name'         => $customer_name,
            'review_message'        => $review_message,
            'review_rating'         => $review_rating_array,
            'review_status'         => esc_html('pending'),
        );

        add_post_meta($post_id, 'tour_booking_review_rating', $post_meta_array);

        if (isset($post_id)) {
            wp_reset_postdata();
            wp_reset_query();
            wp_redirect(get_the_permalink()); 
        }
    }

?>
<?php
    get_header();
    get_template_part( 'template-parts/breadcrumbs/breadcrumb-single' );
?>
<div class="package-details-wrapper pt-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                        while ( have_posts() ):
                            the_post();
                            get_template_part( 'loop-templates/content', 'single-package' );
                        endwhile;
                        wp_reset_postdata();
                        // End of the loop.
                    ?>
                    <?php 
                        if( Egns_Helpers::egns_get_theme_option('tour_rating_enable') != 'disable' ) {
                            get_template_part('template-parts/tour/review-rating');
                        }
                    ?>
                </div>
                <div class="col-lg-4 ps-lg-4">
                    <?php 
                        $product = '';
                        if( class_exists('WooCommerce') ) {
                            $product = wc_get_product($tour_product);
                        }
                    ?>
                    <div class="booking-form-box">
                        <?php
                            require_once( get_template_directory() . '/template-parts/tour/tour-booking.php' );
                        ?>
                    </div>
                    <div class="package-sidebar">
                        <?php
                            if ( is_active_sidebar( 'tour_package_single' ) ) {
                                dynamic_sidebar( 'tour_package_single' );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();