<?php

/*------------------------
	Meta Id For Audio
-------------------------*/
$audio_prefix   = 'turio_audio';

/*-----------------------------------
    Post Format For Audio Metabox Section.
------------------------------------*/
CSF::createMetabox( $audio_prefix,
	array(
		'title'           => esc_html__( 'Post Settings', 'turio' ),
		'post_type'       => 'post',
		'data_type'       => 'unserialize',
		'context'         => 'normal',
		'priority'        => 'high',
		'post_formats'    => 'audio',
		'show_restore'    => true,
		'output_css'      => true,
		'theme'           => 'dark',
	)
);

/*-----------------------------------
   Post Formet Audio
------------------------------------*/
CSF::createSection( $audio_prefix,
	array(
		'title'  => esc_html__( 'Audio Post Setting', 'turio' ),
		'fields' => array(
		    array(
				'id'          => 'turio_audio_url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio Url', 'turio' ),
				'subtitle'    => esc_html__( 'Paste here a valid audio url which is support auto embed with WordPress for post audio player preview.', 'turio' ),
				'placeholder' => 'https://soundcloud.com/rodwave/by-your-side',
				'default'     => 'https://soundcloud.com/rodwave/by-your-side',
				'validate'    => 'csf_validate_url',
		    ),
		)
	)
);





