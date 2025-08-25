<?php
if (!function_exists('turio_custom_excerpt_more')) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function turio_custom_excerpt_more($more)
	{
		return '';
	}
}
add_filter('excerpt_more', 'turio_custom_excerpt_more');

// Excerpt Lenth
if (!function_exists('excerpt')) {

	function excerpt($limit)
	{
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt) >= $limit) {
			array_pop($excerpt);
			$excerpt = implode(" ", $excerpt) . '...';
		} else {
			$excerpt = implode(" ", $excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`', '', $excerpt);

		return $excerpt;
	}
}
