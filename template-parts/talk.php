<section class="talk">
    <?php

    if (isset($args['single-talk'])) {
        $single_talk = $args['single-talk'];
    ?>


        <h2><?php the_title(); ?></h2>
        <?php if (!empty($single_talk)) { ?>
            <div>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnailq'); ?>" alt="">
                <?php echo wp_trim_words(render_block($single_talk[0]['section']['content']), 10); ?>
            </div>
        <?php } ?>

    <?php
    }

    ?>


</section>