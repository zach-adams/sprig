<?php
    /**
     * NOTICE:
     * This file contains modifications made by Zach Adams on 11-30-2014.
     * Modifications will be noted next to original comments.
     */
	/**
	 * TwigPress
	 *
	 * A plugin that allows the use of the Twig template engine to make templates for WordPress themes
	 *
	 * @package   TwigPress
	 * @author    Mike Shaw
	 * @license   GPL-2.0+
	 * @copyright 2013 Mike Shaw
	 *
	 * @wordpress-plugin
	 * Plugin Name: TwigPress
	 * Description: A plugin that allows the use of the <a href="http://twig.sensiolabs.org/">Twig templating engine</a> in WordPress themes
	 * Version:     1.1.1
	 * Author:      Mike Shaw
	 * License:     GPL-2.0+
	 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
	 */


	# If this file is called directly, abort.
	if (!defined('WPINC')) {
		die;
	}

	# Bring in the TwigPress class file
    # MODIFICATION: changes from plugin_dir_path to dirname(__FILE__)
	require_once(dirname(__FILE__) . '/Twig/class-twigpress.php');

	TwigPress::get_instance();

	/**
	 * A function for rendering a template through calling the TwigPress Class
	 *
	 * @param array    $vals            An array of variables to be rendered with the template, defaults to an empty array
	 * @param string   $template    The name of the template to be rendered, if users want to override the default action, defaults to false
	 * @param bool     $echo            A boolean indicating whether to echo or return the rendered template, defaults to true
	 *
	 * @return string The rendered template
	 */
	function twigpress_render_twig_template($vals = array(), $template = false, $echo = true) {
		$TwigPress = TwigPress::get_instance();

		# If no template has been specified, look for {PHP Template Filename}.twig
		if(false == $template) {
			$template = pathinfo(basename($TwigPress::$template), PATHINFO_FILENAME) . '.twig';
		}

		# Check whether we are echoing or returning
		if(true == $echo) {
			echo $TwigPress->render_template($template, $vals);
		} else {
			return $TwigPress->render_template($template, $vals);
		}
	}

	/**
	 * Function for return the content for a post
	 *
	 * As the_content() echoes content, and get_the_content() returns the
	 * unformatted content, this function takes care of turning the unformatted
	 * content into formated content for passing to a template
	 *
	 * This function can only be used inside the loop
	 *
	 * @return string The string of formatted content
	 */
	function twigpress_get_the_content() {
		return str_replace(']]>', ']]&gt;', apply_filters('the_content', get_the_content()));
	}



/**
 * MODIFICTATIONS: Additional functions to include in Twig Templates
 */
function returnObject($obj, $args = array()) {
	return new $obj($args);
}