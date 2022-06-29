<?php
    /**
     * Template part for displaying a message that posts cannot be found
     */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing found', 'mycustomtheme'); ?></h1>
    </header>

    <div class="page-content">
        <?php
            if (is_home() && current_user_can('publish_posts')) {
                printf(
                    // wp_kses => filters the text content and strips out disallowed HTML
                    '<p>' . wp_kses(
                        /* translators 1: link to WP admin new post page */
                        __('Ready to publish your first post? <a href="%1$s">Get started here</a>', 'mycustomtheme'),
                        [
                            'a' => [
                                'href' => [],
                            ]
                        ]
                    ) . '</p>',
                    esc_url(admin_url('post-new.php'))
                );
            } elseif (is_search()) { ?>
                <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different term.', 'mycustomtheme'); ?></p>
                <?php get_search_form();
            } else { ?>
                <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps a new search can help you.', 'mycustomtheme'); ?></p>
                <?php get_search_form();
            }; 
        ?>
    </div>
</section>