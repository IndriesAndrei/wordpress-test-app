<?php
/**
 * Template for entry meta
 */
?>

<div class="entry-meta mb-3">
    <?php 
        mycustomtheme_posted_on(); 
        echo '&nbsp;';
        mycustomtheme_posted_by();
    ?>
</div>