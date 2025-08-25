<?php 

/*-----------------------------------------
	CONTROL CORE CLASSES FOR AVOID ERRORS
------------------------------------------*/
if( class_exists( 'CSF' ) ) {

	/*-----------------------------------
	    PAGE METABOX SECTION
	------------------------------------*/
	CSF::createMetabox( TURIO_META_ID,
		array(
			'title'           => esc_html__( 'Page Settings', 'turio' ),
			'post_type'       => 'page',
			'context'         => 'normal',
			'priority'        => 'high',
			'show_restore'    => true,
			'enqueue_webfont' => true,
			'async_webfont'   => false,
			'output_css'      => true,
			'theme'           => 'dark',
			'id'              =>'page_meta_option',
		)
	);

	/*-----------------------------------
		REQUIRE META FILES
	------------------------------------*/

	require_once TURIO_INC . '/theme-options/options/pages/page-breadcrumb.php';
	require_once TURIO_INC . '/theme-options/options/pages/page-topbar.php';
	require_once TURIO_INC . '/theme-options/options/pages/page-header.php';
	require_once TURIO_INC . '/theme-options/options/pages/page-footer.php';
	require_once TURIO_INC . '/theme-options/options/pages/page-css.php';
	require_once TURIO_INC . '/theme-options/options/pages/tour-enquiries.php';
	require_once TURIO_INC . '/theme-options/options/pages/review-rating.php';

}