<?php

/**
 * Theme basic setup.
 *
 * @package turio
 */
// Set the content width based on the theme's design and stylesheet.
if (!isset($content_width)) {
	$content_width = 1140; /* pixels */
}
if (!function_exists('turio_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function turio_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on turio, use a find and replace
		 * to change 'turio' to the name of your theme in all the template files
		 */
		load_theme_textdomain('turio');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		));

		//* Add support for post formats
		add_theme_support('post-formats', array(
			'audio',
			'gallery',
			'image',
			'quote',
			'video'
		));

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary-menu' => esc_html__('Primary Menu', 'turio'),
		));



		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support('post-thumbnails');

		add_image_size("turio-blog-grid", 416, 315, true);

		/*
		 * Adding Thumbnail Size
		 */


		// Set up the WordPress Theme logo feature.

		$logo_defaults = array(
			'height'      => 40,
			'width'       => 169,
			'flex-height' => true,
			'flex-width'  => true,
		);

		add_theme_support('custom-logo', $logo_defaults);

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Add support for jQuery UI Date Picker

		//Enable custom background for theme.
		$args = array(
			'default-color' => '#ffffff',
		);
		add_theme_support('custom-background', $args);

		//Enable custom header for theme.
		add_theme_support("custom-header");

		// Woocommerce support
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
	}

endif; //turio_setup

add_action('after_setup_theme', 'turio_setup');



/*
 *  Sticky and Others Pages Custom Logo Setup
 */
function turio_customize_register($wp_customize)
{
	$wp_customize->add_setting(
		'mobile_header_logo',
		array(
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mobile_header_logo', array(
		'label' => __('Mobile Logo', 'turio'),
		'section' => 'title_tagline',
		'settings' => 'mobile_header_logo',
		'priority' => 8
	)));
}
add_action('customize_register', 'turio_customize_register');

/**
 * turio_archive_count_span() This code filters the Archive widget to include the post count inside the link
 * @param  [type] $links
 * @return [type] $string 
 */
function turio_archive_count_span($links)
{
	$links = str_replace('</a>&nbsp;(', ' <span>', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}
add_filter('get_archives_link', 'turio_archive_count_span');

function turio_archive_dropdown_count_span($links)
{
	$links = str_replace('&nbsp;(', ' (', $links);
	$links = str_replace('</span></a></option>', ')</option>', $links);
	return $links;
}
add_filter('get_archives_link', 'turio_archive_dropdown_count_span');


/**
 * turio_category_count_span() category count show in a span.
 * @param  [type] $links
 * @return [type] $string
 */
function turio_category_count_span($links)
{
	$links = str_replace('</a> (', ' <span>', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}
add_filter('wp_list_categories', 'turio_category_count_span');

function turio_category_dropdown_count_span($links)
{
	$links = str_replace('&nbsp;(', ' <span>', $links);
	$links = str_replace(')</option>', '</span></option>', $links);
	return $links;
}
add_filter('wp_list_categories', 'turio_category_dropdown_count_span');