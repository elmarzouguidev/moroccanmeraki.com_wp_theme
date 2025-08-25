<?php 



	/*-------------------------------------------------------
		   ** Color  Options
	--------------------------------------------------------*/
	CSF::createSection( $prefix . '_theme_options', array(
		'id'     => 'color_options',
		'title'  => esc_html__( 'Color Options', 'turio' ),
		'icon'   => 'fa fa-tint',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__( 'Color Options', 'turio' ) . '</h3>',
			),
			
			array(
				'id'      => 'primary_color',
				'type'    => 'color',
				'title'      => esc_html__( 'Primary Color', 'turio' ),
				'default' => '#54A15D'
			),
		)
	) );
 ?>