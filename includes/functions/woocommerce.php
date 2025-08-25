<?php

// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');

// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');

function woocommerce_product_custom_fields()
{
    global $woocommerce, $post;

    $product = wc_get_product($post->ID);
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    // Children price
    woocommerce_wp_text_input(
        array(
            'id'            => 'turio_children_price',
            'value'         => get_post_meta(get_the_ID(), 'turio_children_price', true),
            'label'         => sprintf(esc_html__('Children Price (%s)', 'turio'), get_woocommerce_currency_symbol()),
            'desc_tip'      => 'true',
            'wrapper_class' => ($product->is_type('variable') || $product->is_type('grouped') || $product->is_type('external')) ? 'hide' : ''
        )
    );

    echo '</div>';
}

function woocommerce_product_custom_fields_save($post_id)
{
    // Children price
    update_post_meta($post_id, 'turio_children_price',  sanitize_text_field($_POST['turio_children_price']));
}

// Update add to Cart tour price

add_action('egns_tour_booking_form', 'turio_render_tour_data_booking_form');
function turio_render_tour_data_booking_form()
{
    global $woocommerce, $product;
    // Allowed HTML List 
    $allow_html = wp_kses_allowed_html('post');
    // form fields - input
    $allow_html['input'] = array(
        'class'         => array(),
        'id'            => array(),
        'name'          => array(),
        'value'         => array(),
        'type'          => array(),
        'autocomplete'  => array(),
        'checked'       => array(),
    );

    $product_services_meta_data = get_post_meta($product->get_id(), TURIO_META_ID . '-woocommerce', true);
    $product_children_price = get_post_meta($product->get_id(), 'turio_children_price', true);

    // Prepare Booking Date 
    $tour_booking_date = Egns_Helpers::turio_package_info('tour_date');

    $product_booking_date = '';
    $checked_first_item = '';
    if (!empty($tour_booking_date)) {
        foreach ($tour_booking_date as $key => $date) {

            if ($key == 0) {
                $checked_first_item = 'checked';
            } else {
                $checked_first_item = '';
            }

            $tour_from_date = isset($date['tour_start_date']) ? esc_html(date(get_option('date_format'), strtotime($date['tour_start_date']))) : '';
            $tour_to_date = isset($date['tour_end_date']) ? esc_html(date(get_option('date_format'), strtotime($date['tour_end_date']))) : '';
            $tour_date_value = $tour_from_date . '|' . $tour_to_date;
            if (!empty($tour_from_date) && !empty($tour_to_date)) {
                $product_booking_date .= '
                <div class="radio-item">
                    <label>
                        <input name="tour_booking_date" value="' . $tour_date_value . '" type="radio" ' . $checked_first_item . '></input> 
                        <div class="tour-date">
                            <div class="start-date">
                                <span>' . esc_html__('Check In', 'turio') . '</span>
                                <span> ' . $tour_from_date . ' </span>
                            </div>
                            <div class="radio-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <div class="end-date">
                                <span>' . esc_html__('Check Out', 'turio') . '</span>
                                <span>' . $tour_to_date . '</span>
                            </div>
                        </div> 
                    </label>
                </div>';
            }
        }
    }

    // Prepare Adults and Children

    // Check product sale price date Schedule

    $price_html = '';
    if (Egns_Helpers::egns_check_sale_price_schedule($product->get_id())) {
        $price_html = get_woocommerce_currency_symbol() . Egns_Helpers::egns_calculate_product_price($product->get_id())  . ' <del>' . get_woocommerce_currency_symbol() . $product->get_regular_price() . '</del>';
    } else {
        $price_html = get_woocommerce_currency_symbol() . Egns_Helpers::egns_calculate_product_price($product->get_id());
    }
    $product_adult_and_children = '';
    $product_adult_and_children .= '
    <div class="number-input-item adults">
        <label for="adultsPerson" class="number-input-lable"><span>' . esc_html__('Adult: ', 'turio') . ' </span><span> ' . $price_html . '</span></label>
        <div class="number-input">
            <span class="minus-qty">-</span>
            <input id="adultsPerson" name="adult_person" value="1" type="number" autocomplete="off" />
            <span class="plus-qty">+</span>
        </div>
    </div> ';
    if (!empty($product_children_price)) {
        $product_adult_and_children .= '
    <div class="number-input-item children">
        <label for="childrenPerson" class="number-input-lable"><span> ' . esc_html__('Children: ', 'turio') . ' </span><span>' . get_woocommerce_currency_symbol() . $product_children_price . '</span></label>
        <div class="number-input">
            <span class="minus-qty">-</span>
            <input id="childrenPerson" name="children_person" value="0" type="number" autocomplete="off"/>
            <span class="plus-qty">+</span>
        </div>
    </div>';
    }



    // Prepare services meta data
    $product_services_list = '';
    $product_services_heading = '';
    if (isset($product_services_meta_data['turio_woocommerce_services'])) {
        $product_services_heading = esc_html__('Other Extra Services', 'turio');
        foreach ($product_services_meta_data['turio_woocommerce_services'] as $key => $services_List) {
            $label = isset($services_List['turio_woocommerce_services_label']) ? esc_html($services_List['turio_woocommerce_services_label']) : '';
            $price = isset($services_List['turio_woocommerce_services_price']) ? get_woocommerce_currency_symbol() . esc_html($services_List['turio_woocommerce_services_price']) : '';

            $product_services_list .= "<label class='check-container'>$label
                <input type='checkbox' class='services_check' name='services_list[]' value='$key'>
                <span class='checkmark'></span>
                <span class='price'>$price </span>
            </label>";
        }
    }
    // Main form before markup
    $tour_id = get_the_ID();
    $form = '
    <div class="booking-form-item-type mb-40">
        <input type="hidden" value="' . $tour_id . '" name="tour_id" />
        <h5>Select Your Tour Date</h5>
            ' . $product_booking_date . '
        <div class="radio-item">
            <span class="custom-date">' . esc_html__('Custom Date', 'turio') . '</span>
            <label><input name="tour_booking_date" id="customTourBookingDate" type="radio"></input>
            <input placeholder="' . esc_attr('Custom date') . '" type="text" id="customDateDatepicker" value="' . Date('Y-m-d') . '" class="calendar" autocomplete="off"></label>
        </div>
    </div>
    <div class="booking-form-item-type">
        ' . $product_adult_and_children . '
    </div>
    <hr class="separate-line2">
    <div class="booking-form-item-type">
            <h5>' . $product_services_heading . '</h5>
            <div class="checkbox-container">
                ' . $product_services_list . '
            </div>
        </div>

        <div class="total-price"> <span class="turio-spinner"></span> ' . esc_html__('Total Price', 'turio') . ' <span class="main-price">' . get_woocommerce_currency_symbol() . Egns_Helpers::egns_calculate_product_price($product->get_id()) . '</span> </div>
    ';
    echo wp_kses($form, $allow_html);
}

