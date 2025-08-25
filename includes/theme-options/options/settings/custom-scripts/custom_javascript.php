<?php 
	/*-----------------------------------
		H Options
	------------------------------------*/

	CSF::createSection( $prefix . '_theme_options', array(
		'parent' => 'custom_scripts', 
		'title'  => esc_html__( 'Custom Javascript', 'turio' ),
		'id'     => 'custom_javascript',
		'icon'   => 'fa fa-id-card-o',
		'fields' => array(

            array(
              'type'    => 'subheading',
              'content' => esc_html__( 'Custom Javascript', 'turio' ),
            ),
            array(
                'id'       => 'custom_script',
                'type'     => 'code_editor',
                'desc'     => esc_html__( 'Write Here your header meta tag. example: ( <meta name="author" content="ShapeReign"> )', 'turio' ),
                'sanitize' => false,
                'settings' => array(
                    'mode'        => 'javascript',
                    'theme'       => 'dracula',
                    'tabSize'     => 4,
                    'smartIndent' => true,
                    'autocorrect' => true,
                ),
            ),
        ),

	) );

 ?>