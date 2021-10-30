<?php

require get_template_directory() . '/inc/reservation-database.php';
require get_template_directory() . '/inc/options.php';
require get_template_directory() . '/inc/users-database.php';
require get_template_directory() . '/inc/db_reservation.php';
require get_template_directory() . '/inc/db_users.php';

// Add Setup
function epicure_setup() {
    add_theme_support('post-thumbnails');
    add_image_size('restaurant_card',  342, 213, true);
    add_image_size('restaurant_card_mobile',  162, 122, true);
    add_image_size('restaurant',  1102, 396, true);
    add_image_size('dish-card',  236, 150, true);
    add_image_size('chef-card',  342, 339, true);
    add_image_size('icon-meaning',  39, 30, true);

    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'epicure_setup');

// Add Menus
function epicure_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'epicure'),
        'user-menu' => __('User Menu', 'epicure'),
        'mobile-menu' => __('Mobile Menu', 'epicure'),
        'mobile-menu-user-options' => __('Mobile Menu user options', 'epicure')
    ));
}
add_action('init', 'epicure_menus');

// Add Scripts
function epicure_scripts() {
    //Register Styles
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0');
    wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0');
    wp_register_style('reservation-form', get_template_directory_uri() . '/css/reservation-form/form.css', array(), '1.0.0');
    wp_register_style('user-menu', get_template_directory_uri() . '/css/user-menu/user-menu.css', array(), '1.0.0');
    wp_register_style('chefs-page', get_template_directory_uri() . '/css/chefs-page.css', array(), '1.0.0');
    wp_register_style('mobile-menu', get_template_directory_uri() . '/css/mobile-menu.css', array(), '1.0.0');
    wp_register_style('cart', get_template_directory_uri() . '/css/cart/cart.css', array(), '1.0.0');
    wp_register_style('about-us', get_template_directory_uri() . '/css/front-page/about-us.css', array(), '1.0.0');
    wp_register_style('chef-section', get_template_directory_uri() . '/css/front-page/chef-section.css', array(), '1.0.0');
    wp_register_style('icons-section', get_template_directory_uri() . '/css/front-page/icons-section.css', array(), '1.0.0');
    wp_register_style('signature-section', get_template_directory_uri() . '/css/front-page/signature-section.css', array(), '1.0.0');
    wp_register_style('popular-section', get_template_directory_uri() . '/css/front-page/popular-section.css', array(), '1.0.0');
    wp_register_style('hero-section', get_template_directory_uri() . '/css/front-page/hero-section.css', array(), '1.0.0');
    wp_register_style('filter-controllers', get_template_directory_uri() . '/css/restaurants-page/controllers.css', array(), '1.0.0');
    wp_register_style('main-container', get_template_directory_uri() . '/css/restaurants-page/main-container.css', array(), '1.0.0');
    wp_register_style('restaurant-card', get_template_directory_uri() . '/css/restaurants-page/restaurant-card.css', array(), '1.0.0');
    wp_register_style('single-header', get_template_directory_uri() . '/css/single-restaurant/header.css', array(), '1.0.0');
    wp_register_style('single-controllers', get_template_directory_uri() . '/css/single-restaurant/controllers.css', array(), '1.0.0');
    wp_register_style('dish-card', get_template_directory_uri() . '/css/single-restaurant/dish-card.css', array(), '1.0.0');
    wp_register_style('single-header', get_template_directory_uri() . '/css/single-restaurant/header.css', array(), '1.0.0');
    wp_register_style('footer', get_template_directory_uri() . '/css/footer.css', array(), '1.0.0');
    wp_register_style('main-header', get_template_directory_uri() . '/css/header/main-header.css', array(), '1.0.0');
    wp_register_style('left-header', get_template_directory_uri() . '/css/header/left-header.css', array(), '1.0.0');
    wp_register_style('right-header', get_template_directory_uri() . '/css/header/right-header.css', array(), '1.0.0');
    wp_register_style('single-chef-header', get_template_directory_uri() . '/css/single-chef/single-chef-header.css', array(), '1.0.0');


    //Enqueue Styles
    wp_enqueue_style('sweetalert', get_template_directory_uri() . '/css/sweetalert2.min.css', array(), '11.1.7');
    wp_enqueue_style('style');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('reservation-form');
    wp_enqueue_style('user-menu');
    wp_enqueue_style('chefs-page');
    wp_enqueue_style('mobile-menu');
    wp_enqueue_style('cart');
    wp_enqueue_style('about-us');
    wp_enqueue_style('chef-section');
    wp_enqueue_style('icons-section');
    wp_enqueue_style('signature-section');
    wp_enqueue_style('popular-section');
    wp_enqueue_style('hero-section');
    wp_enqueue_style('filter-controllers');
    wp_enqueue_style('main-container');
    wp_enqueue_style('restaurant-card');
    wp_enqueue_style('single-header');
    wp_enqueue_style('single-controllers');
    wp_enqueue_style('dish-card');
    wp_enqueue_style('single-header');
    wp_enqueue_style('footer');
    wp_enqueue_style('main-header');
    wp_enqueue_style('left-header');
    wp_enqueue_style('right-header');
    wp_enqueue_style('single-chef-header');


    //Register Scripts
    wp_register_script('script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
    wp_register_script('ajax-script', get_template_directory_uri() . '/js/ajax.js', array('jquery'), '1.0', true);
    wp_register_script('quantity', get_template_directory_uri() . '/js/quantity.js', array('jquery'), '1.0.0', true);
    wp_register_script('filters', get_template_directory_uri() . '/js/filters.js', array('jquery'), '1.0.0', true);
    wp_register_script('popup', get_template_directory_uri() . '/js/popup.js', array('jquery'), '1.0.0', true);
    wp_register_script('jquery', "https://code.jquery.com/jquery-3.2.1.slim.min.js", array(), '3.2.1', true );
    wp_register_script('popper', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", array('jquery'), '1.12.9', true );
    wp_register_script('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", array('jquery'), '4.0.0', true );

    //Enqueue Scripts
    wp_enqueue_script('sweetalertjs', get_template_directory_uri() . '/js/sweetalert2.min.js', array('jquery'), '11.1.7', true);
    wp_enqueue_script('reservationDB', get_template_directory_uri() . '/js/reservation-DB.js', array('jquery'), '1.0', true);
    wp_enqueue_script('userDB', get_template_directory_uri() . '/js/user-DB.js', array('jquery'), '1.0', true);
    wp_enqueue_script('script');
    wp_enqueue_script('ajax-script');
    wp_enqueue_script('quantity');
    wp_enqueue_script('filters');
    wp_enqueue_script('popup');
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');

    wp_localize_script(
        'reservationDB',
        'my_ajax_object',
        array('ajax_url' => admin_url('admin-ajax.php'))
    );
    wp_localize_script(
        'userDB',
        'my_ajax',
        array('ajaxurl' => admin_url('admin-ajax.php'))
    );

    wp_localize_script(
        'ajax_script',
        'ajax_url',
        array('ajaxurl' => admin_url('admin-ajax.php'))
    );

}
add_action('wp_enqueue_scripts', 'epicure_scripts');

function epicure_admin_scripts() {
    // Sweet Alert 2
    wp_enqueue_style('sweetalert', get_template_directory_uri() . '/css/sweetalert2.min.css', array(), '11.1.7');
    wp_enqueue_script('sweetalertjs', get_template_directory_uri() . '/js/sweetalert2.min.js', array('jquery'), '11.1.7', true);

    wp_enqueue_script('adminjs', get_template_directory_uri() . '/js/admin_ajax.js', array('jquery'), '1.0', true);

    wp_localize_script(
        'adminjs',
        'admin_ajax',
        array('ajaxurl' => admin_url('admin-ajax.php'))
    );
}
add_action('admin_enqueue_scripts', 'epicure_admin_scripts');

// Creates a Widget Zone
function epicure_widgets() {
    register_sidebar( array(
        'name' =>  'header',
        'id' => 'header',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'epicure_widgets');

//Post Type
function epicure_dishes() {
    $labels = array(
        'name'               => _x( 'Dishes', 'epicure' ),
        'singular_name'      => _x( 'Dish', 'post type singular name', 'epicure' ),
        'menu_name'          => _x( 'Dishes', 'admin menu', 'epicure' ),
        'name_admin_bar'     => _x( 'Dishes', 'add new on admin bar', 'epicure' ),
        'add_new'            => _x( 'Add New', 'book', 'epicure' ),
        'add_new_item'       => __( 'Add New Dish', 'epicure' ),
        'new_item'           => __( 'New Dishes', 'epicure' ),
        'edit_item'          => __( 'Edit Dishes', 'epicure' ),
        'view_item'          => __( 'View Dishes', 'epicure' ),
        'all_items'          => __( 'All Dishes', 'epicure' ),
        'search_items'       => __( 'Search Dishes', 'epicure' ),
        'parent_item_colon'  => __( 'Parent Dishes:', 'epicure' ),
        'not_found'          => __( 'No Dishes found.', 'epicure' ),
        'not_found_in_trash' => __( 'No Dishes found in Trash.', 'epicure' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'epicure' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'dishes' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
    );

    register_post_type( 'dishes', $args );
}
add_action( 'init', 'epicure_dishes' );

function epicure_restaurants() {
    $labels = array(
        'name'               => _x( 'Restaurants', 'epicure' ),
        'singular_name'      => _x( 'Restaurant', 'post type singular name', 'epicure' ),
        'menu_name'          => _x( 'Restaurants', 'admin menu', 'epicure' ),
        'name_admin_bar'     => _x( 'Restaurants', 'add new on admin bar', 'epicure' ),
        'add_new'            => _x( 'Add New', 'book', 'epicure' ),
        'add_new_item'       => __( 'Add New Restaurant', 'epicure' ),
        'new_item'           => __( 'New Restaurants', 'epicure' ),
        'edit_item'          => __( 'Edit Restaurants', 'epicure' ),
        'view_item'          => __( 'View Restaurants', 'epicure' ),
        'all_items'          => __( 'All Restaurants', 'epicure' ),
        'search_items'       => __( 'Search Restaurants', 'epicure' ),
        'parent_item_colon'  => __( 'Parent Restaurants:', 'epicure' ),
        'not_found'          => __( 'No Restaurants found.', 'epicure' ),
        'not_found_in_trash' => __( 'No Restaurants found in Trash.', 'epicure' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'epicure' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'restaurants' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
    );

    register_post_type( 'restaurants', $args );
}
add_action( 'init', 'epicure_restaurants' );

function epicure_chefs() {
    $labels = array(
        'name'               => _x( 'Chefs', 'epicure' ),
        'singular_name'      => _x( 'Chef', 'post type singular name', 'epicure' ),
        'menu_name'          => _x( 'Chefs', 'admin menu', 'epicure' ),
        'name_admin_bar'     => _x( 'Chefs', 'add new on admin bar', 'epicure' ),
        'add_new'            => _x( 'Add New', 'book', 'epicure' ),
        'add_new_item'       => __( 'Add New Chef', 'epicure' ),
        'new_item'           => __( 'New Chefs', 'epicure' ),
        'edit_item'          => __( 'Edit Chefs', 'epicure' ),
        'view_item'          => __( 'View Chefs', 'epicure' ),
        'all_items'          => __( 'All Chefs', 'epicure' ),
        'search_items'       => __( 'Search Chefs', 'epicure' ),
        'parent_item_colon'  => __( 'Parent Chefs:', 'epicure' ),
        'not_found'          => __( 'No Dishes found.', 'epicure' ),
        'not_found_in_trash' => __( 'No Dishes found in Trash.', 'epicure' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'epicure' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'chefs' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
    );

    register_post_type( 'chefs', $args );
}
add_action( 'init', 'epicure_chefs' );


