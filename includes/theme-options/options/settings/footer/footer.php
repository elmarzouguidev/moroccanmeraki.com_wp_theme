<?php 
	/*-------------------------------------------------------
		   ** Footer  Options
	--------------------------------------------------------*/
	CSF::createSection( $prefix . '_theme_options', array(
		'title'  => esc_html__( 'Footer', 'turio' ),
		'id'     => 'footer_options',
		'icon'   => 'fa fa-copyright',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__( 'Footer Options', 'turio' ) . '</h3>'
			),

			array(
				'id'      => 'turio_footer_widget_area_background',
				'title'   => esc_html__( 'Footer Background Image', 'turio' ),
				'type'    => 'media',
				'desc'    => wp_kses( __( 'Set footer bottom background Image.', 'turio' ), $allowed_html ),
				'default' => true,
			),

            array(
                'id'          => 'footer_widget_area_padding',
                'type'        => 'spacing',
                'title'       => esc_html__( 'Footer Widget Area Space', 'turio' ),
                'desc'        => esc_html__( 'Set the space ( top / bottom ) in footer bottom.', 'turio' ),
                'left'        => false,
                'right'       => false,
                'units'       => array( 'px','px','em','%','cm','pt' ),
                'output_mode' => 'padding',
                'output'      => '.footer-bottom',
                'default'     => array(
                    'top'       => '',
                    'bottom'    => '',
                    'unit'      => 'px',
                ),
            ),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__( 'Copyright Area Options', 'turio' ) . '</h3>'
			),
			array(
				'id'      => 'copyright_area_enable',
				'title'   => esc_html__( 'Copyright Area', 'turio' ),
				'type'    => 'switcher',
				'default' => true,
			),
			array(
				'id'         => 'copyright_area_logo',
				'title'      => esc_html__( 'Copyright Area Logo', 'turio' ),
				'type'       => 'media',
				'desc'       => wp_kses( __( 'you can set <mark>padding</mark> for copyright area top/bottom', 'turio' ), $allowed_html ),
				'dependency' => array( 'copyright_area_enable', '==', 'true' )
			),
			array(
				'id'    => 'copyright_text',
				'title' => esc_html__( 'Copyright Area Text', 'turio' ),
				'type'  => 'textarea',
				'default' => wp_kses( ( 'Copyright 2023 <a href="https://www.turio-wp.egenslab.com/">turio</a> | Design By <a rel="nofollow" href="https://www.egenslab.com/">Egens Lab</a>' ), $allowed_html ),
				'desc'  => wp_kses( ( 'use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ' ), $allowed_html ),
				'dependency' => array( 'copyright_area_enable', '==', 'true' )
			),
		)
	) );
	
 ?>