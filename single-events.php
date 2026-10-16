<?php
get_header();

while (have_posts()) {
    the_post();
    get_template_part('template-parts/cpt-single', null, [
        'label' => 'Event',
        'back_url' => get_permalink(get_page_by_path('explore/the-aftermath')) ?: home_url('/'),
        'back_text' => 'The Aftermath',
    ]);
}

get_footer();
