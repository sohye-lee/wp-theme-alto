<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <!-- HEADER -->
        <header>
            <section class="menu-area">
                <div class="logo">
                    ALTO*
                </div>
                <nav class="main-menu">
                    <?php wp_nav_menu(array( 'theme_location' => 'alto_main_menu', 'depth' => 2 )); ?>
                </nav>
                <div class="toggle-btn">
                    <div class="toggle-bar"></div>
                    <div class="toggle-bar"></div>
                </div>
            </section>
        </header>
        <!-- HEADER ENDS -->