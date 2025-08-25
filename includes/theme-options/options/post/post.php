<?php 

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if( class_exists( 'CSF' ) ) {

	/*-----------------------------------
		REQUIRE META FILES
	------------------------------------*/
	require_once TURIO_THEME_OPTIONS . 'post/breadcrumb.php';
	require_once TURIO_THEME_OPTIONS . 'post/video.php';
	require_once TURIO_THEME_OPTIONS . 'post/gallery.php';
	require_once TURIO_THEME_OPTIONS . 'post/image.php';
	require_once TURIO_THEME_OPTIONS . 'post/quote.php';
	require_once TURIO_THEME_OPTIONS . 'post/audio.php';

}