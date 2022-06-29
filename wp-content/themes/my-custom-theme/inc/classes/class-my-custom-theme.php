<?php
/**
 * Bootstraps (adds all basic functionalities) the theme
 */

namespace MY_CUSTOM_THEME\Inc;

use MY_CUSTOM_THEME\Inc\Traits\Singleton;

class MY_CUSTOM_THEME {
    use Singleton;

    protected function __construct()
    {
        // load other classes and check trait-singleton.php file
        // if not instantiated, will instantiate those classes
        // calling Assets, Menus and Meta_Boxes classes
        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // actions for setup_theme function
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme() {
        /* Let WP manage the document title
            - by adding theme support, we declare that this theme does not use a hard-coded
            <title> tag in the document head, and expect WP to provide it for us
        */
        add_theme_support('title-tag');

        /* 
            Custom logo support
            Dashboard -> Apperance -> Customize -> Site Identity -> Custom Logo
        */
        add_theme_support('custom-logo', [
            'height' => 100,
            'width' => 100,
            'flex-width' => true,
            'flex-height' => true,
        ]);

        /**
         * Custom background support
         * Dashboard-> Appearance -> Customize -> Background Image
         */
        add_theme_support('custom-background', [
            'default-color' => '#fff',
            'default-image' => '',
            'default-repeat' => 'no-repeat',
        ]);

        /**
         * Post Thumbnails support
         */
        add_theme_support('post-thumbnails');

        /**
         * Automated feed links support
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automated-feed-links');

        /**
         *  HTML5 theme support
         */ 
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ]);

        /**
         * Register image sizes
         */
        add_image_size('featured-thumbnail', 350, 232, true);

        // attach the stylesheet to the TinyMCE editor (default editor-style.css)
        add_editor_style();

        /*
            Add theme support for selection refresh for widgets
        */
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Guttenberg block styles 
         */
        add_theme_support('wp-block-styles');

        /**
         * wide and full alignment support for Guttenberg blocks
         */
        add_theme_support('align-wide');

        // sets the maximum width for allowed content of our content
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1240;
        }

        /*
            Make theme available for translation
            translations can be filled in the /languages/ directory
        */
        load_theme_textdomain('wordpress-test-app', get_template_directory() . '/languages');

    }
}