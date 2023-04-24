<?php

function my_wp_nav_menu_objects( $items, $args ) {
  if($args->theme_location == 'primary') {
    foreach( $items as &$item ) {
      $image = get_field('icon', $item);
      if( $image ) {
        $item->title = '<span class="inline-img ' . $item->class . '"><img class="style-svg" src="' . $image['url'] . '" width="" height="" alt="' . $image['alt'] . '" /></span> ' . $item->title;
      }
    }
  }
  return $items;
}
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);