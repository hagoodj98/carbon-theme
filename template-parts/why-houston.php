<section class="why-houston">
    <h2>Why Houston?</h2>
    <div class="three-sections">
        <?php
        $homepagePosts = new WP_Query(array(

            'post_type' => 'page',
            'post__in' => array(200, 194, 202),
        ));

        while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(); ?>

            <div class="card why-card">
                <a href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                    <?php the_post_thumbnail('medium'); ?>
                </a>
            </div>


        <?php }
        wp_reset_postdata();

        ?>
    </div>
    <p class="section-note">Learn why Houston has unique challenges when it comes to carbon emissions.</p>
</section>


<!-- Pages

* About Carbon
* Houston
* Climate Action Plan
* Sources

Posts / Custom Post Types

* Articles
* Scientist Interviews
* Conversations
* Case Studies-->