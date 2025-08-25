<?php

/*-----------------------------------
PAGE MENU SECTION
------------------------------------*/
CSF::createSection( TURIO_META_ID,
    array(
        'title'  => esc_html__( 'Header', 'turio' ),
        'parent' => 'page_meta_option',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Menu Style', 'turio' ),
                'dependency' => array( 'custom_header_style', '==', 'false' ),
            ),
            array(
                'id'        => 'menu_style',
                'type'      => 'image_select',
                'title'     => esc_html('Menu Style'),
                'options'   => array(
                  'default'  		=> esc_url( TURIO_THEME_SETTINGS_IMAGES . '/header/default.png' ),
                  'header_one'      => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/header/header-one.png' ),
                  'header_two'      => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/header/header-two.png' ),
                  'header_three'    => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/header/header-three.png' ),
                ),
                'default'   => 'default',
                
            ),

             array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Upload Logo(Header One)', 'turio' ) . '</h3>',
                'dependency'    => array( 'menu_style', '==', 'header_one' ),
            ),
            array(
                'id'      => 'header_one_logo',
                'title'   => esc_html__( 'Upload  Logo', 'turio' ),
                'type'    => 'media',
                'desc'    => wp_kses( __( 'you can upload <mark> Logo</mark> for header', 'turio' ), wp_kses_allowed_html('post') ),
                'default'   => array(
                    'url'         => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
                    'id'          => 'logo',
                    'thumbnail'   => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
                    'alt'         => esc_attr('logo'),
                    'title'       => esc_html('Logo'),
                ),
                'dependency'    => array( 'menu_style', '==', 'header_one' ),
            ),

            array(
                'id'      => 'header_one_logo_mobile',
                'title'   => esc_html__( 'Upload Mobile Logo', 'turio' ),
                'type'    => 'media',
                'desc'    => wp_kses( __( 'you can upload <mark>Mobile Logo</mark> for header', 'turio' ), wp_kses_allowed_html('post') ),
                'default'   => array(
                    'url'         => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
                    'id'          => 'logo',
                    'thumbnail'   => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
                    'alt'         => esc_attr('logo'),
                    'title'       => esc_html('Logo'),
                ),
                'dependency'    => array( 'menu_style', '==', 'header_one' ),
            ),            

            // Two

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Upload Logo(Header Two)', 'turio' ) . '</h3>',
                'dependency'    => array( 'menu_style', '==', 'header_two' ),
            ),
            array(
                'id'      => 'header_two_logo',
                'title'   => esc_html__( 'Upload  Logo', 'turio' ),
                'type'    => 'media',
                'desc'    => wp_kses( __( 'you can upload <mark> Logo</mark> for header', 'turio' ), wp_kses_allowed_html('post') ),
                'default'   => array(
                    'url'         => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header2-logo.svg' ),
                    'id'          => 'logo',
                    'thumbnail'   => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header2-logo.svg' ),
                    'alt'         => esc_attr('logo'),
                    'title'       => esc_html('Logo'),
                ),
                'dependency'    => array( 'menu_style', '==', 'header_two' ),
            ),

            array(
                'id'      => 'header_two_logo_mobile',
                'title'   => esc_html__( 'Upload Mobile Logo', 'turio' ),
                'type'    => 'media',
                'desc'    => wp_kses( __( 'you can upload <mark>Mobile Logo</mark> for header', 'turio' ), wp_kses_allowed_html('post') ),
                'default'   => array(
                    'url'         => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header2-logo.svg' ),
                    'id'          => 'logo',
                    'thumbnail'   => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header2-logo.svg' ),
                    'alt'         => esc_attr('logo'),
                    'title'       => esc_html('Logo'),
                ),
                'dependency'    => array( 'menu_style', '==', 'header_two' ),
            ),            
            // Three

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Upload Logo(Header Three)', 'turio' ) . '</h3>',
                'dependency'    => array( 'menu_style', '==', 'header_three' ),
            ),
            array(
                'id'      => 'header_three_logo',
                'title'   => esc_html__( 'Upload  Logo', 'turio' ),
                'type'    => 'media',
                'desc'    => wp_kses( __( 'you can upload <mark> Logo</mark> for header', 'turio' ), wp_kses_allowed_html('post') ),
                'default'   => array(
                    'url'         => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
                    'id'          => 'logo',
                    'thumbnail'   => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
                    'alt'         => esc_attr('logo'),
                    'title'       => esc_html('Logo'),
                ),
                'dependency'    => array( 'menu_style', '==', 'header_three' ),
            ),

            array(
                'id'      => 'header_three_logo_mobile',
                'title'   => esc_html__( 'Upload Mobile Logo', 'turio' ),
                'type'    => 'media',
                'desc'    => wp_kses( __( 'you can upload <mark>Mobile Logo</mark> for header', 'turio' ), wp_kses_allowed_html('post') ),
                'default'   => array(
                    'url'         => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
                    'id'          => 'logo',
                    'thumbnail'   => esc_url( TURIO_THEME_SETTINGS_IMAGES . '/logo/header1-logo.svg' ),
                    'alt'         => esc_attr('logo'),
                    'title'       => esc_html('Logo'),
                ),
                'dependency'    => array( 'menu_style', '==', 'header_three' ),
            ),            

        ),
    )
);