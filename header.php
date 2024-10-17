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
                    <?php 
                        if ( has_custom_logo() ) {
                            the_custom_logo(); 
                        } else {
                    ?>
                    <a href="<?php echo home_url('/'); ?>" class="logo-text">
                        <?php echo bloginfo('name'); ?>
                    </a>
                    <?php
                        }
                    ?>
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-black.svg" alt="logo"> -->
                </div>
                <nav class="main-menu">
                    <?php wp_nav_menu(array( 'theme_location' => 'alto_main_menu', 'depth' => 2 )); ?>
                </nav>
                <div class="toggle-btn">
                    <div class="toggle-bar"></div>
                    <div class="toggle-bar"></div>
                </div>
                <div class="slide-nav">
                    <nav>
                        <?php wp_nav_menu(array( 'theme_location' => 'alto_mobile_menu', 'depth' => 2 )); ?>
                    </nav>

                    <ul class="social-links">
                        <?php 
                            $options =  get_option('site_options') ; 
                            $names = array_keys(get_option('site_options'));
                            foreach($options as $key => $value) {
                                if ($value) {
                                    $name = str_replace( 'site_options_', "", $key);
                                    echo '<li><a href="'. $value .'" target="_blank">' . $name . '</a></li>';
                                }
                            }
                        ?>
                    </ul>
                    <?php get_search_form(); ?>
                </div>
            </section>
        </header>
        <!-- HEADER ENDS -->