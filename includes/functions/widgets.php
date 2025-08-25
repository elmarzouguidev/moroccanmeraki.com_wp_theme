<?php

function turio_widgets_init()
{
	register_sidebar(array(
		'name'			=> esc_html__('Shop Sidebar', 'turio'),
		'id'			=> 'shop_sidebar',
		'description'	=> esc_html__('Shop Archive & details page', 'turio'),
		'before_widget' => '<div id="%1$s" class="shop-widget-item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="shop-widget-title"><h3>',
		'after_title'   => '</h3></div>',
	));
	register_sidebar(array(
		'name'          => esc_html__('Tour Package Single ', 'turio'),
		'id'            => 'tour_package_single',
		'before_widget' => '<div id="%1$s" class="blog-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Tour Package List', 'turio'),
		'id'            => 'tour_package_list',
		'before_widget' => '<div id="%1$s" class="blog-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Right Sidebar', 'turio'),
		'id'            => 'right_sidebar',
		'description'   => esc_html__('Blog index page', 'turio'),
		'before_widget' => '<div id="%1$s" class="blog-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Single Page', 'turio'),
		'id'            => 'single_page_sidebar',
		'description'   => esc_html__('Blog single page sidebar', 'turio'),
		'before_widget' => '<div id="%1$s" class="blog-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4></div>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer 1', 'turio'),
		'id'            => 'footer_1',
		'before_widget' => ' <div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer 2', 'turio'),
		'id'            => 'footer_2',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer 3', 'turio'),
		'id'            => 'footer_3',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer 4', 'turio'),
		'id'            => 'footer_4',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	));
}

add_action('widgets_init', 'turio_widgets_init');
