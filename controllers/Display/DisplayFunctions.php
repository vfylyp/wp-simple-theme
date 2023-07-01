<?php namespace WpSimpleTheme\DisplayContent;

if( !defined( 'ABSPATH' ) ) exit;

class DisplayFunctions{
    public static function showMenu( $menu_name, $echo = true ){
        $menu = static::listOfMenu( $menu_name );

        if(!empty( $menu )){
            $menu['echo'] = $echo;
            return wp_nav_menu( $menu );
        }
        return '';
    }

    public static function listOfMenu( $menu_name ){
        $menu_list =
        [
            'header_menu' => [
                'theme_location'    => 'header_menu',
                'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
                'menu_class'        => '',
                'menu_id'           => '',
                'container'         => '',
                'fallback_cb'       => false,
            ],
            'footer_menu' => [
                'theme_location'    => 'footer_menu',
                'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
                'menu_class'        => '',
                'menu_id'           => '',
                'container'         => '',
                'fallback_cb'       => false
            ]
        ];

        return !empty( $menu_list[$menu_name] )? $menu_list[$menu_name]: '';
    }
}

class_alias('WpSimpleTheme\DisplayContent\DisplayFunctions', 'DisplayFunctions');