<?php 
	/*-----------------------------------
		Logo Options
	------------------------------------*/

	CSF::createSection( $prefix . '_theme_options', array(
		'parent' => 'header_options', 
		'title'  => esc_html__( 'Logo', 'turio' ),
		'id'     => 'theme_header_logo_options',
		'icon'   => 'fa fa-id-card-o',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__( 'Upload Logo', 'turio' ) . '</h3>'
			),

			array(
				'id'      => 'header_logo',
				'title'   => esc_html__( 'Upload  Logo', 'turio' ),
				'type'    => 'media',
				'desc'    => wp_kses( __( 'you can upload <mark>Header One Logo</mark> for header', 'turio' ), $allowed_html ),
				'default'	=> array(
					'url'         => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
					'id'          => 'logo',
					'thumbnail'   => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
					'alt'         => esc_attr('logo'),
					'title'       => esc_html('Logo'),
				),
			),



			array(
				'id'      => 'header_logo_mobile',
				'title'   => esc_html__( 'Upload Mobile Logo', 'turio' ),
				'type'    => 'media',
				'desc'    => wp_kses( __( 'you can upload <mark>Mobile Logo</mark> for header', 'turio' ), $allowed_html ),
				'default'	=> array(
					'url'         => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
					'id'          => 'logo',
					'thumbnail'   => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
					'alt'         => esc_attr('logo'),
					'title'       => esc_html('Logo'),
				),
			),




		),

	) );

 ?>