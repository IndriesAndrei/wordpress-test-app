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
        // load other classes

        Assets::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // actions
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
        */
        add_theme_support('custom-logo', [
            'height' => 100,
            'width' => 100,
            'flex-width' => true,
            'flex-height' => true,
        ]);

    }
}