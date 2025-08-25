<?php

/**
 * Theme functions, definitions, dependencies
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author  EgensLab
 * @package Turio
 * @since   1.4.0
 */


// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}


/**
 * Define turio Folder Path & Url Const
 * @since 1.4.0
 **/
define('TURIO_THEME_ROOT', get_parent_theme_file_path());
define('TURIO_THEME_ROOT_URL', get_parent_theme_file_uri());
define('TURIO_INC', TURIO_THEME_ROOT . '/includes');
define('TURIO_THEME_FUNCTION', TURIO_INC . '/theme-options/functions');
define('TURIO_THEME_SETTINGS', TURIO_INC . '/theme-options/options/settings/');
define('TURIO_THEME_OPTIONS', TURIO_INC . '/theme-options/options/');
define('TURIO_THEME_SETTINGS_IMAGES', TURIO_THEME_ROOT_URL . '/includes/theme-options/images');
define('TURIO_OPTION_ID', 'turio-options');
define('TURIO_META_ID', 'turio-meta');
define('TURIO_TGMA', TURIO_INC . '/plugins/tgma');
define('TURIO_CSS', TURIO_THEME_ROOT_URL . '/assets/css');
define('TURIO_JS', TURIO_THEME_ROOT_URL . '/assets/js');
define('TURIO_ASSETS', TURIO_THEME_ROOT_URL . '/assets');


/**
 * Enqueue Style and Script.
 */
require TURIO_INC . '/functions/enqueue.php';


/**
 * Theme option panel CSS.
 */
//require TURIO_INC.'/custom-css.php';


/**
 * Theme setup and custom theme supports.
 */
require TURIO_INC . '/functions/theme-setup.php';


/**
 * Theme Breadcrumbs
 */
require TURIO_INC . '/functions/breadcrumb.php';

/*
 * Theme Menu
 */
require TURIO_INC . '/functions/copyright.php';

/**
 * Theme Widgets.
 */
require TURIO_INC . '/functions/widgets.php';


/**
 * Comment Form
 */
require TURIO_INC . '/functions/comment.php';


/**
 * Excerpt.
 */
require TURIO_INC . '/functions/excerpt.php';


/**
 * Blog Pagination 
 */
require TURIO_INC . '/functions/pagination.php';


/**
 * Turio Package Query Search 
 */
require TURIO_INC . '/functions/package-query.php';


/**
 * Theme Helper functions
 */
require TURIO_INC . '/class-turio-helper.php';


/**
 * Theme option panel Settings
 */
require TURIO_INC . '/theme-options/options/theme-options.php';

/**
 * turio Template Tags
 */
require TURIO_INC . '/turio-template-tags.php';

/**
 * TGM plugin activation.
 */
require_once TURIO_INC . '/plugins/tgma/activation.php';

/**
 * Include Custom Style
 */
require_once TURIO_THEME_FUNCTION . '/custom-css.php';

/**
 * Modified Hooks
 */
require TURIO_INC . '/functions/modified-hooks.php';

/**
 * Modified Hooks
 */
require TURIO_INC . '/functions/woocommerce.php';

/**
 * Woocommerce Custom Functions.
 */
require TURIO_INC . '/functions/ajax-handler.php';
