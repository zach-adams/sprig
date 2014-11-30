<?php
// SETTINGS
//-------------------------------------------------------------
$cache = true;
$debug = true;
//-------------------------------------------------------------

// Twig's root directory
define('TWIG_ROOT', dirname(__FILE__) . '/twig');

// Twig's cache storage directory
define('TWIG_STORAGE', TWIG_ROOT . '/storage');

// Twig's main library directory
define('TWIG_LIB', TWIG_ROOT . '/lib/Twig');

// Main templates directory
define('TWIG_TEMPLATES', dirname(__FILE__).'/../');

// Define Twig's caching system
if($cache == true) {
    define('TWIG_CACHE', true);
}
else {
    define('TWIG_CACHE', false);
}
// Define Twig's debug system
if($debug == true) {
    define('TWIG_DEBUG', true);
}
else {
    define('TWIG_DEBUG', false);
}

// Initialize Twig
require_once(TWIG_ROOT . '/initalize.php');
Twig_Controller::make();