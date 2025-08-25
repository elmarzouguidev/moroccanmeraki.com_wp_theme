<?php

/*-----------------------------------
    PAGE BARNER SECTION
------------------------------------*/
CSF::createSection(
	TURIO_META_ID,
	array(
		'title'  => esc_html__('Breadcrumb', 'turio'),
		'parent' => 'page_meta_option',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Breadcrumb Options', 'turio'),
			),
			array(
				'id'      => 'enable_breadcrumb',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Breadcrumb', 'turio'),
				'desc'    => esc_html__('If you want to show or hide page banner you can set here by toggle ( YES / NO ).', 'turio'),
				'default' => true,
			),
			array(
				'id'                    => 'page_breadcrumb_bg',
				'type'    				=> 'media',
				'title'                 => esc_html__( 'Breadcrumb Background', 'turio' ),
				'desc'                  => esc_html__( 'Set the banner background attachment', 'turio' ),
				'library' 				=> 'image',
				'dependency'            => array( 'enable_breadcrumb', '==', 'true' ),
			),
		)
	)
);
