<?php
$isSolutions = isset($args['solutionCards']);
$sectionClass = $isSolutions ? 'three-sections' : 'page-cards ' . (isset($args['childPage']) ? 'page-cards--blocks' : 'page-cards--children');
?>
<section class="<?php echo esc_attr($sectionClass); ?>">
    <?php
    if ($isSolutions) {
        // Attachment title => card copy; cards render in this order regardless of query order
        $solutionCopy = array(
            'individuals' => array('Individuals', 'Simple everyday changes, like driving less, wasting less food, and saving energy at home, add up to a smaller footprint.'),
            'businesspanels' => array('Businesses', 'Companies can cut emissions by improving efficiency, switching to cleaner energy, and rethinking how they ship and make things.'),
            'community-work' => array('Community', 'Neighborhoods and local leaders can work together on shared solar, tree planting, better transit, and cleaner public spaces.'),
        );
        $solutionImages = array();
        foreach (isset($args['solutionCards']->posts) ? $args['solutionCards']->posts : array() as $attachment) {
            $solutionImages[$attachment->post_title] = wp_get_attachment_image_url($attachment->ID, 'large');
        }
        foreach ($solutionCopy as $title => $copy) {
            $image = isset($solutionImages[$title]) ? $solutionImages[$title] : '';
            $style = $image ? ' style="background-image: url(\'' . esc_url($image) . '\');"' : '';
    ?>
            <div class="card solution-card" <?php echo $style; ?>>
                <div class="card-body">
                    <h3><?php echo esc_html($copy[0]); ?></h3>
                    <p><?php echo esc_html($copy[1]); ?></p>
                </div>
            </div>
        <?php }
    }


    if (isset($args['imageCards'])) {
        $imageCards = $args['imageCards'];
        while ($imageCards->have_posts()) {
            $imageCards->the_post();
        ?>
            <div class="card why-card">
                <h3><?php the_title(); ?></h3>
                <?php the_post_thumbnail('medium_large'); ?>
            </div>
        <?php }
        wp_reset_postdata();
    }


    if (isset($args['statCards'])) {
        $statCards = $args['statCards'];
        foreach ($statCards as $key => $value) {
            if ($key === 'energy_industry') {
                $key = 'Energy & Industry';
            } else if ($key === 'energy_usage') {
                $key = 'Energy Usage';
            } else if ($key === 'transportation') {
                $key = 'Transportation';
            }
        ?>

            <div class="card">

                <h3><?php echo $key; ?></h3>
                <p class="stat-number"><?php echo "$value%"; ?></p>

            </div>
        <?php }
    }


    if (isset($args['childPage']) === true) {
        echo render_block($args['childPage']['content']);
    }
    if (isset($args['childPages'])) {

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