<?php

/*-----------------------------------
    CUSTOM CSS SECTION
------------------------------------*/
CSF::createSection( TURIO_META_ID,
	array(
		'title'  => esc_html__( 'Custom CSS', 'turio' ),
        'parent' => 'page_meta_option',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__( 'Page Custom Css', 'turio' ),
			),
            array(
                'id'       => 'page_css',
                'type'     => 'code_editor',
                'desc'     => esc_html__( 'Write custom css here with css selector. this css will be applied in this page.', 'turio' ),
                'settings' => array(
                    'mode'        => 'css',
                    'theme'       => 'dracula',
                    'tabSize'     => 4,
                    'smartIndent' => true,
                    'autocorrect' => true,
                ),
            ),
		)
	)
);