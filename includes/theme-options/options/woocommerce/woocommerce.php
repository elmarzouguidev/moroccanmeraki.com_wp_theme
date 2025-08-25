<?php 

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if( class_exists( 'CSF' ) ) {

	// Service Price 
	$service_price = '';
	if( function_exists('get_woocommerce_currency_symbol') ) {
	  $service_price =  'Service Price'.'('.get_woocommerce_currency_symbol().')';
	}else{
	  $service_price =  'Service Price';
	}
	/*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
	CSF::createMetabox( TURIO_META_ID.'-woocommerce',
		array(
			'title'           => esc_html__( 'Turio Tour Services', 'turio' ),
			'post_type'       => 'product',
			'context'         => 'normal',
			'priority'        => 'high',
			'show_restore'    => false,
			'enqueue_webfont' => true,
			'async_webfont'   => false,
			'output_css'      => true,
			'theme'           => 'dark',
			'id'              =>'turio_woocommerce',
		)
	);

	CSF::createSection(
		TURIO_META_ID.'-woocommerce',
		array(
			'title'  => esc_html__( 'Add Services', 'turio' ),
			'parent' => 'turio_woocommerce',
			'fields'    => array(
				array(
					'id'        => 'turio_woocommerce_services',
					'type'      => 'repeater',
					'title'     => esc_html__('Add Service', 'turio'),
					'fields'    => array(
					  array(
						'id'    => 'turio_woocommerce_services_label',
						'type'  => 'text',
						'title' => esc_html('Service Label', 'turio'),
					  ),
				  
					  array(
						'id'    => 'turio_woocommerce_services_price',
						'type'  => 'text',
						'title' => esc_html( $service_price, 'turio'),
					  ),
				  
					)
				),
			)
				
		)
	);

}