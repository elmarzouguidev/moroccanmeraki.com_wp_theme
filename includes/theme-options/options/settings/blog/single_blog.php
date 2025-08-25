<?php 
	/*-------------------------------------------------------
		  ** Single Blog page  Options
	--------------------------------------------------------*/

	CSF::createSection( $prefix . '_theme_options', array(
		'parent' => 'blog_settings',
		'id'     => 'blog_single_post_options',
		'title'  => esc_html__( 'Single Post', 'turio' ),
		'icon'   => 'fa fa-list-alt',
		'fields' => array(
			array(
				'id'      => 'blog_single_title_typography',
				'type'    => 'typography',
				'title'   => esc_html__('Title','turio'),
				'default' => array(
				  'color'       => '#2d373c',
				  'font-family' => 'Montserrat',
				  'font-size'   => '30',
				  'font-style'  => '600',
				  'unit'        => 'px',
				  'type'        => 'google',
				),
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => true,
				'letter_spacing' => false,
			),

			array(
				'id'      => 'blog_single_description_typography',
				'type'    => 'typography',
				'title'   => esc_html__('Description','turio'),
				'default' => array(
				  'color'       => '#666666',
				  'font-family' => 'Montserrat',
				  'font-size'   => '16',
				  'font-style'  => '400',
				  'unit'        => 'px',
				  'type'        => 'google',
				),
				
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'letter_spacing' => true,
			),

		),
	) );
 ?>