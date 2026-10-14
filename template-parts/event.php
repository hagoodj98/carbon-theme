<section class="event">
    <?php

    if (isset($args['single-event'])) {
        $single_event = $args['single-event'];
    ?>


        <h2><?php the_title(); ?></h2>
        <?php if (!empty($single_event)) { ?>
            <div>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnailq'); ?>" alt="">
                <?php echo render_block($single_event[0]['section']['content']); ?>
            </div>
        <?php } ?>

    <?php
    }

    ?>


</section>