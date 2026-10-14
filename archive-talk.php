<?php get_header();

while(have_posts()){
    the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="text-over-image" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>');">
        <div class="text-over-image__content">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
        </div>
    </a>
<?php }

get_footer();
