<?php 

function alto_load_scripts() {
    wp_enqueue_style( 'alto-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css'), 'all' );
    wp_enqueue_style( 'alto-style-scss', get_site_url() . '/wp-content/themes/alto/assets/css/theme.css', array(), filemtime( get_template_directory() . '/assets/css/theme.css'), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap', array(), null );

    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/src/js/dropdown.js', array(), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'alto_load_scripts' ); 

register_nav_menus( 
    array(
        'alto_main_menu' => 'Main Menu',
        'alto_footer_menu' => 'Footer Menu', 
        'alto_mobile_menu' => 'Mobile Menu'
    )
);


add_theme_support( 'post-thumbnails' );