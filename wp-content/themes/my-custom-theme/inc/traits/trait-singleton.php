<?php
/**
 * Traits -> use methods and properties of one trait into multiple classes
 * Singleton -> allow us to make sure there is only one instance of a class
 * (every time we instantiate a new Class, it should use the same object reference for that class)
 */

namespace MY_CUSTOM_THEME\Inc\Traits;

trait Singleton {
    protected function __construct() {

    }

    final protected function __clone() {

    }

    final public static function get_instance() {
        // return new Singleton instance 
        static $instance = [];

        $called_class = get_called_class();

        if (!isset($instance[$called_class])) {
            $instance[$called_class] = new $called_class();

            do_action(sprintf('my_custom_theme_singleton_init%s', $called_class));
        }

        return $instance[$called_class];
    }
 }