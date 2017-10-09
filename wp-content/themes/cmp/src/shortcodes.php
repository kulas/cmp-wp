<?php

namespace App;

function specialties_list($atts) {
  $terms = get_terms( array(
    'post_type' => 'expert',
    'taxonomy' => 'specialties',
    'hide_empty' => true,
    'orderby' => 'name'
  ));
  $specialty_links = array_map(function($specialty) {
    return '<li><a href="'.get_term_link($specialty).'">'.$specialty->name.'</a></li>';
  }, $terms);

  $output = "<ul>";
  $output .= implode("", $specialty_links);
  $output .= "</ul>";
  return $output;
}

/**
 * Register shortcodes
 */
function register_shortcodes() {
  add_shortcode('specialties_list', 'App\\specialties_list');
}
add_action('init', 'App\\register_shortcodes');

?>
