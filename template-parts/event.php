<?php

$image = get_the_post_thumbnail_url(get_the_ID(), 'large');
$style = $image ? '--card-bg: url(' . esc_url($image) . ');' : '';

?>
<article class="post-card event" style="<?php echo esc_attr($style); ?>">
    <?php if (isset($args['single-event'])) { ?>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php if (!empty($args['single-event'])) { ?>
            <div class="post-card__text">
                <?php echo render_block($args['single-event'][0]['section']['content']); ?>
            </div>
        <?php } ?>
    <?php } ?>
</article>