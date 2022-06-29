<?php

if (!defined('MY_CUSTOM_THEME_DIR_PATH')) {
    define('MY_CUSTOM_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('MY_CUSTOM_THEME_DIR_URI')) {
    define('MY_CUSTOM_THEME_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once MY_CUSTOM_THEME_DIR_PATH . '/inc/helpers/autoloader.php';
require_once MY_CUSTOM_THEME_DIR_PATH . '/inc/helpers/template-tags.php';

function my_custom_theme_instance() {
    // call the get_instance method of the Singleton
    MY_CUSTOM_THEME\Inc\MY_CUSTOM_THEME::get_instance();
}
my_custom_theme_instance();

if (!function_exists('mytheme_setup')) {
    function mytheme_setup() {
        /*
            Support for custom background
        */
        add_theme_support('custom-background', apply_filters('wordpress_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

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