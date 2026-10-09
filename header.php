<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <header style="border-bottom: 2px solid white;">
        <a href="<?php echo site_url() ?>" class="headerlogo">
            <h1>Houston's Carbon Footprint</h1>
            <img src="images/Mask group (5).svg" salt="white foot steps" class="footerprintsvg noshowwhitelogo">
            <img src="images/carbon-footprint.png" salt="white foot steps" class="footerprintsvg noshowblacklogo">
        </a>
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </label>
        <nav class="navbar">
            <ul>
                <li><a href="<?php echo site_url('/the-problem'); ?>" class="active">The Problem</a></li>
                <li><a href="<?php echo site_url('/houston'); ?>" class="active">Houston</a></li>
                <li><a href="<?php echo site_url('/solutions'); ?>" class="active">Solutions</a></li>
                <li><a href="<?php echo site_url('/explore'); ?>" class="active">Explore</a></li>

            </ul>
        </nav>
    </header>