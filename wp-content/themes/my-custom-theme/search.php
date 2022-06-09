<?php
/**
 * Template for displaying search results page
 */
get_header(); 
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()): 
                // start the loop
                while (have_posts()):
                    the_post();
                    get_template_part('template-parts/page/content', 'search');
                endwhile;

                echo paginate_links([
                    'prev_text' => esc_html__('Prev', 'wordpress-test-app'),
                    'next_text' => esc_html__('Next', 'wordpress-test-app'),
                ]);
        else:
            // if there are no search results
            get_template_part('template-parts/page/content', 'none');
        endif; ?>
    </main>
</div>

<?php
get_footer();
