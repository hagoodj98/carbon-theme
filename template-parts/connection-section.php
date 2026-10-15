<?php
if (is_page('reducing-your-carbon-footprint')) {

    echo do_shortcode('[carbon_calculator]');
}
?>


<section class="connection-section">
    <?php
    if (isset($args['childPage']) === true) {
        echo render_block($args['childPage']['content']);
    }

    ?>
</section>