<?php 


	/*-------------------------------------------------------
		   ** 404 page options
	--------------------------------------------------------*/
	CSF::createSection( $prefix . '_theme_options', array(
		'id'     => '404_page',
		'title'  => esc_html__( '404 Page', 'turio' ),
		'icon'   => 'fa fa-exclamation-triangle',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__( '404 Page Options', 'turio' ) . '</h3>',
			),
		
			array(
				'id'         => '404_title',
				'title'      => esc_html__( 'Title', 'turio' ),
				'type'       => 'text',
				'info'       => wp_kses( __( 'you can change <mark>title</mark> of 404 page', 'turio' ), $allowed_html ),
				'default'	 => esc_html__( 'That Page Are Not Found!', 'turio' )
			),
			array(
				'id'      => '404_image',
				'type'    => 'media',
				'title'   => esc_html__( 'Image', 'turio' ),
				'library' => 'image',
			),
			array(
				'id'         => '404_description',
				'title'      => esc_html__( 'Description', 'turio' ),
				'type'       => 'textarea',
				'info'       => wp_kses( __( 'you can change <mark>sub title</mark> of 404 page', 'turio' ), $allowed_html ),
				'default'	 => esc_html__( "It looks like you've reached a URL that doesn’t exist. Please use the navigation above or search below to find your way back to our amazing website.", 'turio' )
			),
			array(
				'id'         => '404_button_text',
				'title'      => esc_html__( 'Button Text', 'turio' ),
				'type'       => 'text',
				'info'       => wp_kses( __( 'you can change <mark>button text</mark> of 404 page', 'turio' ), $allowed_html ),
				'default'	 => esc_html__( 'Go To Home', 'turio' )
			),
		
		)
	) );
 ?>