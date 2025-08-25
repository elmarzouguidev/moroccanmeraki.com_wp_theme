<?php

/*-----------------------------------
    TOP BAR SECTION
------------------------------------*/
CSF::createSection( TURIO_META_ID,
    array(
        'title'  => esc_html__( 'Top Bar', 'turio' ),
        'parent' => 'page_meta_option',
        'fields' => array(

            array(
              'type'    => 'subheading',
              'content' => esc_html__( 'Topbar', 'turio' ),
            ),
            array(
                'id'      => 'enable_topbar',
                'type'    => 'switcher',
                'title'   => esc_html__( 'Enable Topbar', 'turio' ),
                'desc'    => esc_html__( 'If you want to Disable topbar you can set ( YES / NO )', 'turio' ),
                'default' => true,
                
                
            ),
            array(
                'id'      => 'enable_contact_info',
                'type'    => 'switcher',
                'title'   => esc_html__( 'Enable Contact Info', 'turio' ),
                'desc'    => esc_html__( 'If you want to enable or enable Contact Info you can set ( YES / NO )', 'turio' ),
                'default' => true,
                'dependency' => array( 'enable_topbar', '==', 'true' ),
            ),
            array(
                'id'      => 'enable_promotion_title',
                'type'    => 'switcher',
                'title'   => esc_html__( 'Enable Promotion Title', 'turio' ),
                'desc'    => esc_html__( 'If you want to Disable Promotion title you can set ( YES / NO )', 'turio' ),
                'default' => true,
                'dependency' => array( 'enable_topbar', '==', 'true' ),
            ),
            array(
                'id'      => 'enable_social_icon',
                'type'    => 'switcher',
                'title'   => esc_html__( 'Enable Social Icon', 'turio' ),
                'desc'    => esc_html__( 'If you want to enable or enable topbar you can set ( YES / NO )', 'turio' ),
                'default' => true,
                'dependency' => array( 'enable_topbar', '==', 'true' ),
            ),
        )
    )
);