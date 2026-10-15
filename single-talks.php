<?php
get_header();

while (have_posts()) {
    the_post();
    get_template_part('template-parts/cpt-single', null, [
        'label' => 'Talk',
        'back_url' => get_permalink(get_page_by_path('explore/conversations')) ?: home_url('/'),
        'back_text' => 'Conversations',
    ]);
}

get_footer();
