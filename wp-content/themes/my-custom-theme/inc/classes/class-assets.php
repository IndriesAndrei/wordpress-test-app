<?php
/**
 * Enqueue theme assets
 */

// my_custom_theme/inc folder namespace
namespace MY_CUSTOM_THEME\Inc;

use MY_CUSTOM_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct()
    {
        // load other classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // actions
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles() {
        // styles
        // get_template_directory_uri() -> path till our theme my-custom-theme
        wp_enqueue_style('bootstrap-css', MY_CUSTOM_THEME_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );
        wp_enqueue_style('default-css', MY_CUSTOM_THEME_DIR_URI . '/assets/css/default.css', [], wp_rand(), 'all' );
        wp_enqueue_style('main-css', MY_CUSTOM_THEME_DIR_URI . '/assets/css/main.css', [], wp_rand(), 'all' );
    }

    public function register_scripts() {
        // Scripts
        wp_enqueue_script('main-js', MY_CUSTOM_THEME_DIR_URI . '/assets/js/main.js', ['jquery'], wp_rand(), true);
        wp_enqueue_script('bootstrap-js', MY_CUSTOM_THEME_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);
    }
}
