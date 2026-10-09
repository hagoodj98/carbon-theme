<?php

get_header();

wp_list_pages(array(
    'child_of' => get_the_ID()
));


while (have_posts()) {
    the_post();
    if (is_page('world')) {
        get_template_part('template-parts/world');
    } else if (is_page('donation')) { ?>
        <h1><?php the_title(); ?></h1>

    <?php get_template_part('template-parts/form');
    } else { ?>
        <h1> <?php the_title(); ?></h1>
        <?php get_template_part('template-parts/page-top-section'); ?>
    <?php } ?>


<?php


}
wp_reset_postdata();

get_footer();

?>

<!-- The Problem

* What is Carbon?
* How Does It Affect Earth?
* Causes of High Carbon Rates

Houston

* Houston’s Weather
* Houston’s Carbon Footprint
* Scientists’ Opinions

Solutions

* Reducing Your Carbon Footprint
* Climate Action Plan
* Community Action

Explore

* Interactive
* Conversations
* Gallery
-->