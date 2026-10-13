<section class="page-cards <?php echo isset($args['childPage']) ? 'page-cards--blocks' : 'page-cards--children'; ?>">
    <?php

    if (isset($args['childPage']) === true) {
        echo render_block($args['childPage']['content']);
    } else {

        $childPages = isset($args['childPages']) ? $args['childPages'] : null;
        while ($childPages->have_posts()) {
            $childPages->the_post();
    ?>

            <div class="card">

                <h3><?php the_title(); ?></h3>
                <p class="stat-number"><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                <a href="<?php the_permalink(); ?>"><button>Read More</button></a>
            </div>
        <?php }

        ?>
    <?php } ?>
</section>