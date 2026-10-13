<section class="connection-section">
    <?php

    if (isset($args['childPage']) === true) {
        echo render_block($args['childPage']['content']);
    }

    ?>
</section>