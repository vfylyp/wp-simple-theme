<?php namespace WpSimpleTheme\Acf;

if( !defined( 'ABSPATH' ) ) exit;

class AcfRegister{
    public function __construct(){
        $this->applyActions();
    }

    public function applyActions(){
        add_filter( 'acf/fields/google_map/api', [$this , 'acfSetupKey']);
    }

    public function acfSetupKey( $api ){
        if( !defined('GOOGLE_MAP_KEY') ) return $api;

        $api['key'] = GOOGLE_MAP_KEY;
        return $api;
    }
}

new AcfRegister();