<?php 

	/*-------------------------------------------------------
		  ** Breadcrumbs Options
	--------------------------------------------------------*/
	
	CSF::createSection( $prefix . '_theme_options', array(
		'title'  => esc_html__( 'Breadcrumb', 'turio' ),
		'id'     => 'breadcrumb_options',
		'icon'   => 'fa fa-ellipsis-h',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__( 'Breadcrumb Options', 'turio' ) . '</h3>'
			),
			array(
				'id'      => 'breadcrumb_enable',
				'title'   => esc_html__( 'Breadcrumb', 'turio' ),
				'type'    => 'switcher',
				'desc'    => wp_kses( __( 'you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'turio' ), $allowed_html ),
				'default' => true,
			),
			array(
				'id'      		   => 'breadcrumb_title_typography',
				'type'    		   => 'typography',
				'title'   		   => esc_html__('Title Typography','turio'),
				'default' 		   => array(
				  'color'          => '#FFFFFF',
				  'font-family'    => 'Montserrat',
				  'font-size'      => '44px',
				  'unit'           => 'px',
				  'type'       	   => 'google',
				),
				'dependency'       => array( 'breadcrumb_enable', '==', 'true' )
			),

			array(
				'id'      		   => 'breadcrumb_navigation_typography',
				'type'    		   => 'typography',
				'title'   		   => esc_html__('Link Typography','turio'),
				'default' 		   => array(
				  'color'          => '#FFFFFF',
				  'font-family'    => 'Montserrat',
				  'font-size'      => '18',
				  'unit'           => 'px',
				  'type'       	   => 'google',
				),
				'dependency'       => array( 'breadcrumb_enable', '==', 'true' )
			),

			array(
				'id'                    => 'breadcrumb_bg',
				'type'                  => 'background',
				'title'                 => esc_html__( 'Breadcrumb Background', 'turio' ),
				'desc'                  => esc_html__( 'Set the banner background attachment', 'turio' ),
				'background_image'      => true,
				'background_attachment' => true,
				'background_repeat' 	=> false,
				'background_position'	=> false,
				'background_size'		=> false,
				'output'                => '.banner-area-bg:after',
				'dependency'            => array( 'breadcrumb_enable', '==', 'true' ),
            ),
			array(
				'id'                    => 'tour_breadcrumb_bg',
				'type'                  => 'media',
				'title'                 => esc_html__( 'Tour Breadcrumb Background', 'turio' ),
				'desc'                  => esc_html__( 'Set the banner background attachment', 'turio' ),
				'dependency'            => array( 'breadcrumb_enable', '==', 'true' ),
				'library'				=> 'image'
            ),
		)
	) );


 ?>