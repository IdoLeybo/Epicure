<?php

require get_template_directory() . '/inc/database.php';
require get_template_directory() . '/inc/db_reservation.php';

// Add Setup
function epicure_setup() {
    add_theme_support('post-thumbnails');
    add_image_size('restaurant_card',  342, 213, true);
    add_image_size('restaurant_card_mobile',  162, 122, true);
    add_image_size('restaurant',  1102, 396, true);
    add_image_size('dish-card',  236, 150, true);

    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'epicure_setup');

// Add Menus
function epicure_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'epicure'),
    ));
}
add_action('init', 'epicure_menus');

// Add Scripts
function epicure_scripts() {
    //Register Styles
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0');
    wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0');


    //Enqueue Styles
    wp_enqueue_style('style');
    wp_enqueue_style('fontawesome');


    //Register Scripts
    wp_register_script('script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
    wp_register_script('quantity', get_template_directory_uri() . '/js/quantity.js', array('jquery'), '1.0.0', true);
    wp_register_script('filters', get_template_directory_uri() . '/js/filters.js', array('jquery'), '1.0.0', true);
    wp_register_script('popup', get_template_directory_uri() . '/js/popup.js', array('jquery'), '1.0.0', true);

    //Enqueue Scripts
    wp_enqueue_script('script');
    wp_enqueue_script('quantity');
    wp_enqueue_script('filters');
    wp_enqueue_script('popup');

}
add_action('wp_enqueue_scripts', 'epicure_scripts');

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