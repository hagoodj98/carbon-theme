<section class="video-section">
    <?php

    if (isset($args['childPage']) === true) {
        global $wp_embed;
        echo $wp_embed->autoembed(render_block($args['childPage']['content']));
    }

    ?>
</section>