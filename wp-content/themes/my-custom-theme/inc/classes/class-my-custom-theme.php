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
    }
}