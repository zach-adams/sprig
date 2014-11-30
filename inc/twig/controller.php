<?php

class Twig_Controller {
    var $model;
    public function __construct() {
        $this->model = new Twig_Model();

        // Check for Wordpress template includes
        add_action( 'template_include', array( $this->model, 'template_include_twig' ) );

        // Check for index template filter
        //add_filter( 'index_template', array( $this->model, 'template_include_twig' ) );

        // Check for page template filter
        //add_filter( 'page_template', array( $this->model, 'template_include_twig' ) );
    }
    public static function make() {
        return new self();
    }
}