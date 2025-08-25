<?php
function add_query_vars_filter($vars)
{
  // add custom query vars that will be public
  // https://codex.wordpress.org/WordPress_Query_Vars
  $vars[] .= 'destination';
  $vars[] .= 'tour_availability';
  $vars[] .= 'travel_type';
  $vars[] .= 'duration';

  return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');
/**
 * Override Tour Package Archive Query
 * https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 */
function turio_package_archive($query)
{

  if ($query->is_archive('turio-package') && $query->is_main_query() && !is_admin()) {
    $destination = get_query_var('destination', FALSE);
    $tour_availability = get_query_var('tour_availability', FALSE);
    $travel_type = get_query_var('travel_type', FALSE);
    $duration = get_query_var('duration', FALSE);

    if (!empty($tour_availability)) {
      $ta_date = date_create($tour_availability);
      $tour_availability_date = date_format($ta_date, 'd/m/Y');
    }

    $meta_query_array = array('relation' => 'OR');
    $tour_availability ? array_push($meta_query_array, array('key' => 'turio_turio_package_info_options', 'value' => $tour_availability_date, 'compare' => 'LIKE')) : null;
    $travel_type ? array_push($meta_query_array, array('taxonomy' => 'turio-package-type', 'field' => 'term_id', 'terms' => $travel_type)) : null;
    $duration ? array_push($meta_query_array, array('key' => 'turio_turio_package_info_options', 'value' => $duration, 'compare' => 'LIKE')) : null;

    // final meta_query
    $query->set('meta_query', $meta_query_array);

    $meta_query_array = array('relation' => 'OR');
    $destination ? array_push($meta_query_array, array('taxonomy' => 'turio-package-destination', 'field' => 'term_id', 'terms' => $destination)) : null;

    // final tax_query
    $query->set('tax_query', $meta_query_array);
  }
}
add_action('pre_get_posts', 'turio_package_archive');

function turio_repair_serialize_data($post)
{

  $db_meta_key_information = 'turio_information_options'; // update this!!!
  $db_meta_key_plan = 'turio_travel_plan_options'; // update this!!!
  if (!empty($post['postmeta'])) {

    foreach ($post['postmeta'] as $index => $meta) {

      if ($meta['key'] === $db_meta_key_information || $meta['key'] === $db_meta_key_plan && !empty($meta['value']) && strpos($meta['value'], "\n") !== false) {

        $repaired_serialized_data = preg_replace_callback('/s[:](\d+):"(.*?)";/s', function ($matches) {
          return 's:' . strlen($matches[2]) . ':"' . $matches[2] . '";';
        }, $meta['value']);

        $post['postmeta'][$index]['value'] = $repaired_serialized_data;
      }
    }
  }

  return $post;
}

add_filter('wp_import_post_data_raw', 'turio_repair_serialize_data');
