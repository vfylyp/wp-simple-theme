<?php namespace WpSimpleTheme\WpRegister;

if( !defined( 'ABSPATH' ) ) exit;

class ThemeSetup {
    public function __construct(){
        $this->applyActions();
    }

    public function applyActions(){
        add_action( 'wp_enqueue_scripts', [ $this, 'themeEnqueue' ] );

        add_action( 'customize_register', '__return_false' );

        add_filter( 'comments_array', [$this, 'hideExistingComments'], 10, 1 );
        add_filter( 'comments_open', '__return_false', 20, 2 );
        add_filter( 'pings_open', '__return_false', 20, 2 );
        add_action( 'admin_init', [$this, 'adminMenuRedirect'] );
        add_action( 'admin_init', [$this, 'RemoveCommentsFromDashboard'] );
        add_action( 'admin_menu', [$this, 'RemoveFromAdminMenu'] );
        add_action( 'admin_init', [$this, 'RemoveCommentsFromPostType'] );
        add_action( 'pre_comment_on_post', [$this, 'DisableCommentsApi'] ); 
        add_action( 'wp_before_admin_bar_render', [$this, 'RemoveCommentsFromAdminBar'] );

        add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
        add_action( 'map_meta_cap', [$this, 'disableThemeCustomizerAccess'], 10, 4 );

    }

    public function themeEnqueue(){
        wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css');

        wp_deregister_script('jquery');
    }

    public function disableThemeCustomizerAccess( $caps, $cap, $user_id, $args ){
        if( $cap === 'customize' ) $caps = array('do_not_allow');
        return $caps;
    }

    public function RemoveCommentsFromPostType(){
        $post_types = get_post_types();
        foreach ($post_types as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    }

    public function hideExistingComments( $comments ){
        $comments = array();
        return $comments;
    }

    public function RemoveFromAdminMenu(){
        remove_menu_page('edit-comments.php');
    }

    public function adminMenuRedirect(){
        global $pagenow;
        if( $pagenow === 'edit-comments.php' ){
            wp_redirect(admin_url());
            exit();
        }
    }

    public function RemoveCommentsFromDashboard(){
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }

    public function RemoveCommentsFromAdminBar(){
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }

    public function DisableCommentsApi(){
        wp_die('No comments');
    }

}

new ThemeSetup();