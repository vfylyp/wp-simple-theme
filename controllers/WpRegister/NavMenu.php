<?php namespace WpSimpleTheme\WpRegister;

if( !defined( 'ABSPATH' ) ) exit;

class NavMenu {

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'after_setup_theme', [ $this, 'RegisterNavMenu' ] );
    }

    public static function RegisterNavMenu(){
        register_nav_menus( [
            'header_menu' => 'Header menu',
            'footer_menu' => 'Footer menu'
        ] );
    }

}

new NavMenu();

class_alias( 'WpSimpleTheme\WpRegister\NavMenu', 'NavMenu' );