<?php

/*------------------------
	Meta Id For Image
-------------------------*/
$image_prefix = '_turio_image';

/*-----------------------------------
    Post Format For Image Metabox Section.
------------------------------------*/
CSF::createMetabox( $image_prefix,
	array(
		'title'           => esc_html__( 'Post Settings', 'turio' ),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'post_formats'    => 'image',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);

/*-----------------------------------
    Post Formet Image
------------------------------------*/
CSF::createSection( $image_prefix,
	array(
		'title'  => esc_html__( 'Image Post Setting', 'turio' ),
		'fields' => array(
			array(
				'id'          => 'turio_thumb_images',
				'type'        => 'media',
				'title'       => esc_html__( 'Add Image Images', 'turio' ),
				'desc'        => esc_html__( 'Select Images For Image Post Format.', 'turio' ),
				'add_title'   => esc_html__( 'Add Images', 'turio' ),
				'edit_title'  => esc_html__( 'Edit Image', 'turio' ),
				'clear_title' => esc_html__( 'Remove Images', 'turio' ),
			),
		)
	)
);
