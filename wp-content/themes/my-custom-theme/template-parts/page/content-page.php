<?php
/**
 * Template part to display page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

    <?php 
        /**
         * Page thumbnail
         */
        if (has_post_thumbnail()):
            the_post_thumbnail('large');
        endif;
    ?>

    <div class="entry-content">
        <?php 
            the_content();

            wp_link_pages([
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ninestars'),
                'after' => '</div>',
            ]);
        ?>
    </div>
</article>