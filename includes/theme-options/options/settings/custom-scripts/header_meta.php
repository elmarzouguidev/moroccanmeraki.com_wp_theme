<?php 
	/*-----------------------------------
		H Options
	------------------------------------*/

	CSF::createSection( $prefix . '_theme_options', array(
		'parent' => 'custom_scripts', 
		'title'  => esc_html__( 'Header Meta', 'turio' ),
		'id'     => 'custom_header_meta_tags',
		'icon'   => 'fa fa-id-card-o',
		'fields' => array(

            array(
              'type'    => 'subheading',
              'content' => esc_html__( 'Header Meta Tags', 'turio' ),
            ),
            array(
                'id'       => 'header_meta_tags',
                'type'     => 'code_editor',
                'desc'     => esc_html__( 'Write Here your header meta tag. example: ( <meta name="author" content="ShapeReign"> )', 'turio' ),
                'sanitize' => false,
                'settings' => array(
                    'mode'        => 'htmlmixed',
                    'theme'       => 'dracula',
                    'tabSize'     => 4,
                    'smartIndent' => false,
                    'autocorrect' => false,
                ),
            ),
        ),

	) );

 ?>