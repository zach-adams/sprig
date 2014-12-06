<?php
    /**
     * NOTICE:
     * This file contains modifications made by Zach Adams on 11-30-2014.
     * Modifications will be noted next to original comments.
     */
	/**
	 * TwigPress.
	 *
	 * @package   TwigPress
	 * @author    Mike Shaw
	 * @license   GPL-2.0+
	 * @copyright 2013 Mike Shaw
	 */

	/**
	 * TwigPress class.
	 *
	 * @package TwigPress
	 * @author  Mike Shaw
	 */
	class TwigPress {
		/**
		 * Plugin version, used for cache-busting of style and script file references.
		 *
		 * @since   1.0.0
		 *
		 * @var     string
		 */
		protected $version = '1.1.1';

		/**
		 * Unique identifier for your plugin.
		 *
		 * @since    1.0.0
		 *
		 * @var      string
		 */
		protected $plugin_slug = 'twigpress';

		/**
		 * Instance of this class.
		 *
		 * @since    1.0.0
		 *
		 * @var      object
		 */
		private static $instance;

		/**
		 * Path to the plugin
		 *
		 * @since 1.0.0
		 *
		 * @var string
         *
         * MODIFICATION: Commented out unnecessary variable
		 */
		// private static $plugin_path;

		/**
		 * The Twig Loader Object
		 *
		 * @since 1.0.0
		 *
		 * @var object
		 */
		private static $twig_loader;

		/**
		 * The Twig Environment Object
		 *
		 * @var object
		 */
		private static $twig_environment;

		/**
		 * Twig Environment Settings
		 *
		 * @var array
		 */
		private static $twig_environment_settings;

		/**
		 * An array to store the functions that are to be added to
		 * the Twig environment for use in templates
		 *
		 * @var array
		 */
		private static $global_functions;

		/**
		 * An array to hold the global variables that are to be added to
		 * each template directly through the environment
		 *
		 * @var array
		 */
		private static $global_variables;

		/**
		 * Variable to store the name of the template WordPress has chosen to use
		 *
		 * @since 1.0.0
		 *
		 * @var string
		 */
		public static $template;

		/**
		 * Initialize the plugin.
		 *
		 * @since     1.0.0
         *
         * MODIFICATIONS: Removed everything in this function except for init and template_include action and filters
		 */
		private function __construct() {
            # Set up the action for setting up the Twig environment
            add_action('init', array($this, 'setup_twig_environment'), 0, 0);

            # Add a filter to retrieve the name of the template WordPress is going to use
            add_filter('template_include', array($this, 'get_chosen_template_name'), 10, 1);
		}

		/**
		 * Return an instance of this class.
		 *
		 * @since     1.0.0
		 *
		 * @return    object    A single instance of this class.
		 */
		public static function get_instance() {
			# If the single instance hasn't been set, set it now.
			if (null == self::$instance) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * This function sets up the Twig environment
		 *
		 * @since 1.0.0
		 */
		public function setup_twig_environment() {
			# Include the Twig Autoloader and register Twig
            # MODIFICATION: changed from WP_CONTENT_DIR to dirname(__FILE__)
			require_once(dirname(__FILE__) . '/Twig/Twig/Autoloader.php');
			Twig_Autoloader::register();

			# Setup options for the Twig environment
			self::setup_twig_environment_options();

			# Now we load the TWIG filesystem and environment
			self::$twig_loader = new Twig_Loader_Filesystem(get_stylesheet_directory() . '/twigs');
			self::$twig_environment = new Twig_Environment(self::$twig_loader, self::$twig_environment_settings);

			# Run our functions for adding global functions and variables to the environment
			self::add_global_variables();
			self::add_global_functions();
		}

        # MODIFICATION: Changed get_stylesheet_directory() to dirname(__FILE__)
		private function setup_twig_environment_options() {
			self::$twig_environment_settings = array(
				'charset' => get_bloginfo('charset'),
				'autoescape' => false,
				'auto_reload' => true,
				'cache' => dirname(__FILE__) . '/twig_cache'
			);
		}

		/**
		 * This function is responsible for adding global variables to the system
		 *
		 * @since 1.0.0
		 */
		private function add_global_variables() {
			# Here we set some default global variables
			self::$global_variables = array(
				'site' => array(
					'lang_attributes' => get_bloginfo('language'),
					'charset' => get_bloginfo('charset'),
					'url' => get_bloginfo('url'),
					'stylesheet_directory' => get_stylesheet_directory_uri(),
					'title' => get_bloginfo('name'),
					'description' => get_bloginfo('description')
				)
			);

			# Apply a filter to let users add variables to the globals
			self::$global_variables = apply_filters('twigpress_twig_site_variables', self::$global_variables);

			# Let's iterate through our variables array and add them to the environment
			foreach(self::$global_variables as $name => $val) {
				self::$twig_environment->addGlobal($name, $val);
			}
		}

		/**
		 * This function is responsible for adding global functions to the system
		 *
		 * Some of the WordPress functions, such as wp_head() and wp_foot() don't have an equivalent function
		 * that returns instead of echoes so we need to make functions such as these available within Twig templates
		 *
		 * @since 1.0.0
		 */
		private function add_global_functions() {
			# Here we set some default functions to be added
			self::$global_functions = array (
				'wp_head',
				'wp_footer',
				'wp_title',
				'body_class',
				'wp_nav_menu'
			);

			# Apply a filter to allow the global functions array to be altered
			self::$global_functions = apply_filters('twigpress_twig_global_functions', self::$global_functions);

			# Let's iterate through our functions array and make them available
			foreach(self::$global_functions as $function) {
				# If a string isn't passed, or the string is empty we can't add it to the environment
				if( ! is_string($function) || empty($function)) {
					echo 'Each index in the global functions array must be a string containing a function name, could not add "' . $function . '"';
					continue;
				}

				self::$twig_environment->addFunction($function, new Twig_Function_Function($function));
			}
            # MODIFICATION: Added new function for 'fn' which calls exec_function
            self::$twig_environment->addFunction(new Twig_SimpleFunction( 'fn', array( $this, 'exec_function' ) ) );
		}

		/**
		 * A wrapper function for rendering templates
		 *
		 * @param   string   $template      The name of the template that is to be rendered
		 * @param   array    $vals              An array of variables that are to be rendered with the template
		 *
		 * @since 1.0.0
		 */
		public function render_template($template, $vals) {
			/**
			 * Allow users to add variables to every template just before rendering. This means that all functions
			 * and data the page has access to are available.
			 */
			$vals = apply_filters('twigpress_twig_post_template_vars', $vals);

			return self::$twig_environment->render($template, $vals);
		}

		/**
		 * Fired when the plugin cannot find the Twig files, displays a notice in the Admin
		 *
		 * @since 1.0.0
		 */
		public static function twig_files_not_found_notification() {
			echo '<div class="error"><p><b>Warning:</b> TwigPress cannot find the Twig autoloader.php file. This is required!</p></div>';
		}

		/**
		 * This function simply stores, in $template, the filename of the template being used
		 *
		 * It also returns the template name so WordPress can keep using it, as the filename is retrieved from a filter
		 *
		 * @since 1.0.0
		 */
		public function get_chosen_template_name($template) {
			return self::$template = $template;
		}
	}
