<?php

if (!defined('MY_CUSTOM_THEME_DIR_PATH')) {
    define('MY_CUSTOM_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('MY_CUSTOM_THEME_DIR_URI')) {
    define('MY_CUSTOM_THEME_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once MY_CUSTOM_THEME_DIR_PATH . '/inc/helpers/autoloader.php';

function my_custom_theme_instance() {
    // call the get_instance method of the Singleton
    MY_CUSTOM_THEME\Inc\MY_CUSTOM_THEME::get_instance();
}
my_custom_theme_instance();

if (!function_exists('mytheme_setup')) {
    function mytheme_setup() {
        /*
            Make theme available for translation
            translations can be filled in the /languages/ directory
        */
        load_theme_textdomain('wordpress-test-app', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        /* Let WP manage the document title
            - by adding theme support, we declare that this theme does not use a hard-coded
            <title> tag in the document head, and expect WP to provide it for us
        */
        add_theme_support('title-tag');

        /*
            Enable support for Post thumbnails
        */
        add_theme_support('post-thumbnails');

        /*
            Support for custom background
        */
        add_theme_support('custom-background', apply_filters('wordpress_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

        /*
            HTML5 support
        */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        /*
            Add theme support for selection refresh for widgets
        */
        add_theme_support('customize-selective-refresh-widgets');

        /* 
            Custom logo support
        */
        add_theme_support('custom-logo', [
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ]);

        /* 
            Custom Page Header support
        */
        add_theme_support('custom-header', [
            'flex-width' => true,
            'width' => 1600,
            'flex-height' => true,
            'height' => 450,
            'default-image' => '',
        ]);

        /*
            Add Post Type support
        */
        add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);
    
        /* 
            Menu options
        */
        register_nav_menus([
            'primary' => esc_html__('Primary', 'wordpress-test-app'),
            'footer' => esc_html__('Footer Menu', 'wordpress-test-app'),
        ]);
    }   
}
add_action('after_setup_theme', 'mytheme_setup');

/*
    Set the content width in pixels, based on the theme's design and stylesheet
*/
function mytheme_content_width() {
    // this variable is intended to be overruled from themes
    // Bootstrap max width 1170px
    $GLOBALS['content_width'] = apply_filters('mytheme_content_width', 1170);
}
add_action('after_setup_theme', 'mytheme_content_width', 0);

/*
    Register Sidebar widget area
*/
function mytheme_sidebar_widgets_init() {
    register_sidebar([
        'name' => esc_html__('Sidebar', 'wordpress-test-app'),
        'id' => 'default-sidebar',
        'description' => esc_html__('Add widgets here', 'wordpress-test-app'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ]);
}
add_action('widgets_init', 'mytheme_sidebar_widgets_init');

/**
 * Enqueue Admin scripts and styles
 */
function mytheme_admin_scripts() {

}
add_action('admin_enqueue_scripts', 'mytheme_admin_scripts');