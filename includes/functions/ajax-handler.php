<?php 

/**
 * Add localize scripts for admin
 *
 * @return void
 */
function egens_ajax_handler_scripts()
{

	global $wp_query;

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script('admin-js', 'egens_ajax_handler_params', array(
		'ajaxurl' => home_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
		'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
		'wp_date_format' => get_option( 'date_format' ),
		'is_woocommerce_active'	=> class_exists('WooCommerce') ? true : false,
	));
}

add_action('admin_enqueue_scripts', 'egens_ajax_handler_scripts');

add_action('wp_ajax_turio_tour_rating_action', 'egens_turio_tour_rating_action_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_turio_tour_rating_action', 'egens_turio_tour_rating_action_ajax_handler'); // wp_ajax_nopriv_{action}

function egens_turio_tour_rating_action_ajax_handler() {

	// Get Updated Data 
	$post_id 		= sanitize_text_field( $_POST['post_id'] );
	$post_status	= sanitize_text_field( $_POST['post_status'] );

	// Get Old Data 
	$post_meta 		= get_post_meta($post_id,'tour_booking_review_rating',true);
	$post_meta_array = array(
		'customer_id'           => sanitize_text_field( $post_meta['customer_id'] ),
		'tour_url'       		=> sanitize_text_field( $post_meta['tour_url'] ),
		'tour_title'    		=> sanitize_text_field( $post_meta['tour_title'] ), 
		'review_title'    		=> sanitize_text_field( $post_meta['review_title'] ), 
		'customer_email'        => sanitize_text_field( $post_meta['customer_email'] ),
		'customer_name'         => sanitize_text_field( $post_meta['customer_name'], ),
		'review_message'        => sanitize_text_field( $post_meta['review_message'] ),
		'review_rating'         => Egns_Helpers::egns_sanitize_array_recursive($post_meta['review_rating']),
		'review_status'         => sanitize_text_field( $post_status ) 
	);
	update_post_meta($post_id, 'tour_booking_review_rating', $post_meta_array);
	die();
}

/**
 * Add localize scripts for frontend
 *
 * @return void
 */
function egens_frontend_ajax_handler_scripts()
{

	global $wp_query;

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script('turio-main', 'egens_frontend_ajax_handler_params', array(
		'ajaxurl' => home_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
		'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
		'wp_date_format' => get_option( 'date_format' ),
		'is_egns_core_enable'  			  => class_exists('CSF') ? true : false,
		'post_title' => get_the_title(),
	));
}

add_action('wp_enqueue_scripts', 'egens_frontend_ajax_handler_scripts');

// Get Product Data by ID
function egns_get_product_data_by_id_ajax_handler()
{

	$product = wc_get_product($_POST['product_id']);
	$services_list = get_post_meta($product->get_id(), TURIO_META_ID . '-woocommerce', true);
	$children_person = get_post_meta($product->get_id(), 'turio_children_price', true);
	$total_price = 0;

	if (isset($_POST['product_info']['adultsPerson'])) {
		$total_price += (float) Egns_Helpers::egns_calculate_product_price($product->get_id()) * (int) $_POST['product_info']['adultsPerson'];
	}

	if (isset($_POST['product_info']['childrenPerson'])) {
		$total_price += (float) $children_person * (int) $_POST['product_info']['childrenPerson'];
	}

	foreach ($_POST['product_info']['servicesList'] as $value) {
		$total_price += $services_list['turio_woocommerce_services'][$value]['turio_woocommerce_services_price'];
	}

	$product_data = [
		'total_price' => get_woocommerce_currency_symbol() . $total_price,
	];

	print_r(json_encode($product_data));
	die();
}


add_action('wp_ajax_egns_get_product_data_by_id', 'egns_get_product_data_by_id_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_egns_get_product_data_by_id', 'egns_get_product_data_by_id_ajax_handler'); // wp_ajax_nopriv_{action}

// Enquiry Form Handler 
add_action('wp_ajax_enquiry_form_handler', 'egens_enquiry_form_handler_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_enquiry_form_handler', 'egens_enquiry_form_handler_ajax_handler'); // wp_ajax_nopriv_{action}

