<?php
$current_user = wp_get_current_user();
$url  = get_permalink();

if( !empty( Egns_Helpers::egns_get_theme_option('tour_criteria') ) ) {
    $review_rating_criteria =  Egns_Helpers::egns_get_theme_option('tour_criteria');
}else {
    $review_rating_criteria = [ ['criteria_item' =>  'Overall'],['criteria_item' =>  'Accommodation'],['criteria_item' => 'Transport'],['criteria_item' => 'Food'], ['criteria_item' => 'Destination'] ];
}

?>

<div class="review-sec">
    <?php if( !empty( Egns_Helpers::egns_get_theme_option('tour_review_heading') ) ) : ?>
        <h4><?php echo Egns_Helpers::egns_get_theme_option('tour_review_heading'); ?></h4>
    <?php else : ?>
        <h4><?php echo esc_html__( 'Customer Review','turio' ) ?></h4>
    <?php endif ?>
    <div class="review-box">
        <?php if (Egns_Helpers::egns_is_rating_exists(get_the_title())) : ?>
            <div class="total-review">
                <?php if (isset(Egns_Helpers::egns_return_avg_rating_based_on_criteria(get_the_title())['avg_rating_point'])) : ?>
                    <h2><?php echo Egns_Helpers::egns_return_avg_rating_based_on_criteria(get_the_title())['avg_rating_point'] ?><b><?php echo esc_html__('( Out of 10 )', 'turio') ?></b></h2>
                <?php endif ?>
                <div>
                    <?php if (Egns_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) > 0) : ?>
                        <ul class="star-list">
                            <?php
                            for ($x = 1; $x <= 5; $x++) {
                                if (Egns_Helpers::egns_get_avg_rating_by_tour_title(get_the_title()) >= $x) {
                                    echo wp_kses_post('<li><i class="bi bi-star-fill"></i></li>');
                                } else {
                                    echo wp_kses_post('<li><i class="bi bi-star"></i></li>');
                                }
                            }
                            ?>
                        </ul>
                        <?php if (Egns_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) > 0) : ?>
                            <span>(<?php echo Egns_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()); ?> <?php echo Egns_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) == 1 ? esc_html__('Review', 'turio') : esc_html__('Reviews', 'turio') ?>)</span>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
        <?php else : ?>
            <h4><?php echo esc_html__('No rating found', 'turio') ?></h4>
        <?php endif ?>
        <!-- modal for review -->
        <div class="modal fade" id="ratingModal" aria-hidden="true" aria-labelledby="ratingModalLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close cross-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body d-flex flex-row flex-lg-nowrap flex-wrap align-items-center">
                        <div class="comment-form-wrapper">
                            <?php if( !empty( Egns_Helpers::egns_get_theme_option('tour_review_title') ) ) : ?>
                                <h3 id="reply-title"><?php echo esc_html(Egns_Helpers::egns_get_theme_option('tour_review_title')) ?></h3>
                            <?php else : ?>
                                <h3 id="reply-title"><?php echo esc_html__( 'Write Your Review', 'turio' ) ?></h3>
                            <?php endif ?>
                            <form action="<?php echo esc_url($url) ?>" method="post" id="review_rating" name="review_rating">
                                <input type="hidden" value="1" name="customer_id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="custom-input-group">
                                            <input type="text" class="form-control text__area" name="customer_name" value="<?php echo esc_html($current_user->display_name) ?>" placeholder="<?php echo esc_attr__('Your Name:', 'turio') ?>">
                                        </div>
                                        <span class="customer_name_error d-none text-start text-danger"><?php echo esc_html('Customer name field is required') ?></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-input-group">
                                            <input type="text" class="form-control text__area" name="customer_email" value="<?php echo esc_html($current_user->user_email) ?>" placeholder="<?php echo esc_attr__('Your Email Address:', 'turio') ?>">
                                        </div>
                                        <span class="customer_email_error d-none text-start text-danger"><?php echo esc_html('Email address field is required') ?></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="custom-input-group">
                                            <input type="text" class="form-control text__area" name="review_title" placeholder="<?php echo esc_attr__('Reivew Title:', 'turio') ?>">
                                        </div>
                                        <span class="review_title_error d-none text-start text-danger"><?php echo esc_html('Review title field is required') ?></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="custom-input-group">
                                            <textarea name="review_message" class="form-control text__area" rows="5" placeholder="<?php echo esc_attr__('Review Message', 'turio') ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="star-rating-wrapper">
                                            <ul class="review-item-list">
                                                <?php foreach ((array) $review_rating_criteria as $key => $criteria) : ?>
                                                    <?php if (isset($criteria['criteria_item'])) : ?>
                                                        <li>
                                                            <ul class="star-list">
                                                                <fieldset class="rating">
                                                                    <input type="radio" class="rating_last" id="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star5" name="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>" value="5" />
                                                                    <label for="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star5" title="5 stars"></label>
                                                                    <input type="radio" id="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star4" name="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>" value="4" />
                                                                    <label for="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star4" title="4 stars"></label>
                                                                    <input type="radio" id="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star3" name="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>" value="3" />
                                                                    <label for="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star3" title="3 stars"></label>
                                                                    <input type="radio" id="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star2" name="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>" value="2" />
                                                                    <label for="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star2" title="2 stars"></label>
                                                                    <input type="radio" id="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star1" name="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>rating" value="1" />
                                                                    <label for="<?php echo esc_attr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_',  $criteria['criteria_item'])) . 'rating')) ?>star1" title="1 star"></label>
                                                                </fieldset>
                                                            </ul>
                                                            <span><?php echo esc_html($criteria['criteria_item']) ?></span>
                                                        </li>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="rating_all_fields_error d-none text-start text-danger"><?php echo esc_html('Please fill up all the Fields') ?></span>
                                    </div>
                                    <div class="col-lg-12 form-submit">
                                        <?php wp_nonce_field('rating_nonce', 'custom_rating_nonce'); ?>
                                        <button type="submit" id="ratingFormSubmit" value="ratingFormSubmit" class="btn btn-submit"><?php echo esc_html__('Submit Now', 'turio') ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php if (!empty(Egns_Helpers::egns_get_theme_option('tour_review_modal_banner', 'url'))) : ?>
                            <div class="modal-form-image">
                                <img src="<?php echo esc_url(Egns_Helpers::egns_get_theme_option('tour_review_modal_banner', 'url')) ?>" alt="image" class="img-fluid">
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <a class="button-fill-primary" data-bs-toggle="modal" href="#ratingModal" role="button"><?php echo esc_html__('GIVE A RATING', 'turio') ?></a>
    </div>
