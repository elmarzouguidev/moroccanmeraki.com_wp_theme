<?php

/**
 * turio enqueue scripts
 *
 * @package turio
 */


if (!function_exists('turio_scripts')) {

	function turio_enqueue_scripts()
	{
		// Get the theme data.
		$the_theme = wp_get_theme();

		//Fonts

		wp_enqueue_style('google-font-satisfy', '//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Satisfy&display=swap', array(), null);

		//style

		wp_enqueue_style('egns-select2', get_template_directory_uri() . '/assets/css/select2.min.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('odometer', get_template_directory_uri() . '/assets/css/odometer.min.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/css/bootstrap-icons.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('boxicons', get_template_directory_uri() . '/assets/css/boxicons.min.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('swiper-bundle-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('turio-style', get_template_directory_uri() . '/assets/css/style.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('turio-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('turio-default', get_template_directory_uri() . '/assets/css/default.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('turio-typography', get_template_directory_uri() . '/assets/css/typography.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('turio-blog-and-pages', get_template_directory_uri() . '/assets/css/blog-and-pages.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('turio-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce-custom.css', array(), $the_theme->get('Version'), 'all');

		wp_enqueue_style('turio-theme', get_stylesheet_uri());

		// Scripts

		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('viewport', get_template_directory_uri() . '/assets/js/viewport.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('odometer', get_template_directory_uri() . '/assets/js/odometer.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('animate', get_template_directory_uri() . '/assets/js/animate.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('egns-select2', get_template_directory_uri() . '/assets/js/select2.min.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/nice-select.js', array('jquery'), $the_theme->get('Version'), true);

		wp_enqueue_script('turio-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'jquery-ui-datepicker'), $the_theme->get('Version'), true);


		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}

add_action('wp_enqueue_scripts', 'turio_enqueue_scripts');


// Admin css or js enqueue
function engs_admin_scripts()
{
	// Get the theme data.
	$the_theme = wp_get_theme();

	wp_register_style('admin_css', get_template_directory_uri() .  '/assets/css/admin.css', array(), $the_theme->get('Version'), 'all');

	//OR
	wp_enqueue_style('admin_css');


	// admin js

	wp_enqueue_script('admin-js', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), '1.0.4', true);
}

add_action('admin_enqueue_scripts', 'engs_admin_scripts');
