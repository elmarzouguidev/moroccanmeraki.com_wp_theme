<?php

/**
 * Theme Options
 * @Packange Turio
 * @since 1.4.0
 */
// exit if access directly
if (!defined('ABSPATH')) {
	exit();
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

	$allowed_html = wp_kses_allowed_html('strip');
	$prefix       = 'turio';
	$allowed_html = '';
	// Create options
	CSF::createOptions($prefix . '_theme_options', array(
		'menu_title'         => esc_html__('Turio Options', 'turio'),
		'menu_slug'  		 => 'turio-theme-option',
		'footer_credit'      => '',
		'menu_icon'          => 'dashicons-image-filter',
		'menu_position'      => 60,
		'show_footer'        => false,
		'enqueue_webfont'    => false,
		'show_search'        => true,
		'show_reset_all'     => true,
		'show_reset_section' => true,
		'show_all_options'   => false,
		'theme'              => 'dark',
		'framework_title'    => sprintf(__('Turio <small> - Version 1.5.0 BY </small><small><a  href="https://themeforest.net/user/egenslab" target="_blank">Egenslab</a></small>', 'turio')),
	));



	/*-------------------------------
	THEME OPTION SETTINGS
---------------------------------*/
require_once TURIO_THEME_SETTINGS . '/general/general.php';
require_once TURIO_THEME_SETTINGS . '/header/header.php';
require_once TURIO_THEME_SETTINGS . '/breadcrumbs/breadcrumbs.php';
require_once TURIO_THEME_SETTINGS . '/blog/blog.php';
require_once TURIO_THEME_SETTINGS . '/404/page.php';
require_once TURIO_THEME_SETTINGS . '/color/color.php';
require_once TURIO_THEME_SETTINGS . '/footer/footer.php';
require_once TURIO_THEME_SETTINGS . '/tour/review-rating.php';
require_once TURIO_THEME_SETTINGS . '/custom-scripts/custom_scripts.php';
require_once TURIO_THEME_SETTINGS . '/backup/backup.php';


}
