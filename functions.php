


<?php 

function carbon(){
wp_enqueue_style('carbon_main_styles', get_stylesheet_uri());

}


add_action('wp_enqueue_scripts', 'carbon');
function carbon_post_types(){
    register_post_type('event', array(
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'events'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'labels' => array('name' => 'Events', 'singular_name' => 'Event'),
        'menu_icon' => 'dashicons-calendar',
    ));
    register_post_type('talk', array(
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'talks'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'labels' => array('name' => 'Talks', 'singular_name' => 'Talk'),
        'menu_icon' => 'dashicons-megaphone',
    ));
}

add_action('init', 'carbon_post_types');

function carbon_theme_setup(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'carbon_theme_setup');
