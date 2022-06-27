<?php
/**
 * Register Menus
 */

// my_custom_theme/inc folder namespace
namespace MY_CUSTOM_THEME\Inc;

use MY_CUSTOM_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct()
    {
        // load other classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // actions
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus() {
        register_nav_menus([
            'primary' => esc_html__('Primary', 'mycustomtheme'),
            'footer' => esc_html__('Footer Menu', 'mycustomtheme'),
        ]);
    }

    public function get_menu_id($location) {
        // Get all the locations of the menus
        $locations = get_nav_menu_locations();
        
        // Get object id by location
        $menu_id = $locations[$location]; // 6
        
        return !empty($menu_id) ? $menu_id : '';
    }

    public function get_child_menu_items($menu_array, $parent_id) {
        $child_menus = [];

        if (!empty($menu_array) && is_array($menu_array)) {
            foreach ($menu_array as $menu) {
                if (intval($menu->menu_item_parent) === $parent_id) {
                    array_push($child_menus, $menu);
                }
            }
        }

        return $child_menus;
    }
}
