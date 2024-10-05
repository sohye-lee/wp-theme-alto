<?php 

function alto_load_scripts() {
    wp_enqueue_style( 'alto-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css'), 'all' );
    wp_enqueue_style( 'alto-style-scss', get_site_url() . '/wp-content/themes/alto/assets/css/theme.css', array(), filemtime( get_template_directory() . '/assets/css/theme.css'), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap', array(), null );

    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'alto_load_scripts' ); 

register_nav_menus( 
    array(
        'alto_main_menu' => 'Main Menu',
        'alto_footer_menu' => 'Footer Menu', 
        'alto_mobile_menu' => 'Mobile Menu'
    )
);