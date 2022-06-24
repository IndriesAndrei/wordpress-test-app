<?php
/**
 * Contains the header
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- include style.css file -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

    <!-- wp_head -> all kind on WP things to load -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php if (function_exists('wp_body_open')) {
        wp_body_open();
    }; ?>
    
    <main class="container">
        <header id="masterheader" class="site-header" role="banner">
            <?php get_template_part('/template-parts/header/nav'); ?>
        </header>
