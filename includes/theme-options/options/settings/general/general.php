<?php 

	/*-------------------------------------------------------
		  ** General Options
	--------------------------------------------------------*/

	CSF::createSection( $prefix . '_theme_options', array(
		'title'  => esc_html__( 'General', 'turio' ),
		'id'     => 'general_options',
		'icon'   => 'fa fa-wrench',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__( 'Preloader Options', 'turio' ) . '</h3>'
			),
			array(
				'id'      => 'preloader_enable',
				'title'   => esc_html__( 'Preloader', 'turio' ),
				'type'    => 'switcher',
				'desc'    => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable preloader', 'turio' ), $allowed_html ),
				'default' => true,
			),
			array(
				'id'      => 'tour_package_per_post',
				'title'   => esc_html__( 'Package Per Page', 'turio' ),
				'type'    => 'number',
				'desc'    => wp_kses( __( 'you can set <mark>Package Per Page</mark> for Tour Package', 'turio' ), $allowed_html ),
				'default' => 9,
			),
			array(
				'id'      => 'tour_package_form_title',
				'title'   => esc_html__( 'Package Form Title', 'turio' ),
				'type'    => 'text',
				'desc'    => wp_kses( __( 'you can set <mark>Package title</mark> for Tour Package Form', 'turio' ), $allowed_html ),
				'default' => esc_html__( 'Book the Tour', 'turio' ),
			),
		)
	) );


 ?>