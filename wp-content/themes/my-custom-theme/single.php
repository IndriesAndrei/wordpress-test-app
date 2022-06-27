<?php
/**
 * Single page template
 */

 get_header();
?>

<div id="primary" class="content-area">
    <section class="site-main" id="main">
        <?php
            if (have_posts()) :
                while (have_posts()):
                    the_post();

                    // to get the post type of image, video, etc. 
                    // we use get_post_format and we save the file as content-image.php content-video.php etc.
                    get_template_part('template-parts/post/content', get_post_format());
                endwhile;
            endif;

            // if comments are open, show comments template
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;
        ?>
    </section>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>