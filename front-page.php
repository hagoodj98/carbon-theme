<?php get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

<section class="statistics">
    <div class="section-intro">
        <h2>The Tell the Story</h2>
        <p>Houston is a major center for energy, industry, transportation, and commerce. Those activities help power the region, but they also produce a large share of its greenhouse-gas emissions.</p>

        <p>Knowing where those emissions come from is the first step toward reducing them.</p>

    </div>
    <?php

    $front_page_id = get_the_ID();
    // Fetch the ID of the static front page
    $energy_usage    = get_post_meta($front_page_id, 'energy_usage', true);
    $transportation  = get_post_meta($front_page_id, 'transportation', true);
    $energy_industry = get_post_meta($front_page_id, 'energy_industry', true);
    $carbon_footprint_data = array(
        'energy_usage'    => $energy_usage,
        'transportation'  => $transportation,
        'energy_industry' => $energy_industry,
    ); ?>


    <div class="stat-cards">
        <?php get_template_part('template-parts/card-section', null, array('statCards' => $carbon_footprint_data)); ?>
    </div>
    <div class="section-outro">
        <h2>Why These Numbers Matter</h2>
        <p>Houston's carbon footprint isn't caused by one thing. It comes from many connected systems working together.</p>
        <p>Once we know where emissions come from, individuals, businesses, and communities can focus on the changes that matter most.</p>
    </div>
</section>


<section class="text-image">
    <h2>What is a Carbon Footprint?</h2>
    <div class="problem-content">
        <div>
            <p>A carbon footprint is the total amount of greenhouse gases, including carbon dioxide and methane, that our everyday actions produce.</p>
            <a href="#solution"><button class="cta-button">Learn More</button> </a>
        </div>
        <?php $image = new WP_Query(array(
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'post_status' => 'inherit', // Only get images that are attached to posts
            'posts_per_page' => 1,
            'name' => 'problem'
        ));

        while ($image->have_posts()) {
            $image->the_post();
            $image_url = wp_get_attachment_url(get_the_ID());

        ?>
            <img src="<?php echo $image_url; ?>" alt="Problem Image">
    </div>
<?php
        }
        wp_reset_postdata();
?>
</section>
<section class="why-houston">
    <h2>Why Houston?</h2>
    <?php
    $homepagePosts = new WP_Query(array(

        'post_type' => 'page',
        'post__in' => array(200, 194, 202),
    ));

    ?>
    <?php get_template_part('template-parts/card-section', null, array('imageCards' => $homepagePosts)); ?>
    <p class="section-note">Houston's energy industry, port, and sprawling roads give it unique challenges when it comes to carbon emissions.</p>


</section>
<section class="solutions">
    <h2>WHAT CAN WE DO?</h2>

    <?php
    $solutionCards  = new WP_Query(array(
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'post__in'       => array(368, 370, 367),
        'posts_per_page' => -1,

        'orderby'        => 'post__in',

    ));

    get_template_part('template-parts/card-section', null, array('solutionCards' => $solutionCards));

    ?>
</section>
<section class="explore">
    <h2>Explore More</h2>
    <div class="exploreOptions">
        <a style="text-decoration: none;" href="<?php echo site_url('/world'); ?>" class="explore-tile">Earth</a>
        <a style="text-decoration: none;" href="<?php echo site_url('/houston'); ?>" class="explore-tile">Houston</a>
        <a style="text-decoration: none;" href="<?php echo site_url('/conversations'); ?>" class="explore-tile">Conversations</a>

    </div>
</section>





<?php get_footer(); ?>