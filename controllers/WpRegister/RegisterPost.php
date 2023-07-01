<?php namespace WpSimpleTheme\WpRegister;

if( !defined( 'ABSPATH' ) ) exit;

class RegisterPost {

    public function __construct() {
        $this->applyActions();
    }

    public function applyActions() {
        add_action( 'init', [ $this, 'RegisterPostType' ] );
    }

    public function RegisterPostType(){

        register_post_type( 'careers', array(
            'labels' => array(
                'name'          => 'Careers',
                'menu_name'     => 'Careers',
                'add_new_item'  => 'Add New Vacancy',
                ),
            'public' => true,
            'has_archive' => true,
            'taxonomies' => array( 'careers_categories' ),
            'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
        ) );

        register_post_type( 'news', array(
            'labels' => array(
                'name'          => 'News & Media',
                'menu_name'     => 'News & Media',
                ),
            'public' => true,
            'has_archive' => true,
            'taxonomies'         => array( 'news_categories' ),
            'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
        ) );
    }

}

new RegisterPost();

class_alias( 'WpSimpleTheme\WpRegister\RegisterPost', 'RegisterPost' );
