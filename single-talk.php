<?php get_header();

while(have_posts()){
    the_post(); ?>
    <div class="text-over-image" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>');">
        <div class="text-over-image__content">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div><?php the_content(); ?></div>
<?php }

get_footer();