// Logic to Save products custom fields values into the cart item data
add_action('woocommerce_add_cart_item_data', 'turio_add_tour_data_to_cart', 10, 2);

function turio_add_tour_data_to_cart($cart_item_data, $product_id)
{
    
    if (isset($_REQUEST['adult_person'])) {
        $cart_item_data['custom_data']['adult_person'] = (!empty($_REQUEST['adult_person'])) ? sanitize_text_field($_REQUEST['adult_person']) : '';
    }

    if (isset($_REQUEST['tour_id'])) {
        $cart_item_data['custom_data']['tour_id'] = (!empty($_REQUEST['tour_id'])) ? sanitize_text_field($_REQUEST['tour_id']) : '';
    }

    if (isset($_REQUEST['children_person'])) {
        $cart_item_data['custom_data']['children_person'] = (!empty($_REQUEST['children_person'])) ? sanitize_text_field($_REQUEST['children_person']) : '';
    }

    if (isset($_REQUEST['tour_booking_date'])) {
        $cart_item_data['custom_data']['tour_booking_date'] = (!empty($_REQUEST['tour_booking_date'])) ? sanitize_text_field($_REQUEST['tour_booking_date']) : '';
    }

    if (isset($_REQUEST['services_list'])) {
        $cart_item_data['custom_data']['services_list'] = (!empty($_REQUEST['services_list'])) ? Egns_Helpers::egns_sanitize_array_recursive($_REQUEST['services_list']) : '';
    }
    if (isset($product_id)) {
        $cart_item_data['custom_data']['adult_price'] = Egns_Helpers::egns_calculate_product_price($product_id);
        $cart_item_data['custom_data']['children_price'] = get_post_meta($product_id, 'turio_children_price', true);
    }
    // below statement make sure every add to cart action as unique line item
    $cart_item_data['custom_data']['tour_id'] = $cart_item_data['custom_data']['tour_id'];
    $cart_item_data['custom_data']['unique_key'] = md5(microtime() . rand());

    return $cart_item_data;
}

add_action('woocommerce_before_calculate_totals', 'turio_calculate_total_cart_price', 10);
function turio_calculate_total_cart_price($cart_object)
{

    foreach ($cart_object->get_cart() as $item_values) {
        $services_list = get_post_meta($item_values['product_id'], TURIO_META_ID . '-woocommerce', true);
        $children_price = get_post_meta($item_values['product_id'], 'turio_children_price', true);
        $new_price = 0; // Initialze new price with 0

        if (isset($item_values['custom_data']['adult_person'])) {
            $new_price += (int) $item_values['custom_data']['adult_person'] * Egns_Helpers::egns_calculate_product_price($item_values['product_id']); // Calculate regular price with adult person
        }
        if (isset($item_values['custom_data']['children_person'])) {
            $new_price += (int) $item_values['custom_data']['children_person'] * $children_price; // Calculate regular price with children person
        }
        if (!empty($item_values['custom_data']['services_list'])) {
            foreach ($item_values['custom_data']['services_list'] as $value) {
                if (!empty($services_list['turio_woocommerce_services'][$value]['turio_woocommerce_services_price'])) {
                    $new_price += $services_list['turio_woocommerce_services'][$value]['turio_woocommerce_services_price'];
                }
            }
        }

        ## Set the new item price in cart
        if (isset($item_values['custom_data']['adult_person']) || isset($item_values['custom_data']['children_person']) || !empty($item_values['custom_data']['services_list'])) {

            $item_values['data']->set_price($new_price); // Set price for specific product price before add to cart
        }
    }
}

