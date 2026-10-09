<section class="page-top-section">


    <h2><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>

    <div style="display: flex; justify-content: space-around; gap: 1rem;" class="stat-cards">
        <?php

        $childPages = new WP_Query(array(
            'post_type' => 'page',
            'post_parent' => get_the_ID()
        ));
        while ($childPages->have_posts()) {
            $childPages->the_post(); ?>
            <div style="padding:10px" class="card">
                <h3><?php the_title(); ?></h3>

                <p class="stat-number"><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                <a href="<?php the_permalink(); ?>"><button>Read More</button></a>
            </div>
        <?php }
        wp_reset_postdata(); ?>



    </div>
</section>