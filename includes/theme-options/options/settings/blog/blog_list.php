<?php 
	/*-------------------------------------------------------
		  ** Blog Page  Options
	--------------------------------------------------------*/
	CSF::createSection( $prefix . '_theme_options', array(
		'parent' => 'blog_settings',
		'id'     => 'blog_post_options',
		'title'  => esc_html__( 'Blog Post', 'turio' ),
		'icon'   => 'fa fa-list-ul',
		'fields' => array(
			array(
				'id'         => 'blog_layout_options',
				'title'      => esc_html__( 'Blog Layout', 'turio' ),
				'type'       => 'image_select',
				'options'    => array(
					'default' => TURIO_THEME_SETTINGS_IMAGES . '/blog/standard.png',
					'layout-01'  => TURIO_THEME_SETTINGS_IMAGES . '/blog/grid.png',
					'layout-02' => TURIO_THEME_SETTINGS_IMAGES . '/blog/grid_side.jpg',
				),
				'default'    => 'default',
				'desc'       => wp_kses( __( 'you can set <mark>blog layout design</mark> from blog page', 'turio' ), $allowed_html ),
			),	  
			array(
				'id'      => 'blog_title_typography',
				'type'    => 'typography',
				'title'   => esc_html__('Blog Title','turio'),
				'default' => array(
				  'color'       => '#262339',
				  'font-family' => 'Montserrat',
				  'font-size'   => '20',
				  'line-height' => '30',
				  'font-style' => '600',
				  'unit'        => 'px',
				  'type'        => 'google',
				),
			),
			array(
				'id'      => 'blog_description_typography',
				'type'    => 'typography',
				'title'   => esc_html__('Blog Description','turio'),
				'default' => array(
				  'color'       => '#737679',
				  'font-family' => 'Montserrat',
				  'font-size'   => '16',
				  'line-height' => '27',
				  'font-style' =>  '400',
				  'unit'        => 'px',
				  'type'        => 'google',
				),
			),
		),
	  
	) );

 ?>