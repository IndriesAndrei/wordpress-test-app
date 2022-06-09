<?php

get_header();

    get_search_form();

    // wordpress loop
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/post/content');
        endwhile;
    endif;

get_footer();