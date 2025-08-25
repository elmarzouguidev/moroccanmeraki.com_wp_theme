<?php

/*------------------------
	Meta Id For Breadcrumb
-------------------------*/

$post_breadcrumb   = '_turio_post_breadcrumb';

/*-----------------------------------
    Breadcrumb Metabox Section.
------------------------------------*/
CSF::createMetabox( $post_breadcrumb,
	array(
		'title'           => esc_html__( 'Post Settings', 'turio' ),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);

/*-----------------------------------
   Breadcrumb Options
------------------------------------*/
CSF::createSection( $post_breadcrumb,
	array(
		'title'  => esc_html__( 'Breadcrumb Options', 'turio' ),
		'fields' => array(
			array(
				'id'                    => 'post_breadcrumb_bg',
				'type'    				=> 'media',
				'title'                 => esc_html__( 'Breadcrumb Background', 'turio' ),
				'desc'                  => esc_html__( 'Set the banner background attachment', 'turio' ),
				'library' 				=> 'image',
			),
		)
	)
);
