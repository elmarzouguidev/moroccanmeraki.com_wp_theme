<?php 

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if( class_exists( 'CSF' ) ) {
	/*-------------------------------------------------------
	   ** Header  Options
   --------------------------------------------------------*/
   CSF::createSection( $prefix . '_theme_options', array(
        'id'    => 'header_options',
        'title' => esc_html__( 'Header Options', 'turio' ),
        'icon'  => 'fa fa-rss'
    ) );
	/*-----------------------------------
		REQUIRE Header FILES
	------------------------------------*/
    require_once TURIO_THEME_SETTINGS . '/header/top_bar_options.php';
    require_once TURIO_THEME_SETTINGS . '/header/header_options.php';
    require_once TURIO_THEME_SETTINGS . '/header/logo.php';

    

}