<?php
//Get title value
$turio_theme_options = get_option('turio_theme_options');
$tour_package_form_title = $turio_theme_options['tour_package_form_title'];
?>
<?php if (!empty($tour_package_form_title)) : ?>
    <h3><?php echo sprintf(__('%s', 'turio'), $tour_package_form_title) ?></h3>
<?php endif ?>

<?php if (!empty($product)) : ?>
    <h5><?php echo esc_html__('Base Price ', 'turio') ?><?php turio_get_package_price() ?></h5>
<?php endif ?>
<?php if (empty(Egns_Helpers::turio_package_info('tour_booking_options')) || (!empty(Egns_Helpers::turio_package_info('tour_booking_options')) && Egns_Helpers::turio_package_info('tour_booking_options') == 'both')) : ?>
    <hr class="separate-line">
    <div class="nav flex-row justify-content-center gap-4 nav-pills mb-40" role="tablist">
        <?php if (!empty($product)) : ?>
            <button class="nav-link <?php echo esc_attr(Egns_Helpers::turio_package_info('tour_booking_options') != 'enquiry_form') ? 'show active' : '' ?> eg-btn btn--primary-outline btn--sm" id="v-pills-booking-tab" data-bs-toggle="pill" data-bs-target="#v-pills-booking" type="button" role="tab" aria-controls="v-pills-booking" aria-selected="true"><?php echo esc_html__(' Booking Form', 'turio') ?></button>
        <?php endif ?>
        <?php if (!empty($product)) : ?>
            <button class="nav-link eg-btn <?php echo (Egns_Helpers::turio_package_info('tour_booking_options') == 'enquiry_form' || empty($product)) ? 'active' : '' ?> btn--primary-outline btn--sm" id="v-pills-contact-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact" type="button" role="tab" aria-controls="v-pills-contact" aria-selected="true"><?php echo esc_html__('Enquiry Form', 'turio') ?></button> <?php endif ?>
    </div>
<?php endif ?>
<div class="tab-content" id="v-pills-tabContent2">
    <?php if ( class_exists('Woocommerce') && (Egns_Helpers::turio_package_info('tour_booking_options') != 'enquiry_form') && !empty($tour_product) ) : ?>
        <div class="tab-pane fade show active" id="v-pills-booking" role="tabpanel" aria-labelledby="v-pills-booking-tab">
            <div class="sidebar-booking-form">
                <input id="productId" type="hidden" value="<?php echo esc_attr($tour_product) ?>">
                <hr class="separate-line2">
                <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" name="review-rating-from" method="post" enctype='multipart/form-data'>
                    <?php do_action('egns_tour_booking_form'); ?>

                    <?php do_action('woocommerce_before_add_to_cart_button'); ?>
                    <?php
                    do_action('woocommerce_before_add_to_cart_quantity');

                    do_action('woocommerce_after_add_to_cart_quantity');
                    ?>
                    <button type="submit" class="button-fill-primary btn--lg w-100 mt-3" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html('Book Now'); ?></button>

                    <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                </form>
                <?php if (is_admin()) : ?>
                    <h4><?php echo esc_html__('Please select a woocommerce product first', 'turio') ?></h4>
                <?php endif ?>
            </div>
        </div>
    <?php endif ?>
    <?php if ((Egns_Helpers::turio_package_info('tour_booking_options') != 'booking_form') || ((Egns_Helpers::turio_package_info('tour_booking_options') == 'booking_form') && empty($tour_product) )) : ?>
        <div class="tab-pane fade <?php echo (Egns_Helpers::turio_package_info('tour_booking_options') == 'enquiry_form' || empty($product) || !class_exists('Woocommerce')) ? 'show active' : '' ?>" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
            <?php get_template_part('template-parts/tour/enquiries') ?>
        </div>
    <?php endif ?>
</div>