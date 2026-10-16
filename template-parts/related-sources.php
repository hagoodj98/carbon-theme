<?php
$currentId = $args['pageId'] ?? get_the_ID();
$parentId = wp_get_post_parent_id($currentId);
if (!$parentId) {
    return;
}

$siblings = new WP_Query(array(
    'post_type' => 'page',
    'post_parent' => $parentId,
    'post__not_in' => array($currentId),
    'posts_per_page' => -1,
    'orderby' => 'menu_order title',
    'order' => 'ASC',
));
?>
<section class="related-sources">
    <h2>Related Sources</h2>
    <ul class="related-sources__list">
        <li><a href="<?php echo esc_url(get_permalink($parentId)); ?>">Back to <?php echo esc_html(get_the_title($parentId)); ?></a></li>
        <?php while ($siblings->have_posts()) {
            $siblings->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php }
        wp_reset_postdata(); ?>
    </ul>
</section>
