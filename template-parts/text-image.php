<section class="text-image">
    <?php
    if (isset($args['childPage']) === true) {
        echo render_block($args['childPage']['content']);
    }
    ?>



</section>