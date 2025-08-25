<?php
function turio_pagination()
{
	global $wp_query;
	$links = paginate_links(array(
		'current'  => max(1, get_query_var('paged')),
		'total'    => $wp_query->max_num_pages,
		'type'     => 'list',
		'mid_size' => apply_filters("turio_pagination_mid_size", 3),
		'prev_text'    => '<i class="bi bi-chevron-double-left"></i>',
		'next_text'    => '<i class="bi bi-chevron-double-right"></i>',
	));
	if (!empty($links)) {
		$links = str_replace("<ul class='page-numbers'>", "<ul class='pagination pagination-style-one justify-content-center pt-50'>", $links);
		$links = str_replace("<li>", "<li class='page-item'>", $links);
		$links = str_replace("page-numbers", "page-link", $links);
		$links = str_replace("&laquo; Previous</a>", '&laquo;</a>', $links);
		$links = str_replace("Next &raquo;</a>", "&raquo;</a>", $links);
		$links = str_replace("next aria-label='Next'", "page-link", $links);
		$links = str_replace("prev aria-hidden='true'", "sr-only page-link", $links);
		$links = str_replace("<li class='page-item'><span", " <li class='page-item active'><a", $links);
		$links = str_replace('span', 'a', $links);

		echo wp_kses_post($links);
	}
}

remove_action("term_description", "wpautop");

function pagination_mid_size($size)
{
	return 2;
}

add_filter("turio_pagination_mid_size", "pagination_mid_size");


// Add Custom Taxonomy Pagination 
function egns_tax_pagination()
{
	global $wp_rewrite, $wp_query;
	if (isset($wp_query->query_vars['paged']) && $wp_query->query_vars['paged'] > 1) {
		$current = $wp_query->query_vars['paged'];
	} elseif (isset($wp_query->query_vars['page']) && $wp_query->query_vars['page'] > 1) {
		$current = $wp_query->query_vars['page'];
	} else {
		$current = 1;
	}
	$pagination = array(
		'base' 			=> @esc_url(add_query_arg('page', '%#%')),
		'format' 		=> '',
		'total' 		=> $wp_query->max_num_pages,
		'current' 		=> $current,
		'show_all' 		=> false,
		'prev_text'    => '<i class="bi bi-chevron-double-left"></i>',
		'next_text'    => '<i class="bi bi-chevron-double-right"></i>',
		'type' 			=> 'list',
	);
	$links = paginate_links($pagination);
	if (!empty($links)) {
		$links = str_replace("<ul class='page-numbers'>", "<ul class='pagination pagination-style-one justify-content-center pt-50'>", $links);
		$links = str_replace("<li>", "<li class='page-item'>", $links);
		$links = str_replace("page-numbers", "page-link", $links);
		$links = str_replace("&laquo; Previous</a>", '&laquo;</a>', $links);
		$links = str_replace("Next &raquo;</a>", "&raquo;</a>", $links);
		$links = str_replace("next aria-label='Next'", "page-link", $links);
		$links = str_replace("prev aria-hidden='true'", "sr-only page-link", $links);
		$links = str_replace("<li class='page-item'><span", " <li class='page-item active'><a", $links);
		$links = str_replace('span', 'a', $links);
		if ($wp_rewrite->using_permalinks())
			$pagination['base'] = user_trailingslashit(trailingslashit(esc_url(remove_query_arg(['s', 'page'], get_pagenum_link(1)))) . '?page=%#%', 'paged');
		if (!empty($wp_query->query_vars['s']))
			$pagination['add_args'] = array('s' => get_query_var('s')); ?>
		<div class="w-clearfix"><?php echo wp_kses_post($links); ?></div>
		<div class="none">
			<?php wp_link_pages(""); ?>
		</div>
<?php
	}
}
