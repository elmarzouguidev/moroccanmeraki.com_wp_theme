<?php
/*
 * Theme Metabox Options
 * @package Turio
 * @since 1.4.0
 * */

if (!defined('ABSPATH')) {
	exit(); // exit if access directly
}

if (class_exists('CSF')) {

	$prefix = 'turio';

	/*-------------------------------------
		Turio Package Options
	-------------------------------------*/
	CSF::createMetabox($prefix . '_turio_package_info_options', array(
		'title' => esc_html__('Package Info', 'turio'),
		'post_type' => array('turio-package'),
	));

	// Travel Plan
	CSF::createMetabox($prefix . '_travel_package_breadcrumb', array(
		'title' => esc_html__('Breadcrumb', 'turio'),
		'post_type' => array('turio-package'),
	));
	CSF::createSection($prefix . '_travel_package_breadcrumb', array(
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Breadcrumb Options', 'turio'),
			),
			array(
				'id'                    => 'tour_breadcrumb_bg',
				'type'    				=> 'media',
				'title'                 => esc_html__('Breadcrumb Background', 'turio'),
				'desc'                  => esc_html__('Set the banner background attachment', 'turio'),
				'library' 				=> 'image',
			),
		)
	));

	CSF::createSection($prefix . '_turio_package_info_options', array(
		'fields' => array(
			array(
				'id'          => 'tour_booking_options',
				'type'        => 'select',
				'title'       => esc_html('Booking Options', 'turio'),
				'placeholder' => esc_html__('Select an Option', 'turio'),
				'options'     => array(
					'enquiry_form'    => esc_html__('Enquiry Form', 'turio'),
					'booking_form'    => esc_html__('Booking Form ', 'turio'),
					'both'            => esc_html__('Both', 'turio'),
				),
				'default'     => 'enquiry_form'
			),
			array(
				'id'          => 'tour_product',
				'type'        => 'select',
				'title'       => esc_html__('Select Product', 'turio'),
				'placeholder' => esc_html__('Select a product', 'turio'),
				'desc'        => wp_kses_post('Must be select <mark>Product</mark> for package You can create product form here ( <a href="' . home_url() . '/wp-admin/edit.php?post_type=product">Product</a> )'),
				'chosen'      => true,
				'ajax'        => true,
				'options'     => 'posts',
				'query_args'  => array(
					'post_type' => 'product'
				),
				'dependency' => array('tour_booking_options', '!=', 'enquiry_form'),
			),
			array(
				'id' => 'tp_price',
				'type' => 'text',
				'title' => esc_html__('Price', 'turio'),
				'dependency' => array('tour_booking_options', '==', 'enquiry_form'),
			),

			array(
				'id' => 'tp_promotion_price',
				'type' => 'text',
				'title' => esc_html__('Promotion Price', 'turio'),
				'dependency' => array('tour_booking_options', '==', 'enquiry_form'),
			),
			array(
				'id'        => 'tour_date',
				'type'      => 'repeater',
				'title'     => esc_html__('Tour Booking Date', 'turio'),
				'fields'    => array(
					array(
						'id'    => 'tour_start_date',
						'type'  => 'date',
						'class' => ' check-in-date',
						'title' => esc_html('Check In', 'turio'),
						'settings' => array(
							'dateFormat' => 'mm/dd/yy',
						)
					),

					array(
						'id'    => 'tour_end_date',
						'type'  => 'date',
						'class' => ' check-out-date',
						'title' => esc_html('Check Out', 'turio'),
						'settings' => array(
							'dateFormat' => 'mm/dd/yy',
						)
					),

				)
			),

			array(
				'id' => 'tp_range_price',
				'type' => 'text',
				'title' => esc_html__('Price Range Text', 'turio'),
				'default' => esc_html__('Starting From', 'turio'),
			),
			array(
				'id' => 'tp_price_type',
				'type' => 'text',
				'title' => esc_html__('Price Type', 'turio'),
			),
			array(
				'id' => 'tp_duration',
				'type' => 'text',
				'title' => esc_html__('Duration', 'turio'),
			),
			array(
				'id'     => 'opt-tour-availability',
				'type'   => 'fieldset',
				'title'  => 'Tour Availability ',
				'fields' => array(
					array(
						'id' => 'tp_tour_availability_start',
						'type' => 'date',
						'title' => esc_html__('Start Date', 'turio'),
						'settings' => array(
							'dateFormat' => 'dd/mm/yy',
							'minDate' => '0',
						)
					),
					array(
						'id' => 'tp_tour_availability_end',
						'type' => 'date',
						'title' => esc_html__('End Date', 'turio'),
						'settings' => array(
							'dateFormat' => 'dd/mm/yy',
							'minDate' => '0',
						)
					)
				),
			),
			array(
				'id' => 'tp_group_size',
				'type' => 'text',
				'title' => esc_html__('Total Group Size', 'turio'),
			),
			array(
				'id' => 'tp_total_tour_guide',
				'type' => 'text',
				'title' => esc_html__('Total Tour Guide', 'turio'),
			),
			array(
				'id' => 'tp_languages',
				'type' => 'text',
				'title' => esc_html__('Languages', 'turio'),
			),

		)
	));



	// Travel Plan
	CSF::createMetabox($prefix . '_travel_plan_options', array(
		'title' => esc_html__('Travel Plan', 'turio'),
		'post_type' => array('turio-package'),
	));
	CSF::createSection($prefix . '_travel_plan_options', array(
		'fields' => array(
			array(
				'id'    => 'tp_travel_plan_overview',
				'type'  => 'wp_editor',
				'title' => esc_html__('Overview', 'turio'),
				'sanitize' => false,
			),
			array(
				'id'        => 'opt-travel-plan-repeater-2',
				'type'      => 'repeater',
				'title'     => esc_html__('Travel Plan List', 'turio'),
				'fields'    => array(
					array(
						'id'    => 'travel_plan_title',
						'type'  => 'text',
						'title' => esc_html__('Title', 'turio'),
					),
					array(
						'id'    => 'travel_plan_time',
						'type'  => 'text',
						'title' => esc_html__('Time', 'turio'),
					),
					array(
						'id'    => 'travel_plan_description',
						'type'  => 'wp_editor',
						'title' => esc_html__('Description', 'turio'),
						'sanitize' => false,
					),
				),
				'default'   => array(
					array(
						'travel_plan_title' => esc_html('DAY 1 : Departure And Small Tour'),
						'travel_plan_time' => esc_html('10.00 AM to 10.00 PM'),
						'travel_plan_description' => esc_html('Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec tristique commodo fringilla.'),
					)
				)
			),
		)
	));

	// Gallery Section
	CSF::createMetabox($prefix . '_gallery_options', array(
		'title' => esc_html__('Gallery', 'turio'),
		'post_type' => array('turio-package'),
	));
	CSF::createSection($prefix . '_gallery_options', array(
		'fields' => array(
			array(
				'id'          => 'tp_gallery',
				'type'        => 'gallery',
				'title'       => esc_html__('Gallery', 'turio'),
				'add_title'   => esc_html__('Add Images', 'turio'),
				'edit_title'  => esc_html__('Edit Images', 'turio'),
				'clear_title' => esc_html__('Remove Images', 'turio'),
			),
		)
	));
	// Map Section
	CSF::createMetabox($prefix . '_location_options', array(
		'title' => esc_html__('Location', 'turio'),
		'post_type' => array('turio-package'),
	));
	CSF::createSection($prefix . '_location_options', array(
		'fields' => array(
			array(
				'id'       	  => 'tp_map',
				'type'     	  => 'map',
				'title'       => 'Map',
				'height'   	  => '20px',
				'default'     => array(
					'address'   => esc_html('New York, United States of America'),
					'latitude'  => '40.7127281',
					'longitude' => '-74.0060152',
					'zoom'      => '14',
				)

			),
		)
	));

	// Feature Package Section
	CSF::createMetabox($prefix . '_feature_package_options', array(
		'title' => esc_html__('Feature Package', 'turio'),
		'post_type' => array('turio-package'),
		'context'   => 'side',
	));
	CSF::createSection($prefix . '_feature_package_options', array(
		'fields' => array(
			array(
				'id'       => 'feature_package_switcher',
				'type'     => 'switcher',
				'title'    => esc_html__('Switcher with Yes/No', 'turio'),
				'default'    => false
			),
		)
	));

	
	/*-------------------------------------
	  TourX Destination Image Upload Option
  	-------------------------------------*/
	CSF::createTaxonomyOptions($prefix . '_destination_image_options', array(
		'taxonomy'  => 'turio-package-destination',
		'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
	));
	CSF::createSection($prefix . '_destination_image_options', array(
		'fields' => array(
			array(
				'id'      => 'destination_image',
				'type'    => 'media',
				'title'   => esc_html__('Destination Image', 'turio'),
				'library' => 'image',
			),
			array(
				'id'            => 'destination_description',
				'type'          => 'wp_editor',
				'title'         => esc_html__('Main Description', 'turio'),
				'tinymce'       => false,
				'quicktags'     => true,
				'media_buttons' => true,
				'height'        => '400px',
				'sanitize' => false,
			),
			array(
				'id'      => 'destination_overview_title',
				'type'    => 'text',
				'title'   => esc_html__('Overview Title', 'turio'),
				'default' => 'Overview'
			),
			  
			array(
				'id'        => 'destination_overview',
				'type'      => 'repeater',
				'title'     => esc_html__('Overview', 'turio'),
				'fields'    => array(
					array(
						'id'    => 'overview_label',
						'type'  => 'text',
						'title' => esc_html__('Label', 'turio'),
					),
					array(
						'id'    => 'overview_name',
						'type'  => 'text',
						'title' => esc_html__('Name', 'turio'),
					),
				),
			),
			
			array(
				'id'    => 'destination_map',
				'type'  => 'code_editor',
				'title' => esc_html__('Map Iframe Code', 'turio'),
				'sanitize' => false,
			),
			  
			
		)
	));
}//endif