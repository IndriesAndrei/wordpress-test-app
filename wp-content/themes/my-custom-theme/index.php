<?php
    /**
     * The main template file
     */
    get_header();
?>


<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
            // wordpress loop
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/post/content', get_post_format());
                endwhile;

                echo paginate_links([
                    'prev_text' => esc_html__('Prev', 'wordpress-test-app'),
                    'next_text' => esc_html__('Next', 'wordpress-test-app'),
                ]);
            else :
                // if there are no Posts for the specific category
                get_template_part('template-parts/page/content', 'none');
            endif;
        ?>
    </main>

    <?php get_sidebar(); ?>
</div>
<?php get_footer();