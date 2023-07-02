<?php namespace WpSimpleTheme\Cf7;

if( !defined( 'ABSPATH' ) ) exit;

class ContactFormFilter{
    public function __construct(){
        $this->applyActions();
    }

    public static $message = '';

    public function applyActions(){
        add_action( 'wpcf7_init', [$this, 'addCustomTags'] );

        add_filter( 'wpcf7_load_js', '__return_false' );
        add_filter( 'wpcf7_load_css', '__return_false' );

        add_filter( 'wpcf7_display_message', [$this, 'getCf7Message'], 10, 2);
    }

    public function addCustomTags(){
        $template_name = 'cf7/social-icons';
        wpcf7_add_form_tag('social_icons', function() use ( $template_name ) {
            return \Display::getTemplatePart('cf7/social-icons', [], false);
        } );
    }

    public function getCf7Message( $message, $status ){
        $submission = \WPCF7_ContactForm::get_current();
        $tag = $submission->pref('message_to_custom_template');

        if( !empty( $tag ) && $tag == 'true'){
            static::$message = $message;
            return '';
        }

        return $message;
    }

    public static function getMessage(){
        return static::$message;
    }

}

new ContactFormFilter();

class_alias('WpSimpleTheme\Cf7\ContactFormFilter', 'ContactFormFilter');