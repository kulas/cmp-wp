<?php

namespace App;
use Cocur\Slugify\Slugify;

function add_nav_item_classes($classes, $item, $args, $depth) {
  $slugify = new Slugify();
  $classes[] = $slugify->slugify($item->title);
  return $classes;
}
add_filter( 'nav_menu_css_class', 'App\\add_nav_item_classes', 10, 4);
?>
