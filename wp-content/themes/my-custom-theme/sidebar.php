<?php
    /**
     * Template for sidebar.php which will appear on single post posts
     */
?>
<div class="sidebar">
    <!-- using the id we defined in function mytheme_sidebar_widgets_init()  -->
    <?php dynamic_sidebar('default-sidebar'); ?>
</div>