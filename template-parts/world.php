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
                $countryText = [
                    '
                    <div class="countrytextblock">
                        <h2>North America</h2>
                        <p style="font-size: 20px;">
                        In the first quarter of 2019, EIA estimates that U.S. energy-related emissions totaled 1,367 million metric tons (MMmt), which is nearly equal to those in the first quarter of 2018.
                        </p>
                    </div>
                        ',
                    '
                    <div class="countrytextblock">
                        <h2>China</h2>
                        <p style="font-size: 20px;"> 
                        Close to 10,000 million metric tons of CO2 from burning fossil fuel were emitted by the superpower in 2017. On a per capita basis, China\'s CO2 emissions of 7.1 metric tons per person trail that of most countries on this list but still rank in the top 50 worldwide.
                        </p>
                    </div>
                    ',
                    '<div class="countrytextblock">
                        <h2>Latin America</h2>
                        <p style="font-size: 20px;">
                        Nearly half of all greenhouse gas emissions in Latin America and the Caribbean (LAC) are the result of land-use change, forestry, or agriculture. Between 2001 and 2012, the region lost 36 million hectares of forest and grassland to agricultural expansion. 
                        </p>
                    </div>',
                    '
                    <div class="countrytextblock">
                       <h2>Africa</h2>
                        <p style="font-size: 20px;">
                        Emissions rose 1.2 percent to 1.408 billion metric tonnes of carbon dioxide (CO2) equivalent from a year earlier, according to the  revised data published by the Ministry of Environment.
                        </p>
                        </div>
                    ',
                ];
                for ($i = 0; $i < 4; $i++) { ?>
                    <div class="footprint" id="footprint<?php echo $i ?>">
                        <?php echo $countryText[$i]; ?>
                        <img class="footprintimage" src="<?php echo $image_url; ?>" alt="foot Image">
                    </div>
        <?php }
            }
        }
        wp_reset_postdata();
        ?>

    </div>
    <div class="textblock">

    </div>





</section>