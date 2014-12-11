<?php

/**
 * Clean up the_excerpt()
 */
function sprig_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sprig') . '</a>';
}
add_filter('excerpt_more', 'sprig_excerpt_more');

/**
 * Manage output of wp_title()
 */
function sprig_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'sprig_wp_title', 10);


