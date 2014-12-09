<?php
/**
 * Sprig includes
 *
 * The $sprig_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 */
$sprig_includes = array(
	'inc/utils.php',                  // Utility functions
	'inc/init.php',                   // Initial theme setup and constants
	'inc/config.php',                 // Configuration
	'inc/activation.php',             // Theme activation
	'inc/titles.php',                 // Page titles
	'inc/wp_bootstrap_navwalker.php', // Bootstrap Nav Walker (From https://github.com/twittem/wp-bootstrap-navwalker)
	'inc/gallery.php',                // Custom [gallery] modifications
	'inc/comments.php',               // Custom comments modifications
	'inc/scripts.php',                // Scripts and stylesheets
	'inc/twigpress.php',                   // Load TwigPress Engine
	'inc/extras.php',                  // Custom functions
);

foreach ($sprig_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sprig'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);