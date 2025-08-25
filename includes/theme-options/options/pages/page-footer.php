<?php

/*-----------------------------------
    PAGE FOOTER SECTION
------------------------------------*/
CSF::createSection( TURIO_META_ID,
	array(
		'title'  => esc_html__( 'Page Footer', 'turio' ),
        'parent' => 'page_meta_option',
		'fields' => array(
			
			array(
				'type'    => 'subheading',
				'content' => esc_html__( 'Page Footer Options', 'turio' ),
			),
		    array(
				'id'      => 'hide_footer',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Enable Footer', 'turio' ),
				'desc'    => esc_html__( 'If you want to show the footer you can set here by ( YES / NO ).', 'turio' ),
				'default' => true,
		    ),
			array(
				'id'         => 'enable_footer_styling',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Custom Footer Styling', 'turio' ),
				'desc'       => esc_html__( 'If you need custom style in page footer you can style here.', 'turio' ),
				'default'    => false,
			),
			array(
				'type'       => 'subheading',
				'content'    => esc_html__( 'Footer Background & Overlay', 'turio' ),
				'dependency' => array( 'enable_footer_styling|hide_footer', '==|==', 'true|true' ),
			),
			array(
				'id'      => 'enable_contact_area',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Enable Contact Area', 'turio' ),
				'desc'    => esc_html__( 'If you want do not show the contact area you can set here by ( YES / NO ).', 'turio' ),
				'default' => true,
				'dependency' => array( 'enable_footer_styling|hide_footer', '==|==', 'true|true' ),
		    ),
			array(
				'id'      => 'enable_copyright_area',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Enable Copyright Area', 'turio' ),
				'desc'    => esc_html__( 'If you want do not show the copyright you can set here by ( YES / NO ).', 'turio' ),
				'default' => true,
				'dependency' => array( 'enable_footer_styling|hide_footer', '==|==', 'true|true' ),
		    ),
            array(
				'type'       => 'subheading',
				'content'    => esc_html__( 'Footer Link Color', 'turio' ),
				'dependency' => array( 'enable_footer_styling|hide_footer', '==|==', 'true|true' ),
            ),
            array(
				'id'               => 'footer_link_color',
				'type'             => 'link_color',
				'title'            => esc_html__( 'Footer links color', 'turio' ),
				'desc'             => esc_html__( 'Set the footer area link color & hover color.', 'turio' ),
				'output'           => array('.footer-top a','.footer-area .widget_pages ul li a', '.footer-area .widget_nav_menu ul li a'),
				'output_important' => true,
				'default'          => array(
                    'color' => '',
                    'hover' => '',
                ),
				'dependency'       => array( 'enable_footer_styling|hide_footer', '==|==', 'true|true' ),
            ),

            /*-------------------------------
				FOOTER BOTTOM
            --------------------------------*/
            array(
				'type'       => 'subheading',
				'content'    => esc_html__( 'Spacing', 'turio' ),
				'dependency' => array( 'enable_footer_styling|hide_footer', '==|==', 'true|true' ),
            ),

			array(
				'id'          => 'footer_contact_padding',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Footer Contact Spacing', 'turio' ),
				'desc'        => esc_html__( 'Set the space ( top / bottom ) in footer contact.', 'turio' ),
				'left'        => false,
				'right'       => false,
				'output_mode' => 'padding',
				'output'      => '.footer-contact',
                'default'     => array(
					'top'    => '30',
					'bottom' => '30',
					'unit'   => 'px',
                ),
				'dependency'  => array( 'enable_footer_styling|hide_footer', '==|==', 'true|true' ),
            ),
			array(
				'id'          => 'footer_copyright_padding',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Footer Copyright Spacing', 'turio' ),
				'desc'        => esc_html__( 'Set the space ( top / bottom ) in footer copyright.', 'turio' ),
				'left'        => false,
				'right'       => false,
				'output_mode' => 'padding',
				'output'      => '.footer-copyright',
                'default'     => array(
					'top'    => '13',
					'bottom' => '13',
					'unit'   => 'px',
                ),
				'dependency'  => array( 'enable_footer_styling|hide_footer', '==|==', 'true|true' ),
            ),
		)
	)
);