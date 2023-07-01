<?php namespace WpSimpleTheme\WpRegister;

if( !defined( 'ABSPATH' ) ) exit;

class OptionPages {

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'acf/init', [ $this, 'RegisterOptionPage' ] );
    }
    public static function RegisterOptionPage(){
        if( function_exists( 'acf_add_options_page' ) ) {
            acf_add_options_page(array(
                'page_title'    => 'Global Settings',
                'menu_title'    => 'Global Settings',
                'menu_slug'     => 'global-settings',
                'capability'    => 'administrator',
                'redirect'      => false
            ));
        }
    }
}

new OptionPages();

class_alias( 'WpSimpleTheme\WpRegister\OptionPages', 'OptionPages' );