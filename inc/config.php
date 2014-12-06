<?php
/**
 * Additional functions to include in Twig Templates
 */
function getBootstrapNavWalker() {
	$return = array(
		'theme_location' => 'primary_navigation',
		'menu_class' => 'nav navbar-nav',
		'walker' => new wp_bootstrap_navwalker(),
		'container_class' => 'collapse navbar-collapse'
	);
	return $return;
}

/**
 * Enable theme features
 */
add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */

if (!defined('WP_ENV')) {
  define('WP_ENV', 'development');  // scripts.php checks for values 'production' or 'development'
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 1140; }

add_filter('twigpress_twig_global_functions', 'add_functions');
function add_functions($functions) {
    foreach ($GLOBALS['additional_functions'] as $additional_function) {
        array_push($functions, $additional_function);
    }
    return $functions;
}