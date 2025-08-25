<?php

/*------------------------
	Meta Id For Gallery
-------------------------*/
$gallery_prefix = 'turio_gallery';

/*-----------------------------------
    Post Format For Gallery Metabox Section.
------------------------------------*/
CSF::createMetabox( $gallery_prefix,
	array(
		'title'           => esc_html__( 'Post Settings', 'turio' ),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'post_formats'    => 'gallery',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);

/*-----------------------------------
    Post Formet For Gallery
------------------------------------*/
CSF::createSection( $gallery_prefix,
	array(
		'title'  => esc_html__( 'Gallery Post Setting', 'turio' ),
		'fields' => array(
			array(
				'id'          => 'turio_gallery_images',
				'type'        => 'gallery',
				'title'       => esc_html__( 'Add Gallery Images', 'turio' ),
				'desc'        => esc_html__( 'Please Upload Or Select Images From Media Library.', 'turio' ),
				'add_title'   => esc_html__( 'Add Images', 'turio' ),
				'edit_title'  => esc_html__( 'Edit Gallery', 'turio' ),
				'clear_title' => esc_html__( 'Remove Images', 'turio' ),
			),
		)
	)
);

