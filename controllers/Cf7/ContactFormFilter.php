<?php namespace WpSimpleTheme\Cf7;

if( !defined( 'ABSPATH' ) ) exit;

class ContactFormFilter {
    public function __construct(){
        $this->applyActions();
    }

    public function applyActions(){
        add_action( 'wpcf7_init', [$this, 'addCustomTags'] );
    }

    public function addCustomTags(){
        $template_name = 'cf7/social-icons';
        wpcf7_add_form_tag('social_icons', function( ) use ( $template_name ) {
            return \Display::getTemplatePart('cf7/social-icons', [], false);
        } );
    }

}

new ContactFormFilter();

class_alias( 'WpSimpleTheme\Cf7\ContactFormFilter', 'ContactFormFilter' );