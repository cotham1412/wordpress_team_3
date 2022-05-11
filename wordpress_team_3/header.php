<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <link rel="profile" href="http://gmqp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="container">
        <div class="logo">
            <nav>
                <ul>
                    <?php
                    wp_nav_menu(array('theme_location' => 'header-menu'));
                    ?>
                </ul>
            </nav>
        </div>