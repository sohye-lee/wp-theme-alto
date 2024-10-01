<?php 

function plumo_load_scripts() {
    wp_enqueue_style( 'plumo-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css'), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap', array(), null );
}

add_action( 'wp_enqueue_scripts', 'plumo_load_scripts' ); 