<?php

get_header();

while (have_posts()) {
    the_post();
    if (is_page('world')) {
        get_template_part('template-parts/world');
    } else if (is_page('take-action')) { ?>


    <?php
        get_template_part('template-parts/intro-section');
        get_template_part('template-parts/form');
    } else { ?>

        <?php
        $isChildPage = wp_get_post_parent_id(get_the_ID());

        if ($isChildPage) {
            $postID = get_the_ID();
        ?>

            <?php
            $templateOrderOutput = get_template_order($postID);
            for ($i = 0; $i < count($templateOrderOutput); $i++) {
                get_template_part($templateOrderOutput[$i]['section']['template'], null, ['childPage' => [
                    'content' => $templateOrderOutput[$i]['section']['content'],

                ]]);
            }
            if (is_page('the-aftermath')) {
                $getPastEvents = new WP_Query(array(
                    'post_type' => 'events',
                    'posts_per_page' => 3,

                ));
            ?>
                <h2>Past Events</h2>
                <section class="post-cards">

                    <?php
                    while ($getPastEvents->have_posts()) {
                        $getPastEvents->the_post();
                        $template_order = get_template_event_post_type(get_the_ID(), true);

                        get_template_part('template-parts/event', null, ['single-event' => $template_order]);
                    }
                    ?>
                </section>
            <?php
                wp_reset_postdata();
            }
            if (is_page('conversations')) {
                $getTalks = new WP_Query(array(
                    'post_type' => 'talks',
                    'posts_per_page' => 3,
                )); ?>
                <h2>Recent Discussions</h2>
                <section class="post-cards">
                    <?php
                    while ($getTalks->have_posts()) {
                        $getTalks->the_post();
                        $template_order = get_template_talk_post_type(get_the_ID(), true);

                        get_template_part('template-parts/talk', null, ['single-talk' => $template_order]);
                    }
                    ?></section><?php
                                wp_reset_postdata();
                            }
                        } else {


                            $childPages = new WP_Query(array(
                                'post_type' => 'page',
                                'post_parent' => get_the_ID(),
                            ));

                            get_template_part('template-parts/parent-page-intro');
                            if ($childPages->have_posts()) {
                                get_template_part('template-parts/card-section', null, ['childPages' => $childPages]);
                            }
                            wp_reset_postdata();
                        } ?>


    <?php } ?>


<?php

}
wp_reset_postdata();
get_footer();

?>