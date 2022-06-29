<?php
/**
 * Template part for displaying posts
 */
?>

<!-- post_class() -> lets WP add default post classes, but it also let us add custom classes -->
<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <?php if(is_single()) { ?>
        <div class="entry-content">
            <?php the_content(
                // 
                sprintf(
                    // escape html and allow html elements are (span and class)
                    wp_kses(
                        __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'mycustomtheme'),
                        [
                            'span' => [
                                'class' =>  []
                            ]
                        ]
                    ),
                    the_title('<span class="screen-reader-text">', '</span>', false)
                )
            );

            wp_link_pages([
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ninestars'),
                'after' => '</div>',
            ]);
            ?>
        </div>
    <?php }
    else {
        mycustomtheme_excerpt();
    }
        get_template_part('/template-parts/post/entry-header');
        get_template_part('/template-parts/post/entry-meta');
        get_template_part('/template-parts/post/entry-footer');
    ?>
    
</article>