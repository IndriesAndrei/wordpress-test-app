<?php
/**
 * Template for displaying comments.
 */

 if (post_password_required()) {
    return;
 }
 ?>

 <div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php $comments_count = get_comments_number();
                if ('1' === $comments_count) {
                    printf(
                        esc_html__('Comments (1)', 'wordpress-test-app'),
                    );
                } else {
                    printf(
                        esc_html__('Comments (%1$s)', 'wordpress-test-app'),
                        intval($comments_count)
                    );
                } 
            ?>
        </h2>
        <?php the_comments_navigation(); ?>
        <ol class="comment-list">
            <?php wp_list_comments([
                'style' => 'ol',
                'short_ping' => true
            ]); ?>
        </ol>
        <?php the_comments_navigation(); 

        // if comments are closed, show this message
        if ( !comments_open()) {
            printf(
                // %1$s -> placeholder
                '<p class="no-comments">%1$s</p>',
                esc_html__('Comments are closed', 'wordpress-test-app')
            );
        }

        endif; 

        // show comments form
        comment_form();
    ?>
 </div>