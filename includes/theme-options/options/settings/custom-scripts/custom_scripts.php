<?php 

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if( class_exists( 'CSF' ) ) {
	/*-------------------------------------------------------
	   ** Header Custom Scripts Options
   --------------------------------------------------------*/
   CSF::createSection( $prefix . '_theme_options', array(
        'id'    => 'custom_scripts',
        'title' => esc_html__( 'Custom Scripts', 'turio' ),
        'icon'  => 'fa fa-rss'
    ) );
	/*-----------------------------------
		REQUIRE Custom Scripts FILES
	------------------------------------*/
    require_once TURIO_THEME_SETTINGS . '/custom-scripts/header_meta.php';
    require_once TURIO_THEME_SETTINGS . '/custom-scripts/custom_css.php';
    require_once TURIO_THEME_SETTINGS . '/custom-scripts/custom_javascript.php';


    

}