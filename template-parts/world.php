<section class="world-section">
    <div id="goodycaution">
        <h1>You'll need to have at least 1023px of screen width.</h1>

    </div>

    <div style="position: relative;">
        <?php
        $image_query = new WP_Query(array(
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'post_status' => 'inherit', // Only get images that are attached to posts
            'posts_per_page' => -1,
            'post__in' => array(134, 169)
        ));
        while ($image_query->have_posts()) {
            $image_query->the_post();
            $image_url = wp_get_attachment_url(get_the_ID());
            if (get_the_ID() === 134) { ?>
                <div>
                    <img src="<?php echo $image_url; ?>" alt="World Image">
                </div>
                <?php } else {

                for ($i = 0; $i < 4; $i++) {
                ?>
                    <div class="footprint" id="footprint<?php echo $i ?>">
                        <img class="footprintimage" src="<?php echo $image_url; ?>" alt="foot Image">
                    </div>
        <?php }
            }
        }
        wp_reset_postdata();
        ?>

    </div>
    <div id="textblock">

    </div>





</section>