<?php

$image = get_the_post_thumbnail_url();
$style = $image ? '--intro-bg: url(' . esc_url($image) . ');' : '';

?>

<section style="<?php echo esc_attr($style); ?>" class="intro-section">
    <?php

    if (!is_page('take-action')) {
    ?>
        <h2><?php the_title(); ?></h2>
    <?php
    }
    ?>
    <?php
    if (is_page('take-action')) {
        the_content();
    }


    if (isset($args['childPage'])) {
        $content = $args['childPage']['content'];
        echo render_block($content);
    }
    ?>

</section>