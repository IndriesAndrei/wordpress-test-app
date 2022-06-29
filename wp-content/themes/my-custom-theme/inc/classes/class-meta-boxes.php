<?php
/**
 * Register Meta Boxes
 */

namespace MY_CUSTOM_THEME\Inc;

use MY_CUSTOM_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
        add_action('save_post', [$this, 'save_post_meta_data']);
    }

    public function add_custom_meta_box($post) {
        $screens = ['post'];

        foreach ($screens as $screen) {
            add_meta_box(
                'hide-page-title', // Unique ID
                __('Hide page title', 'mycustomtheme'), // Box title
                [$this, 'custom_meta_box_html'], // content callback
                $screen, // Post type
                'side'
            );
        }
    }

    public function custom_meta_box_html($post) {
        // name of the post meta in the DB (ex: 1_hide_page_title)
        $value = get_post_meta( $post->ID, '_hide_page_title', true );

        /**
         * Use nonce for verification
         */
        
         // create nonce (action, nonce_name)
         wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name');
        ?>

        <label for="mycustomtheme_field"><?php esc_html_e('Hide the page title'); ?></label>
        <select name="mycustomtheme_hide_title_field" id="mycustomtheme-field" class="postbox">
            <option value=""><?php esc_html_e('Select', 'mycustomtheme'); ?></option>
            <option value="yes" <?php selected( $value, 'yes' ); ?>><?php esc_html_e('Yes'); ?></option>
            <option value="no" <?php selected( $value, 'no' ); ?>><?php esc_html_e('No'); ?></option>
        </select>
        <?php
    }

    public function save_post_meta_data($post_id) {
        /**
         * When post is saved or updated we get $_POST available and we check if current user is authorized
         */
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        /**
         * Check if the nonce value we received is the same we created (nonce_name, action)
         */
        if (!isset($_POST['hide_title_meta_box_nonce_name']) || !wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__))) {
            return;
        }

        if ( array_key_exists( 'mycustomtheme_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['mycustomtheme_hide_title_field']
            );
        }
    }
}