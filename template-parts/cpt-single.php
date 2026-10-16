<?php

// Shared single view for events and talks. Args: label, back_url, back_text.
global $wp_embed;

$image = get_the_post_thumbnail_url(get_the_ID(), 'large');
$style = $image ? '--cpt-bg: url(' . esc_url($image) . ');' : '';

$meta = null;
$sections = [];
foreach (parse_blocks(get_post_field('post_content', get_the_ID())) as $block) {
    // Skip blocks without a name (e.g., empty blocks)
    if (empty($block['blockName'])) {
        continue;
    }
    $class = $block['attrs']['className'] ?? '';
    if ($meta === null && preg_match('/(metadata|intro)-section$/', $class)) {
        $meta = $block;
    } else {
        $sections[] = ['class' => $class, 'block' => $block];
    }
}

?>
<article class="cpt-single cpt-single--<?php echo esc_attr(sanitize_html_class(strtolower($args['label'] ?? 'event'))); ?>">
    <div class="cpt-hero" style="<?php echo esc_attr($style); ?>">
        <div class="cpt-hero__inner">
            <a class="cpt-hero__back" href="<?php echo esc_url(isset($args['back_url']) ? $args['back_url'] : ''); ?>">&larr; <?php echo esc_html(isset($args['back_text']) ? $args['back_text'] : ''); ?></a>
            <span class="cpt-hero__label"><?php echo esc_html(isset($args['label']) ? $args['label'] : ''); ?></span>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>

    <?php if ($meta) { ?>
        <div class="cpt-meta"><?php echo render_block($meta); ?></div>
    <?php } ?>

    <div class="cpt-body">
        <?php foreach ($sections as $section) { ?>
            <section class="cpt-section ">
                <?php echo $wp_embed->autoembed(render_block($section['block'])); ?>
            </section>
        <?php } ?>
    </div>
</article>