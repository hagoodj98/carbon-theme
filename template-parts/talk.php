<?php

$image = get_the_post_thumbnail_url(get_the_ID(), 'large');
$style = $image ? '--card-bg: url(' . esc_url($image) . ');' : '';

?>
<article class="post-card talk" style="<?php echo esc_attr($style); ?>">
    <?php if (isset($args['single-talk'])) { ?>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php if (!empty($args['single-talk'])) { ?>
            <div class="post-card__text">
                <?php echo wp_trim_words(render_block($args['single-talk'][0]['section']['content']), 10); ?>
            </div>
        <?php } ?>
    <?php } ?>
</article>