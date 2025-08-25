<?php 

	/*-------------------------------------------------------
		  ** Blog  Options
	--------------------------------------------------------*/
	CSF::createSection( $prefix . '_theme_options', array(
		'id'    => 'blog_settings',
		'title' => esc_html__( 'Blog Settings', 'turio' ),
		'icon'  => 'fa fa-rss'
	) );

	require_once TURIO_THEME_SETTINGS . '/blog/blog_list.php';
	require_once TURIO_THEME_SETTINGS . '/blog/single_blog.php';

	
 ?>