</div>

<?php
$args = array(
    'post_type'         => 'review-rating',
    'posts_per_page'    => Egns_Helpers::egns_get_theme_option('tour_review_posts_per_page') ? Egns_Helpers::egns_get_theme_option('tour_review_posts_per_page') : 3,
    'meta_query' => array(
        'relation'      => 'AND',
        array(
            'key'       => 'tour_booking_review_rating',
            'value'     => esc_html(get_the_title()),
            'compare'   => 'LIKE'
        ),
        array(
            'key'       => 'tour_booking_review_rating',
            'value'     => esc_html('approve'),
            'compare'   => 'LIKE'
        )
    )
);
$all_rating = get_posts($args);
?>
<?php if (count($all_rating) > 0) : ?>
    <!-- review-comment-area -->
    <div class="review-commetn-area">
        <ul class="review-comment-list turio-spinner-active">
            <span class="turio-spinner"></span>
            <?php foreach ((array) $all_rating as $rating) :  ?>
                <li>
                    <div class="comment-item">
                        <div class="image">
                            <?php
                                $current_user = wp_get_current_user();
                                $avatar = get_avatar($current_user->ID, 96);
                                echo wp_kses_post( $avatar );
                            ?>
                        </div>
                        <div class="content">
                            <div class="comment-meta">
                                <h5><?php echo Egns_Helpers::egns_post_meta_box_value_by_id($rating->ID, 'tour_booking_review_rating', 'review_title')  ?> - </h5><span><?php echo  esc_html(date("M j, Y", strtotime($rating->post_date))) ?? '' ?><b><?php echo esc_html__('Review by-', 'turio') ?></b><?php echo Egns_Helpers::egns_post_meta_box_value_by_id($rating->ID, 'tour_booking_review_rating', 'customer_name') ?></span>
                            </div>
                            <p><?php echo Egns_Helpers::egns_post_meta_box_value_by_id($rating->ID, 'tour_booking_review_rating', 'review_message') ?></p>
                            <?php
                                $rating_meta = Egns_Helpers::egns_post_meta_box_value_by_id($rating->ID, 'tour_booking_review_rating', 'review_rating');
                            ?>
                            <ul class="review-item-list">
                                <?php foreach ($rating_meta as $rating_nested) : ?>
                                    <li>
                                        <span><?php echo esc_html($rating_nested['reivew_criteria']) ?></span>
                                        <ul class="star-list">
                                            <?php
                                            for ($x = 1; $x <= 5; $x++) {
                                                if ($rating_nested['reivew_criteria_rating'] >= $x) {
                                                    echo wp_kses_post('<li><i class="bi bi-star-fill"></i></li>');
                                                } else {
                                                    echo wp_kses_post('<li><i class="bi bi-star"></i></li>');
                                                }
                                            }

                                            ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
            <?php wp_reset_postdata() ?>
        </ul>
        <?php if (Egns_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) > Egns_Helpers::egns_get_theme_option('tour_review_posts_per_page')) : ?>
            <span id="reviewLoadMore" class="text-center"> <?php echo Egns_Helpers::egns_get_theme_option('tour_review_load_more_text') ? esc_html( Egns_Helpers::egns_get_theme_option('tour_review_load_more_text') ) : esc_html('Load More') ?> <i class="bi bi-arrow-right"></i></span>
        <?php endif ?>    
    </div>
<?php endif ?>