<?php namespace WpSimpleTheme\WpRegister;

if( !defined( 'ABSPATH' ) ) exit;

class Taxonomy{

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'init', [ $this, 'RegisterTaxonomy' ] );
    }

    public static function RegisterTaxonomy(){

        register_taxonomy( "news_categories", [ "news" ], [
                "label" => __( "Newss", "domain" ),
                "labels" => [
                    "name"          => __( "News categories ", "domain" ),
                    "singular_name" => __( "news_cat", "domain" ),
                    ],
                "public" => true,
                "hierarchical" => true,
            ]
        );

        register_taxonomy( "careers_categories", [ "careers" ], [
                "label" => __( "Careers", "domain" ),
                "labels" => [
                    "name"          => __( "Careers categories", "domain" ),
                    "singular_name" => __( "careers", "domain" ),
                    ],
                "public" => true,
                "hierarchical" => true,
            ]
        );
    }

}

new Taxonomy();

class_alias( 'WpSimpleTheme\WpRegister\Taxonomy', 'Taxonomy' );