function egens_enquiry_form_handler_ajax_handler() {
	$enquiries_fullname 			= isset( $_POST['getEnquiryFormData']['enquiries_fullname'] ) ? sanitize_text_field( $_POST['getEnquiryFormData']['enquiries_fullname'] ) : '';
	$enquiries_email_address 		= isset( $_POST['getEnquiryFormData']['enquiries_email_address'] ) ? sanitize_text_field( $_POST['getEnquiryFormData']['enquiries_email_address'] ) : '';
	$enquiries_phone 				= isset( $_POST['getEnquiryFormData']['enquiries_phone'] ) ? sanitize_text_field( $_POST['getEnquiryFormData']['enquiries_phone'] ) : '';
	$enquiries_people 				= isset( $_POST['getEnquiryFormData']['enquiries_people'] ) ? sanitize_text_field( $_POST['getEnquiryFormData']['enquiries_people'] ) : '';
	$enquiries_number_of_tickets 	= isset( $_POST['getEnquiryFormData']['enquiries_number_of_tickets'] ) ? sanitize_text_field( $_POST['getEnquiryFormData']['enquiries_number_of_tickets'] ) : '';
	$enquiries_message 				= isset( $_POST['getEnquiryFormData']['enquiries_message'] ) ? wp_kses_post( $_POST['getEnquiryFormData']['enquiries_message'] ) : '';
	$enquiries_package_id 			= isset( $_POST['getEnquiryFormData']['enquiries_package_id'] ) ? sanitize_text_field( $_POST['getEnquiryFormData']['enquiries_package_id'] ) : '';
	
	$enquiries = array(
		'post_type'     => 'enquiries',
		'post_title'    => $enquiries_fullname,
		'post_status'   => 'publish',
	);
	$enquiries_id = wp_insert_post( $enquiries );

	// Get Tour by Id
	$tour = get_post($enquiries_package_id);

	$tour_enquiries_array = array(
		'enquiries_fullname'            => $enquiries_fullname,
		'enquiries_email_address'       => $enquiries_email_address,
		'enquiries_phone'               => $enquiries_phone,
		'enquiries_people'              => $enquiries_people,
		'enquiries_number_of_tickets'   => $enquiries_number_of_tickets,
		'enquiries_message'             => $enquiries_message,
		'enquiries_package_id'          => $tour->post_title ?? '',
	);

	add_post_meta($enquiries_id, 'tour_turio_enquiries', $tour_enquiries_array);
	
}


// Review load more 
function egns_review_load_more_ajax_handler() {
	$post_title = sanitize_text_field( $_POST['post_title'] );
	// prepare our arguments for the query
	$args = array(
		'post_type'         => sanitize_text_field( $_POST['post_type'] ),
		'paged' 			=> sanitize_text_field( $_POST['page'] ) + 1,
		'posts_per_page'    => Egns_Helpers::egns_get_theme_option('tour_review_posts_per_page') ? Egns_Helpers::egns_get_theme_option('tour_review_posts_per_page') : 3,
		'meta_query' => array(
			'relation'      => 'AND',
			array(
				'key'       => 'tour_booking_review_rating',
				'value'     => esc_html( $post_title ),
				'compare'   => 'LIKE' 
			),
			array(
				'key'       => 'tour_booking_review_rating',
				'value'     => esc_html('approve'),
				'compare'   => 'LIKE'
			)
		)
	);
	$all_rating = get_posts( $args ); ?>
	<?php if( count( (array) $all_rating ) > 0 ) : ?>
		<?php foreach( (array) $all_rating as $rating )  :  ?>
			<li>
				<div class="comment-item">
					<div class="image">
						<?php 
							$current_user = wp_get_current_user();
							$avatar = get_avatar($current_user->ID, 96);
							echo wp_kses($avatar, wp_kses_allowed_html('post'));
						?>
					</div>
					<div class="content">
						<div class="comment-meta">
							<h5> <?php echo Egns_Helpers::egns_post_meta_box_value_by_id( $rating->ID,'tour_booking_review_rating','customer_name') ?>-</h5><span><?php echo  esc_html( date( "M j, Y g:i a", strtotime( $rating->post_date ) ) ) ?? '' ?></span>
						</div>
						<p><?php echo Egns_Helpers::egns_post_meta_box_value_by_id( $rating->ID,'tour_booking_review_rating','review_message') ?></p>
						<?php 
							$rating_meta = Egns_Helpers::egns_post_meta_box_value_by_id( $rating->ID,'tour_booking_review_rating','review_rating' );
						?>
						
						<ul class="review-item-list">
							<?php foreach( $rating_meta as $rating_nested ) : ?>
							<li>
								<span><?php echo esc_html( $rating_nested['reivew_criteria'] ) ?></span>
								<ul class="star-list">
									<?php 
										for ($x = 1; $x <= 5; $x++) {
											if( $rating_nested['reivew_criteria_rating'] >= $x ) {
												echo wp_kses_post( '<li><i class="bi bi-star-fill"></i></li>' );
											}else{
												echo wp_kses_post( '<li><i class="bi bi-star"></i></li>' );
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
	<?php else :  ?>
		<?php return false ?>
	<?php endif ?>
	<?php wp_reset_postdata() ?>
	<?php 
	die;
}

add_action('wp_ajax_review_load_more', 'egns_review_load_more_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_review_load_more', 'egns_review_load_more_ajax_handler'); // wp_ajax_nopriv_{action}
