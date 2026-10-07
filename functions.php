


<?php

function carbon()
{
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css?family=Red+Hat+Display&display=swap');
    wp_enqueue_style('fonttwo', 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap');
    wp_enqueue_style('carbon_main_styles', get_theme_file_uri('/css/main.css'), array(), filemtime(get_stylesheet_directory() . '/css/main.css'));
}

add_action('wp_enqueue_scripts', 'carbon');
