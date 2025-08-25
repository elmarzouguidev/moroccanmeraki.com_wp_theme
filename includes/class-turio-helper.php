<?php

/**
 * Theme Helpers Class.
 *
 * @author  Egens Lab
 * @package Turio
 * @since   1.4.0
 */

use Elementor\Plugin;

// Don't load directly.
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('Egns_Helpers')) {

	/**
	 * Turio Helpers Functions.
	 *
	 * @author   EgensLab
	 * @package  Turio
	 * @since    1.4.0
	 */
	class Egns_Helpers
	{

		/**
		 * Instance of this class.
		 *
		 * @since   1.4.0
		 * @access  public
		 * @var     Egns_Helpers
		 */
		public static $instance;

		/**
		 * Provides access to a single instance of a module using the singleton pattern.
		 *
		 * @since   1.4.0
		 * @return  object
		 */
		public static function get_instance()
		{
			if (null === self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Define the core functionality of the 
		 *
		 * @since   1.4.0
		 */
		public function __construct()
		{
			$this->actions();
		}

		/**
		 * Define the core functionality of the.
		 *
		 * @since   1.4.0
		 */
		public function actions()
		{
			add_action('turio_page_before', array($this, 'open_container'));
			add_action('turio_page_after', array($this, 'turio_close_container'));
			add_action('turio_post_before', array($this, 'turio_post_open_container'));
			add_action('turio_post_after', array($this, 'turio_post_close_container'));
			add_action('turio_header_template', [$this, 'turio_header_template']);
			add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
		}

		public function enqueue_scripts()
		{
			$objects = array(
				'header_one_sticky'           	 => self::get_theme_option('header_one_sticky'),
				'header_two_sticky'            	 => self::get_theme_option('header_two_sticky'),
				'header_three_sticky'            => self::get_theme_option('header_three_sticky'),
				'header_four_sticky'             => self::get_theme_option('header_four_sticky'),
			);
			wp_localize_script('turio-main', 'theme_options', $objects);
		}

		/**
		 * Is elementor.
		 *
		 * @since   1.4.0
		 */
		public static function turio_is_elementor()
		{
			if (self::turio_is_blog_pages()) {
				return false;
			}
			if (did_action('elementor/loaded')) {
				return Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor();
			} else {
				return false;
			}
		}

		/**
		 * Open Page Container.
		 *
		 * @since   1.4.0
		 */
		public function open_container()
		{
			if (!self::turio_is_elementor()) : ?>
				<div class="container">
				<?php
			endif;
		}

		/**
		 * Close Page Container.
		 *
		 * @since   1.4.0
		 */
		public function turio_close_container()
		{
			if (!self::turio_is_elementor()) :
				?>
				</div> <!-- end .container -->
			<?php
			endif;
		}

		/**
		 * Post Open Container.
		 *
		 * @since   1.4.0
		 */
		public function turio_post_open_container()
		{
			if (is_single()) {
			?>
				<div class="blog-details">
				<?php
			} else {
				?>
					<div class="<?php echo self::turio_post_format_class(); ?>">
					<?php
				}
			}

			/**
			 * Post Close Container.
			 *
			 * @since   1.4.0
			 */
			public function turio_post_close_container()
			{
					?>
					</div>
					<?php
				}

				/**
				 * Overwrite the theme option when page option is available.
				 *
				 * @param mixed theme option value.
				 * @param mixed page option value.
				 * @since   1.4.0
				 * @return bool 
				 */
				public static function turio_is_enabled($theme_option, $page_option)
				{
					if (class_exists('CSF')) {

						if ($theme_option == 1) {

							if ($page_option == 1) {
								return true;
							} elseif (is_singular('post') || is_singular('turio-package') || self::turio_is_blog_pages() || is_404()) {
								return true;
							} elseif ($theme_option == 1 && empty($page_option) && $page_option != 0) {
								return true;
							} else {
								return false;
							}
						} else {
							return false;
						}
					} else {
						return true;
					}
				}

				public static function turio_is_woocommerce()
				{
					if (class_exists('WooCommerce')) {
						return is_cart() || is_shop() || is_checkout() || is_account_page() ? true : false;
					}
				}

				public static function egns_get_theme_option($key, $key2 = '', $default = '')
				{
					$egns_theme_options = get_option('turio_theme_options');

					if (!empty($key2)) {
						return	isset($egns_theme_options[$key][$key2]) ? $egns_theme_options[$key][$key2] : $default;
					} else {
						return isset($egns_theme_options[$key]) ? $egns_theme_options[$key] : $default;
					}
				}


				/**
				 * Get avarage rating by tour title
				 *
				 * @param [type] $title
				 * @return array
				 */
				public static function egns_get_all_rating_by_tour_title($title)
				{
					$args = array(
						'post_type'         => 'review-rating',
						'posts_per_page'    => -1,
						'meta_query' => array(
							'relation'      => 'AND',
							array(
								'key'       => 'tour_booking_review_rating',
								'value'     => esc_html($title),
								'compare'   => 'LIKE'
							),
							array(
								'key'       => 'tour_booking_review_rating',
								'value'     => esc_html('approve'),
								'compare'   => 'LIKE'
							)
						)
					);
					$all_rating = get_posts($args);
					return $all_rating;
				}

				/**
				 * Egns get all rating count
				 *
				 * @param integer $title
				 * @return integer
				 */

				public static function egns_get_all_rating_count_by_tour_title($title)
				{
					return count(self::egns_get_all_rating_by_tour_title($title));
				}

				/**
				 * Egns get avarage rating by tour title
				 *
				 * @param integer $title
				 * @return integer
				 */
				public static function egns_get_avg_rating_by_tour_title($title)
				{

					$all_rating = self::egns_get_all_rating_by_tour_title($title);
					$initial_rating = 0;
					$rating_meta_count = '';
					if (count($all_rating) > 0) {
						foreach ((array)$all_rating as $rating) {
							$rating_meta = self::egns_post_meta_box_value_by_id($rating->ID, 'tour_booking_review_rating', 'review_rating');
							$rating_meta_count = count($rating_meta);
							if (count($rating_meta) > 0) {
								foreach ((array)$rating_meta as $rating_nested) {
									if (isset($rating_nested['reivew_criteria_rating'])) {
										$initial_rating += $rating_nested['reivew_criteria_rating'];
									}
								}
							} else {
								return false;
							}
						}
					} else {
						return false;
					}
					return round(($initial_rating / ($rating_meta_count * self::egns_get_all_rating_count_by_tour_title($title))));
				}

				/**
				 * Check tour rating exists
				 *
				 * @param  mixed $title
				 * @return void
				 */

				public static function egns_is_rating_exists($title)
				{

					$reivew_based_on_criteria = self::egns_get_all_rating_by_tour_title($title);

					if (count($reivew_based_on_criteria) > 0) {
						return true;
					} else {
						return false;
					}
				}

				/**
				 * Return specific rating info based on title
				 *
				 * @param  mixed $title
				 * @return void
				 */

				public static function egns_return_avg_rating_based_on_criteria($title)
				{
					if (!empty(Egns_Helpers::egns_get_theme_option('tour_criteria'))) {
						$review_rating_criteria =  Egns_Helpers::egns_get_theme_option('tour_criteria');
					} else {
						$review_rating_criteria = [['criteria_item' =>  'Overall'], ['criteria_item' =>  'Accommodation'], ['criteria_item' => 'Transport'], ['criteria_item' => 'Food'], ['criteria_item' => 'Destination']];
					}
					$total_rating = 0;
					$rating_count = 0;
					foreach ((array) $review_rating_criteria as $criteria) {
						if (isset($criteria['criteria_item'])) {
							$args = array(
								'post_type'         => 'review-rating',
								'posts_per_page'    => -1,
								'meta_query' => array(
									'relation'      => 'AND',
									array(
										'key'       => 'tour_booking_review_rating',
										'value'     => $title,
										'compare'   => 'LIKE'
									),
									array(
										'key'       => 'tour_booking_review_rating',
										'value'     => esc_html('approve'),
										'compare'   => 'LIKE'
									),

								)
							);
							$reivew_based_on_criteria = get_posts($args);
							$rating_count = count($reivew_based_on_criteria);
							$total_rating_based_on_criteria = 0;
							if (count($reivew_based_on_criteria) > 0) {
								foreach ($reivew_based_on_criteria as  $rating) {
									$rating_meta_value = Egns_Helpers::egns_post_meta_box_value_by_id($rating->ID, 'tour_booking_review_rating', 'review_rating');
									$filtered = array_filter($rating_meta_value, function ($item) use ($criteria) {
										return $item["reivew_criteria"] == $criteria['criteria_item'];
									});
									$total = array_reduce(
										$filtered,
										function ($prev, $item) {
											return $prev +  $item['reivew_criteria_rating'];
										}
									);
									$total_rating_based_on_criteria += $total;
								}
								$total_rating += $total_rating_based_on_criteria;
							}
						}
					}

					$avg_rating_point = round(($total_rating / (count($reivew_based_on_criteria) * count($review_rating_criteria) * 5)) * 100);
					$rating_info = ['avg_rating_point' => number_format($avg_rating_point / 10, 2), 'rating_count' => $rating_count];
					return $rating_info;
				}



				/**
				 * Get first category with link
				 *
				 * @since   1.4.0
				 */
				public static function turio_the_first_category()
				{
					$categories = get_the_category();
					if (!empty($categories)) {
						echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
					}
				}

				/**
				 * Option Dynamic Styles.
				 *
				 * @since   1.4.0
				 */
				public function turio_header_template()
				{
					$enable_topbar = self::turio_page_option_value('enable_topbar');

					$enable_preloader = self::get_theme_option('preloader_enable');
					$turio_top_bar_enable = self::get_theme_option('top_bar_enable');;

					$turio_header_layouts = self::get_theme_option('header_layout_options');
					$layout = self::turio_page_option_value('menu_style');

					if ($enable_preloader == 1) {
						get_template_part('template-parts/common/preloader'); // Preloader
					}

					if (self::turio_is_enabled($turio_top_bar_enable, $enable_topbar) && class_exists('CSF')) {
						get_template_part('template-parts/common/header-topbar'); //Top-Bar
					}

					get_template_part('template-parts/common/category-bar'); //Category

					get_template_part('template-parts/common/search-bar'); //Search Bar


					// Page Header Layout
					if (!empty($layout) && $layout == 'header_one' && class_exists('CSF')) {
						$turio_header_layouts = 'header_one';
					}
					if (!empty($layout) && $layout == 'header_two' && class_exists('CSF')) {
						$turio_header_layouts = 'header_two';
					}
					if (!empty($layout) && $layout == 'header_three' && class_exists('CSF')) {
						$turio_header_layouts = 'header_three';
					}
					if (!empty($layout) && $layout == 'header_four' && class_exists('CSF')) {
						$turio_header_layouts = 'header_four';
					}

					switch ($turio_header_layouts) {
						case 'header_one':
							get_template_part('template-parts/header/header-one');
							break;
						case 'header_two':
							get_template_part('template-parts/header/header-two');
							break;
						case 'header_three':
							get_template_part('template-parts/header/header-three');
							break;
						case 'header_four':
							get_template_part('template-parts/header/header-four');
							break;
						default:
							get_template_part('template-parts/header/header-one');
							break;
					}
				}


				/**
				 * Get theme options.
				 *
				 * @param string $opts Required. Option name.
				 * @param string $key Required. Option key.
				 * @param string $default Optional. Default value.
				 * @since   1.4.0
				 */
				public static function turio_theme_options($keyword)
				{
					$turio_theme_options = get_option('turio_theme_options');
					if (!empty($turio_theme_options[$keyword])) {
						return $turio_theme_options[$keyword];
					} else {
						return false;
					}
				}

				/**
				 * Is Blog Pages
				 *
				 * @since   1.4.0
				 */
				public static function turio_is_blog_pages()
				{
					return ((((is_search()) || is_archive()) ||  (is_author()) || (is_category()) || (is_home()) || (is_tag()))) ? true : false;
				}

				/**
				 * Get theme options.
				 *
				 * @param string $opts Required. Option name.
				 * @param string $key Required. Option key.
				 * @param string $default Optional. Default value.
				 * @since   1.4.0
				 */
				public static function get_theme_option($key, $key2 = '', $default = '')
				{
					$turio_theme_options = get_option('turio_theme_options');
					if (!empty($key2)) {
						return	isset($turio_theme_options[$key][$key2]) ? $turio_theme_options[$key][$key2] : $default;
					} else {
						return isset($turio_theme_options[$key]) ? $turio_theme_options[$key] : $default;
					}
				}

				/**
				 * Return Page Option Value Based on Given Page Option ID.
				 *
				 * @since 1.4.0
				 *
				 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
				 * 
				 * @return mixed Page Option Value.
				 */
				public static function  turio_page_option_value($key1, $key2 = '', $default = '')
				{

					$page_options = get_post_meta(get_the_ID(), TURIO_META_ID, true);

					if (isset($page_options[$key1][$key2])) {

						return $page_options[$key1][$key2];
					} else {
						if (isset($page_options[$key1])) {

							return  $page_options[$key1];
						} else {
							return $default;
						}
					}
				}


				/**
				 * Get Blog layout
				 *
				 * @since   1.4.0
				 */
				public static function turio_post_layout()
				{
					$turio_theme_options = get_option('turio_theme_options');

					$blog_layout = !empty($turio_theme_options['blog_layout_options']) ? $turio_theme_options['blog_layout_options'] : 'default';

					return $blog_layout;
				}

				/**
				 * Escape any String with Translation
				 *
				 * @since   1.4.0
				 */

				public static function turio_translate($value)
				{
					echo sprintf(__('%s', 'turio'), $value);
				}
				/**
				 * Escape any String with Translation
				 *
				 * @since   1.4.0
				 */

				public static function turio_translate_with_escape_($value)
				{
					$value = esc_html($value);
					echo sprintf(__('%s', 'turio'), $value);
				}
				/**
				 * Get Blog Format Class
				 *
				 * @since   1.4.0
				 */
				public static function turio_post_format_class()
				{

					$layout = self::turio_post_layout();
					if ($layout == 'default') {
						$format_class = 'blog-card-gamma-full';
					} elseif ($layout == 'layout-01') {
						$format_class = 'blog-card-gamma';
					} else {
						$format_class = 'blog-card-gamma';
					}
					if (empty($layout)) {
						$format_class = 'blog-card-gamma-full';
					}
					return $format_class;
				}


				/**
				 * Dynamic blog layout for post archive pages.
				 *
				 * @since   1.4.0
				 */
				public static function turio_dynamic_blog_layout()
				{
					$blog_layout = self::turio_post_layout();

					if (!empty($blog_layout)) {
						if ($blog_layout == 'default') {
							get_template_part('template-parts/blog/blog-standard');
						} elseif ($blog_layout == 'layout-01') {
							get_template_part('template-parts/blog/blog-grid');
						} elseif ($blog_layout == 'layout-02') {
							get_template_part('template-parts/blog/blog-grid-sidebar');
						}
					} else {
						get_template_part('template-parts/blog/blog-standard');
					}
				}

				/**
				 * 
				 * @return [string] audio url for audio post
				 */
				public static function turio_embeded_audio($width, $height)
				{
					$url = esc_url(get_post_meta(get_the_ID(), 'turio_audio_url', 1));
					if (!empty($url)) {
						return '<div class="post-media">' . wp_oembed_get($url, array('width' => $width, 'height' => $height)) . '</div>';
					}
				}

				/**
				 * @return [string] Checks For Embed Audio In The Post.
				 */
				public static function has_turio_embeded_audio()
				{
					$url = esc_url(get_post_meta(get_the_ID(), 'turio_audio_url', 1));
					if (!empty($url)) {
						return true;
					} else {
						return false;
					}
				}

				/**
				 * @return [string] Embed gallery for the post.
				 */
				public static function turio_gallery_images()
				{
					$images = get_post_meta(get_the_ID(), 'turio_gallery_images', 1);

					$images = explode(',', $images);
					if ($images && count($images) > 1) {
						$gallery_slide = '<div class="swiper blog-archive-slider">';
						$gallery_slide .= '<div class="swiper-wrapper">';
						foreach ($images as $image) {
							$gallery_slide .= '<div class="swiper-slide"><a href="' . esc_url(get_the_permalink()) . '"><img src="' . esc_url(wp_get_attachment_image_url($image, 'full')) . '" alt="' . esc_attr(get_the_title()) . '"></a></div>';
						}
						$gallery_slide .= '</div>';
						$gallery_slide .= '</div>';

						$gallery_slide .= '<div class="slider-arrows text-center d-flex">';
						$gallery_slide .= '<div class="archive-prev custom-swiper-prev" tabindex="0" role="button" aria-label="' . esc_attr('Previous slide') . '"> <i class="bx bx-chevron-left" ></i> </div>';

						$gallery_slide .= '<div class="archive-next custom-swiper-next" tabindex="0" role="button" aria-label="' . esc_html('Next slide') . '"><i class="bx bx-chevron-right" ></i></div>';
						$gallery_slide .= '</div>';

						return $gallery_slide;
					}
				}

				/**
				 * @return [string] Has Gallery for Gallery post.
				 */
				public static function has_turio_gallery()
				{
					$images = get_post_meta(get_the_ID(), 'turio_gallery_images', 1);
					if (!empty($images)) {
						return true;
					} else {
						return false;
					}
				}

				/**
				 * @return string get the attachment image.
				 */
				public static function turio_thumb_image()
				{
					$image = get_post_meta(get_the_ID(), 'turio_thumb_images', 1);
					echo '<a href="' . esc_url(get_the_permalink()) . '"><img src="' . esc_url(isset($image['url'])) . '" alt="' . esc_attr(get_the_title()) . ' "class="img-fluid wp-post-image"></a>';
				}

				/**
				 * @return [quote] text for quote post
				 */
				public static function turio_quote_content()
				{
					$text =  get_post_meta(get_the_ID(), 'turio_quote_text', 1);
					if (!empty($text)) {
						return sprintf(esc_attr__("%s", 'turio'), $text);
					}
				}

				/**
				 * @return [string] video url for video post
				 */
				public static function turio_embeded_video($width = '', $height = '')
				{
					$url = esc_url(get_post_meta(get_the_ID(), '_turio_video_url', 1));
					if (!empty($url)) {
						return wp_oembed_get($url, array('width' => $width, 'height' => $height));
					}
				}

				/**
				 * @return [string] Has embed video for video post.
				 */
				public static function has_turio_embeded_video()
				{
					$url = esc_url(get_post_meta(get_the_ID(), '_turio_video_url', 1));
					if (!empty($url)) {
						return true;
					} else {
						return false;
					}
				}

				/**
				 * Audio layout for post formet audio.
				 *
				 * @since   1.4.0
				 */
				public static function dynamic_audio_layout()
				{

					$blog_layout = self::turio_post_layout();
					$layout = self::turio_embeded_audio(400, 275);
					if (is_single()) {
						$layout = self::turio_embeded_audio(850, 550);
					} elseif ($blog_layout == 'layout-02') {
						$layout = self::turio_embeded_audio(500, 450);
					} elseif ($blog_layout == 'layout-01') {
						$layout = self::turio_embeded_audio(400, 275);
					} else {
						$layout = self::turio_embeded_audio(400, 275);
					}
					return $layout;
				}

				/**
				 * Video layout for post formet video.
				 *
				 * @since   1.4.0
				 */
				public static function turio_dynamic_video_layout()
				{

					$blog_layout = self::turio_post_layout();
					$layout = self::turio_embeded_video(400, 275);
					if (is_single()) {
						$layout = self::turio_embeded_video(1050, 474);
					} elseif ($blog_layout == 'layout-02') {
						$layout = self::turio_embeded_video(600, 550);
					} elseif ($blog_layout == 'layout-01') {
						$layout = self::turio_embeded_video(400, 275);
					} else {
						$layout = self::turio_embeded_video(400, 275);
					}
					return $layout;
				}

				public static function turio_get_theme_logo($logo_url, $echo = true)
				{
					if (has_custom_logo()) :
						the_custom_logo();
					elseif (!empty($logo_url)) :
					?>
						<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
							<?php if (!empty($logo_url)) : ?>
								<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
					<?php endif ?>
					<?php
					else : {
					?>
						<div class="site-title">
							<h3><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html(get_bloginfo('name')); ?></a></h3>
						</div>

					<?php
						}
					endif;
				}

				public static function turio_get_copyright_theme_logo($logo_url, $echo = true)
				{
					if (has_custom_logo()) :
						the_custom_logo();
					elseif (!empty($logo_url)) :
					?>
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
						<?php if (!empty($logo_url)) : ?>
							<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
				<?php endif ?>
				<?php
					endif;
				}

				/**	
				 * Calculate Average.
				 *
				 * @param   int $post_id .
				 * @param 	string #meta_key .
				 * @since   1.4.0
				 */
				public static function turio_calculate_avg($post_id, $meta_key)
				{
					$comments 		= get_comments(array('meta_key' => $meta_key));
					$total_rating 	= get_comments_number($post_id);
					$total_comment  = 0;
					foreach ($comments as $comment) {
						if ($comment->comment_post_ID == $post_id) :
							$total_comment += is_numeric(get_comment_meta($comment->comment_ID, $meta_key, true)) ? get_comment_meta($comment->comment_ID, $meta_key, true) : 0;
						endif;
					}

					// Calculate Average Rating
					if ($total_rating > 0) {
						$total_comment = $total_comment;
						$avg = $total_comment / $total_rating;
						return number_format($avg, 2);
					} else {
						return 0;
					}
				}

				/**	
				 * Return the overview of criteria.
				 *
				 * @param   int $post_id .
				 * @since   1.4.0
				 */
				public static function turio_get_criteria_overview($post_id)
				{
					$criteria_info = get_post_meta(get_the_ID(), 'turio_criteria_options', true);
					$criteria_overview = 0;
					$loop_count = 0;
					for ($x = 1; $x <= 5; $x++) {
						if ($criteria_info['criteria_' . $x . '_switcher'] == 1) {
							$loop_count++;
							$criteria_overview += self::turio_calculate_avg($post_id, "turio_rating_criteria_$x");
						}
					}
					if ($criteria_overview > 0) {
						return number_format($criteria_overview / $loop_count, 2);
					} else {
						return '';
					}
				}


				/**	
				 * Get the rating of criteria overview.
				 *
				 * @param   int $post_id .
				 * @since   1.4.0
				 */
				public static function turio_get_criteria_overview_rating($post_id)
				{
					$criteria_info = get_post_meta(get_the_ID(), 'turio_criteria_options', true);
					$criteria_overview_rating = 0;
					$loop_count = 0;
					for ($x = 1; $x <= 5; $x++) {
						if ($criteria_info['criteria_' . $x . '_switcher'] == 1) {
							$loop_count++;
							$criteria_overview_rating += self::turio_calculate_avg($post_id, "turio_rating_criteria_$x");
						}
					}
					$criteria_overview_rating = round($criteria_overview_rating / $loop_count);
					if ($criteria_overview_rating > 0) {
						$stars = '<li>';
						for ($i = 1; $i <= $criteria_overview_rating; $i++) {
							$stars .= '<i class="bx bxs-star"></i>';
						}
						$stars .= '</li>';
						return $stars;
					} else {
						return '';
					}
				}

				/**
				 * Menu links.
				 *
				 * @param   string $theme_location menu type.
				 * @param   string $container_class main class.
				 * @param   string $after icon tag.
				 * @param   string $menu_class .
				 * @param   string $depth.
				 * @since   1.4.0
				 */

				public static function  turio_get_theme_menu($theme_location = 'primary-menu', $container_class = 'main-nav-wrapper', $after = '<i class="fl menu-plus">+</i>', $menu_class = 'ul', $depth = 4, $echo = true)
				{
					if (has_nav_menu('primary-menu')) {
						wp_nav_menu(
							array(
								'theme_location'  => $theme_location,
								'container_class' => $container_class,
								'link_before'     => '',
								'link_after'      => '',
								'after'           => $after,
								'container_id'    => '',
								'menu_class'      => $menu_class,
								'fallback_cb'     => '',
								'menu_id'         => '',
								'depth'           => $depth
							)
						);
					} else {
						if (is_user_logged_in()) { ?>
					<div class="set-menu">
						<h4>
							<a href="<?php echo admin_url(); ?>nav-menus.php">
								<?php esc_html_e('Set Menu Here...', 'turio'); ?>
							</a>
						</h4>
					</div>
<?php }
					}
				}
				/**
				 * Menu links.
				 *
				 * @param   string $theme_location menu type.
				 * @param   string $container_class main class.
				 * @param   string $after icon tag.
				 * @param   string $menu_class .
				 * @param   string $depth.
				 * @since   1.4.0
				 */

				public static function  turio_get_footer_theme_menu($theme_location = 'footer-menu', $container_class = 'copyright-nav-wrapper', $after = '<i class="fl menu-plus">+</i>', $menu_class = 'ul', $depth = 4, $echo = true)
				{
					if (has_nav_menu('footer-menu')) {
						wp_nav_menu(
							array(
								'theme_location'  => $theme_location,
								'container_class' => $container_class,
								'link_before'     => '',
								'link_after'      => '',
								'after'           => $after,
								'container_id'    => '',
								'menu_class'      => $menu_class,
								'fallback_cb'     => '',
								'menu_id'         => '',
								'depth'           => $depth
							)
						);
					}
				}

				/**
				 * Package Information
				 *
				 * @param  int $meta_id
				 */

				public static function turio_package_info($meta_id)
				{
					if (isset(get_post_meta(get_the_ID(), 'turio_turio_package_info_options', true)[$meta_id])) {
						return get_post_meta(get_the_ID(), 'turio_turio_package_info_options', true)[$meta_id];
					}
				}

				/**
				 * Package Information
				 *
				 * @param  int $meta_id
				 */

				public static function turio_package_info_by_id($tour_id, $meta_id)
				{
					return get_post_meta($tour_id, 'turio_turio_package_info_options', true)[$meta_id];
				}
				/**
				 * Package Information
				 *
				 * @param  int $meta_id
				 */

				public static function turio_post_breadcrumb()
				{
					return get_post_meta(get_the_ID(), 'post_breadcrumb_bg', true);
				}

				/**
				 * Package Breadcrumb Info
				 *
				 * @param  int $meta_id
				 */

				public static function turio_breadcrumb_info($meta_id)
				{
					return isset(get_post_meta(get_the_ID(), 'turio_travel_package_breadcrumb', true)[$meta_id]) ? get_post_meta(get_the_ID(), 'turio_travel_package_breadcrumb', true)[$meta_id] : '';
				}

				/**
				 * Package Plan
				 *
				 * @param  int $meta_id
				 */

				public static function turio_travel_plan_options($meta_id)
				{
					return get_post_meta(get_the_ID(), 'turio_travel_plan_options', true)[$meta_id];
				}
				/**
				 * Package Gallery Options
				 *
				 * @param  int $meta_id
				 */
				public static function turio_gallery_option($meta_id)
				{

					$turio_gallery_option = get_post_meta(get_the_ID(), 'turio_gallery_options', true);

					return $turio_gallery_option[$meta_id];
				}

				/**
				 * Package Location
				 *
				 * @param  int $meta_id
				 */
				public static function turio_location_option($meta_id)
				{

					$turio_location_option = get_post_meta(get_the_ID(), 'turio_location_options', true);

					return $turio_location_option[$meta_id];
				}

				/**
				 * Package Featured Option
				 *
				 * @param  int $meta_id
				 */
				public static function turio_feature_package($meta_id)
				{
					return get_post_meta(get_the_ID(), 'turio_feature_package_options', true)[$meta_id];
				}

				/**
				 * Post Details Pagination
				 *
				 */

				public static function turio_get_post_pagination()
				{
					wp_link_pages(
						array(
							'before'           => '<ul class="pagination d-flex justify-content-center pagination-style-one"><span class="page-label">' . esc_html('Pages: ') . '</span><li class="page-item">',
							'after'            => '</li></ul>',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'number',
							'separator'        => '</li><li class="page-item">',
							'pagelink'         => '%',
							'echo'             => 1
						)
					);
				}

				/***
				 * Egns Sanitize Array
				 * @param array
				 * @return array
				 */
				public static function egns_sanitize_array_recursive(&$array)
				{
					array_walk_recursive($array, function (&$value) {
						$value = is_string($value) ? sanitize_text_field($value) : $value;
					});
					return $array;
				}

				/**
				 * Post Meta Box Key Information
				 *
				 * @param  String $meta_key
				 */

				public static function egns_post_meta_box_value_by_id($post_id, $meta_key, $meta_key_value)
				{
					if (isset(get_post_meta($post_id, $meta_key, true)[$meta_key_value])) {
						return get_post_meta($post_id, $meta_key, true)[$meta_key_value];
					}
				}

				/**
				 * Check product schedule 
				 * 
				 */

				 public static function egns_check_sale_price_schedule($product_id)
				 {
					 $product = wc_get_product($product_id);
					 $sale_from = $product->get_date_on_sale_from();
					 $sale_to = $product->get_date_on_sale_to();
					 if (!empty($product->get_sale_price())) {
						 if (isset($sale_from) && isset($sale_to)) {
							 $product_sale_start_time = date('Y-m-d h:i:s', strtotime($product->get_date_on_sale_from()));
							 $current_time = date('Y-m-d h:i:s', time());
							 $product_sale_end_time  = date('Y-m-d h:i:s', strtotime($product->get_date_on_sale_to()));
 
							 if ($current_time > $product_sale_start_time && $current_time < $product_sale_end_time) {
								 return true;
							 } else {
								 return false;
							 }
						 } else {
							 return true;
						 }
					 } else {
						 return false;
					 }
				 }
 
				 /**
				  * Calculate Offer percent
				  */
 
				 public static function egns_calculate_offer_percent($product_id)
				 {
					 $product = wc_get_product($product_id);
					 if (self::egns_check_sale_price_schedule($product_id)) {
						 $regular_price = $product->get_regular_price();
						 $sale_price = $product->get_sale_price();
						 return round((($regular_price - $sale_price) / ($regular_price)) * 100);
					 } else {
						 return '';
					 }
				 }
 
				 /**
				  * Calculate woocommerce product price
				  */
 
				 public static function egns_calculate_product_price($product_id = '')
				 {
					
					 if( !empty( $product_id ) && Egns_Helpers::turio_package_info('tour_booking_options') != 'enquiry_form' ) {
						$product = wc_get_product($product_id);
						$sale_from = $product->get_date_on_sale_from();
						$date_sale_to = $product->get_date_on_sale_to();
						// Show product price with calculate sale schedule date 
						if (!empty($product->get_sale_price())) {
							if (isset($sale_from) && isset($date_sale_to)) {
								if (self::egns_check_sale_price_schedule($product)) {
									return $product->get_sale_price();
								} else {
									return $product->get_regular_price();
								}
							} else {
								return $product->get_sale_price();
							}
						} else {
							return $product->get_regular_price();
						}
					}else{
						if( !empty( Egns_Helpers::turio_package_info( 'tp_price' ) ) ) {
							return Egns_Helpers::turio_package_info( 'tp_price' );
						}else{
							return Egns_Helpers::turio_package_info( 'tp_promotion_price' );
						}
					}
				 }
 
				 
				 /**
				  * Get Tour Package ID by Product price
				 */
				 public static function egns_get_tour_package_by_product_price($min_price = '', $max_price = '')
				 {
					 $post_in = [];
					 $args = array(
						 'post_type'  		=> 'turio-tour',
						 'posts_per_page'	=> -1
					 );
					 $tourList = get_posts($args);
 
					 foreach ($tourList as $key => $tour) {
						 if (!empty($min_price) && !empty($max_price)) {
							 $product_id = Egns_Helpers::turio_package_info_by_id($tour->ID, 'tour_product');
							 if (!empty($product_id)) {
								 $product = wc_get_product($product_id);
								 if (Egns_Helpers::egns_calculate_product_price($product->get_id()) >= $min_price &&  Egns_Helpers::egns_calculate_product_price($product->get_id()) <= $max_price) {
									 $post_in[] .= $tour->ID;
								 }
							 }
						 }
					 }
					 return $post_in;
				 }
				 
			} // class

			Egns_Helpers::get_instance();
		}
