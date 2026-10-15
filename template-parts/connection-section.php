<?php
if (is_page('reducing-your-carbon-footprint')) { ?>
    <div id="shortcode-chart">
        <?php echo do_shortcode('[carbon_calculator]'); ?>
    </div>
<?php }
?>


<section class="connection-section">
    <?php
    if (isset($args['childPage']) === true) {
        echo render_block($args['childPage']['content']);
    }

    ?>
</section>