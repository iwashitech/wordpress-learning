<?php

function my_custom_popular_posts_html_list($popular_posts, $instance) {
  $output = '<ul">';
  foreach( $popular_posts as $popular_post ) {
    $output .= '<li>';
    $output .= get_the_permalink($popular_post->id);
    $output .= get_the_post_thumbnail( $popular_post->id, 'thumbnail' );
    $output .= get_the_date('Y/n/j');
    $output .= $popular_post->title;
    $output .= '</li>';
  }
  $output .= '</ul>';

  return $output;
}

function my_custom_popular_posts_html_list_using_array_reduce($popular_posts, $instance) {
  $output = array_reduce($popular_posts, function($acc, $popular_post) use($popular_posts) {
    $acc .= '<li>';
    $acc .= get_the_permalink($popular_post->id);
    $acc .= get_the_post_thumbnail( $popular_post->id, 'thumbnail' );
    $acc .= get_the_date('Y/n/j');
    $acc .= $popular_post->title;
    if ($popular_posts[count($popular_posts) - 1] == $popular_post) {
      $acc .= '</ul>';
    }
    return $acc;
  }, '<ul>');
  
  return $output;
}

add_filter('wpp_custom_html', 'my_custom_popular_posts_html_list', 10, 2);