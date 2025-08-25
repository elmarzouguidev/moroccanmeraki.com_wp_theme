<?php


/*-------------------------------------------------------
		   ** WooCommerce page options
	--------------------------------------------------------*/
CSF::createSection($prefix . '_theme_options', array(
	'id'     => 'woocommerce_options',
	'title'  => esc_html__('WooCommerce', 'turio'),
	'icon'   => 'fa fa-shopping-bag',
));


// Create a section
CSF::createSection($prefix . '_theme_options', array(
	'parent'     => 'woocommerce_options',
	'id'	=> 'woo_shop',
	'title'  => esc_html__('Shop Page', 'turio'),
	'icon'   => 'fa fa-cart-plus',
	'fields' => array(

		array(
			'id'      => 'woo_sidebar',
			'type'    => 'switcher',
			'title'   => esc_html__('Shop Sidebar', 'turio'),
			'label'   => 'Do you want activate it ?',
			'default' => true
		),
		array(
			'id'          => 'shop_column',
			'type'        => 'select',
			'title'       => esc_html__('Shop product Column', 'turio'),
			'placeholder' => 'Select an column',
			'options'     => array(
				'2'  => 'Two column',
				'3'  => 'Three column',
				'4'  => 'Four column',
			),
			'default'     => '3'
		),

		array(
			'id'      => 'flash_sale',
			'type'    => 'switcher',
			'title'   => esc_html__('Flash Sale Tag','turio'),
			'label'   => esc_html__('Show/Hide','turio'),
			'default' => true
		),

	)
));