// After add to cart redirect to Cart Page
add_filter('woocommerce_add_to_cart_redirect', function ($url) {
    return wc_get_cart_url();
});

/**
 * Display engraving text in the cart.
 *
 * @param array $item_data
 * @param array $cart_item
 *
 * @return array
 */
function turio_display_engraving_text_cart($item_data, $cart_item)
{

    if (isset($cart_item['custom_data']['adult_person'])) {
        $item_data[] = array(
            'key'     => esc_html__('Adult Person', 'turio'),
            'value'   => wc_clean(get_woocommerce_currency_symbol() . $cart_item['custom_data']['adult_price'] . ' X ' . $cart_item['custom_data']['adult_person']),
            'display' => '',
        );
    }
    if (isset($cart_item['custom_data']['children_person'])) {
        $item_data[] = array(
            'key'     => esc_html__('Children Person', 'turio'),
            'value'   => wc_clean(get_woocommerce_currency_symbol() . $cart_item['custom_data']['children_price'] . ' X ' . $cart_item['custom_data']['children_person']),
            'display' => '',
        );
    }

    if (isset($cart_item['custom_data']['tour_booking_date']) && ($cart_item['custom_data']['tour_booking_date'] != 'on')) {
        $item_data[] = array(
            'key'     => esc_html__('Travel Date', 'turio'),
            'value'   => wc_clean(str_replace('|', ' to ', $cart_item['custom_data']['tour_booking_date'])),
            'display' => '',
        );
    }
    if (isset($cart_item['custom_data']['services_list'])) {
        $services_list = get_post_meta($cart_item['product_id'], TURIO_META_ID . '-woocommerce', true);
        $cart_services = [];
        foreach ((array) $cart_item['custom_data']['services_list'] as $cart_services_list) {
            $cart_services[] = $services_list['turio_woocommerce_services'][$cart_services_list];
        }
        $selected_service_list = '<ul>';
        foreach ($cart_services as $service) {
            $selected_service_list .= '<li>' . $service['turio_woocommerce_services_label'] . '-' . get_woocommerce_currency_symbol() . $service['turio_woocommerce_services_price'] . '</li>';
        }
        $selected_service_list .= '</ul>';
        $item_data[] = array(
            'key'     => esc_html__('Extra Services', 'turio'),
            'value'   => wp_kses_post($selected_service_list),
            'display' => '',
        );
    }

    return $item_data;
}

add_filter('woocommerce_get_item_data', 'turio_display_engraving_text_cart', 10, 2);


// Show Order information in woocommerce dashboard border
add_action('woocommerce_add_order_item_meta', 'add_order_item_meta_after_order', 10, 3);
function add_order_item_meta_after_order($item_id, $cart_item, $cart_item_key)
{

    if (isset($cart_item['custom_data']['adult_person'])) {
        $order_meta_service_template = '';
        $order_meta_adult_person = '<p>' . get_woocommerce_currency_symbol() . $cart_item['custom_data']['adult_price'] . ' X ' . $cart_item['custom_data']['adult_person'] . '</p>';
        $order_meta_children_person = '<p>' . get_woocommerce_currency_symbol() . $cart_item['custom_data']['children_price'] . ' X ' . $cart_item['custom_data']['children_person'] . '</p>';
        $order_meta_travel_date = '<p>' . str_replace('|', ' to ', $cart_item['custom_data']['tour_booking_date']) . '</p>';
        // Service List 
        $services_list = get_post_meta($cart_item['product_id'], TURIO_META_ID . '-woocommerce', true);
        $cart_services = [];
        foreach ((array) $cart_item['custom_data']['services_list'] as $cart_services_list) {
            $cart_services[] = $services_list['turio_woocommerce_services'][$cart_services_list];
        }
        $order_meta_service_template .= '<ul class="order-info-list">';
        foreach ((array) $cart_services as $service) {
            $order_meta_service_template .= '<li><p><strong>' . $service['turio_woocommerce_services_label'] . '</strong>: ' . get_woocommerce_currency_symbol() . $service['turio_woocommerce_services_price'] . '</p></li>';
        }
        $order_meta_service_template .= '</ul>';
    }

    wc_add_order_item_meta($item_id, esc_html('Adult Person'), wp_kses_post($order_meta_adult_person), true);
    wc_add_order_item_meta($item_id, esc_html('Children Person'), wp_kses_post($order_meta_children_person), true);
    wc_add_order_item_meta($item_id, esc_html('Travel Date'), wp_kses_post($order_meta_travel_date), true);
    wc_add_order_item_meta($item_id, esc_html('Extra Features'), wp_kses_post($order_meta_service_template), true);
}
