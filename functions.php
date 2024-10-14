<?php 


// Scripts 
function alto_load_scripts() {
    wp_enqueue_style( 'alto-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css'), 'all' );
    wp_enqueue_style( 'alto-style-scss', get_site_url() . '/wp-content/themes/alto/assets/css/theme.css', array(), filemtime( get_template_directory() . '/assets/css/theme.css'), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', array(), null );
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/src/js/dropdown.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'alto_load_scripts' ); 


// Custom Post Types 
function alto_create_services () {
    $services_args = array( 
        'labels' => array(
            'name' => __( 'Services' ),
            'singular_name' => __( 'Service' ),
            'add_new_item' => __('Add New Service'),
            'add_new' => __('Add New Service'),
            'edit_item' => __('Edit Service'),
            'view_item' => __('View Service'), 
        ),
        'hierarchical'          => true,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'has_archive'           => true,
        'menu_position'         => null,
        'menu_icon'             => 'dashicons-book',
        'supports'              => array( 'thumbnail',  'excerpt', 'title', 'editor', 'post-formats' ), 
        'rewrite'               => array('slug' => 'services', 'with_front' => false),
        'rest_base' => 'services',
        'capability_type' => 'post'
    );
    register_post_type('service', $services_args);

    register_taxonomy( 'categories', array('service'), array(
            'hierarchical' => true, 
            'label' => 'Categories', 
            'singular_label' => 'Category', 
        ) 
    );

    register_taxonomy_for_object_type( 'categories', 'service' );
}

add_action( 'init', 'alto_create_services' );

// Add Services Archive Page Setting to Reading: https://www.wpexplorer.com/wordpress-theme-options/
function alto_setting_callback_function($args){
    // get saved project page ID
    $services_page_id = get_option('services_archive_page');

    // get all pages
    $args = array(
        'posts_per_page'   => -1,
        'orderby'          => 'name',
        'order'            => 'ASC',
        'post_type'        => 'page',
    );
    $items = get_posts( $args );

    echo '<select id="services_archive_page" name="services_archive_page">';
    // empty option as default
    echo '<option value="0">'.__('— Select —', 'wordpress').'</option>';

    // foreach page we create an option element, with the post-ID as value
    foreach($items as $item) {

        // add selected to the option if value is the same as $project_page_id
        $selected = ($services_page_id == $item->ID) ? 'selected="selected"' : '';

        echo '<option value="'.$item->ID.'" '.$selected.'>'.$item->post_title.'</option>';
    }

    echo '</select>';
}

function alto_admin_init(){

    // register our setting
    $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
    );
    register_setting( 
        'reading', // option group "reading", default WP group
        'services_archive_page', // option name
        $args 
    );

    // add our new setting
    add_settings_field(
        'services_archive_page', // ID
        __( 'Services Archive Page', 'alto' ), // Title
        'alto_setting_callback_function', // Callback
        'reading', // page
        'default', // section
        array( 'label_for' => 'services_archive_page' )
    );
}
add_action('admin_init', 'alto_admin_init');

// Configurations
function alto_config () {
    register_nav_menus( 
        array(
            'alto_main_menu' => 'Main Menu',
            'alto_footer_menu' => 'Footer Menu', 
            'alto_mobile_menu' => 'Mobile Menu',
        )
    );

    $args = array(
        'height' => 350,
        'width' => 2400,
    );

    add_theme_support( 'custom-header', $args);
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', 
        array(
            'width' => 120, 
            'height' => 40,
            'flex-height'=> true,
            'flex-width' => true,
        )
    );
}
add_action( 'after_setup_theme', 'alto_config', 0 );


function alto_register_sidebars() {
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'sidebar-blog',
            'description' => 'This is a sidebar for individual blog page. You can add your widgets here. This is the default sidebar.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'sidebar-page',
            'description' => 'This is a sidebar for individual page. You can add your widgets here.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Footer Left',
            'id' => 'footer-left',
            'description' => 'This is the left section of the footer. You can add your widgets here.',
            'before_widget' => '<div class="widget-wrapper footer-widget left">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Footer Center',
            'id' => 'footer-center',
            'description' => 'This is the center section of the footer. You can add your widgets here.',
            'before_widget' => '<div class="widget-wrapper footer-widget center">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Footer Right',
            'id' => 'footer-right',
            'description' => 'This is the right section of the footer. You can add your widgets here.',
            'before_widget' => '<div class="widget-wrapper footer-widget right">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action( 'widgets_init', 'alto_register_sidebars' );


// Add Site Options to Admin
// 1. Add page to admin menu
function alto_register_options_page() {
    add_menu_page(
        'Site Options', 
        'Site Options', 
        'manage_options',
        'site_options',
        'site_options_page_html',
        0
    );
}
add_action( 'admin_menu', 'alto_register_options_page' );

// 2. Add manage_options and form
function site_options_page_html() {
    if (! current_user_can( 'manage_options' ) ) {
        return;
    }
    if ( isset( $_GET['settings-updated'])) {
        add_settings_error(
            'site_options_messages', 
            'site_options_message', 
            esc_html__( 'Settings Saved', 'alto' ),
            'updated'
        );
    }
    settings_errors( 'site_options_messages' );

    ?>
<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">
        <?php 
            settings_fields( 'site_options' );
            do_settings_sections( 'site_options' );
            submit_button( "Save Settings" );
        ?>
    </form>
</div>
<?php   
}

// 3. Add each fields
function alto_register_settings() {
    register_setting( 'site_options', 'site_options' );
    
    add_settings_section(
        'site_options_section',
        false,
        false,
        'site_options'
    );
    
    $social_media = array('instagram', 'facebook', 'linkedIn', 'x', 'youtube', 'behance', 'tiktok', 'pinterest' );
    foreach($social_media as $sm) {
        add_settings_field(
            'site_options_' . $sm,
            esc_html__( ucfirst($sm) . ' Link', 'alto' ),
            'render_site_options_sm',
            'site_options',
            'site_options_section',
            [
                'label_for' => 'site_options_' . $sm,
            ]
        );
    }

}
add_action( 'admin_init', 'alto_register_settings' );


function render_site_options_sm ( $args ) {
    $value = get_option( 'site_options' ) [$args['label_for']] ?? '';
    ?>
<input type="text" id="<?php echo esc_attr( $args[ 'label_for' ]); ?>"
    name="site_options[<?php echo esc_attr( $args['label_for'] ); ?>]" value="<?php echo esc_attr( $value ); ?>">
<?php
}

 