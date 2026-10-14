


<?php 

function carbon(){
wp_enqueue_style('carbon_main_styles', get_stylesheet_uri());

}


add_action('wp_enqueue_scripts', 'carbon');