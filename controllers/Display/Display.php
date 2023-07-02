<?php namespace WpSimpleTheme\DisplayContent;

if( !defined( 'ABSPATH' ) ) exit;

class Display{

    public static function getTemplatePart( $slug, $args = [], $echo = true ){
        if( function_exists('get_fields') ){
            $args['acf_fields'] = get_fields();
        }

        return !empty( $slug )
            ? static::getTemplate( 'partials/'.$slug, $args, $echo )
            : '';
    }

    public static function getTemplate( $slug, $args = [], $echo = true ){
        if( empty( $slug ) ) return '';

        $dir        = get_stylesheet_directory();
        $full_path  = $dir . '/' . $slug . '.php';

        if( !file_exists( $full_path ) ) return '';
        if( !empty( $args ) ) extract( $args );

        ob_start();
        include $full_path;
        $content = ob_get_clean();

        if( $echo ){
            echo $content;
            return;
        }

        return $content;
    }

}

class_alias('WpSimpleTheme\DisplayContent\Display', 'Display');