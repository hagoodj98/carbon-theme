<?php get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>
<?php get_template_part('template-parts/statistics'); ?>
<?php get_template_part('template-parts/problem'); ?>
<?php get_template_part('template-parts/why-houston'); ?>
<?php get_template_part('template-parts/solutions'); ?>
<section class="explore">
    <h2>Explore More</h2>
    <div class="exploreOptions">
        <a href="<?php echo site_url('/world'); ?>" class="explore-tile">Earth</a>
        <a href="<?php echo site_url('/houston'); ?>" class="explore-tile">Houston</a>
        <a href="<?php echo site_url('/conversations'); ?>" class="explore-tile">Conversations</a>
        <a href="<?php echo site_url('/scientists'); ?>" class="explore-tile">Scientists</a>
    </div>
</section>

<section class="additional-info">
    <h2>READY TO REDUCE YOUR IMPACT?</h2>
    <p>Placeholder: one short sentence encouraging visitors to take their first step.</p>
    <a href="<?php echo site_url('/donation') ?>"> <button class="cta-button">Take Action</button></a>
</section>




<?php get_footer(); ?>