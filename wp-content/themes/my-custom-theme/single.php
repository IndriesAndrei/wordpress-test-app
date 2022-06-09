<?php
/**
 * Single page template
 */

 get_header();
?>

<div id="primary" class="content-area">
    <section class="site-main" id="main">
        <?php
            while (have_posts()):
                the_post();
                get_template_part('template-parts/post/content');
            endwhile;

            // if comments are open, show comments template
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;
        ?>
    </section>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>