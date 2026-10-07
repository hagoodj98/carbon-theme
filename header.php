<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <header>
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
                <li><a href="#" class="active">Home</a>
                    <ul>
                        <li><a href="<?php echo site_url('/carbon'); ?>">Carbon</a></li>
                        <li><a href="<?php echo site_url('/conversations'); ?>">Conversations</a></li>
                        <li><a href="<?php echo site_url('/so-whats-the-plan'); ?>">Climate Action Plan</a></li>
                        <li><a href="<?php echo site_url('/global-effects'); ?>">How it affects Earth?</a></li>
                        <li><a href="<?php echo site_url('/goody'); ?>">Interactive</a></li>
                        <li><a href="<?php echo site_url('/donation'); ?>">Form</a></li>
                    </ul>
                </li>
                <li><a href="#" class="active">Houston City</a>
                    <ul>
                        <li><a href="<?php echo site_url('/houston-people'); ?>">Houston's Weather</a></li>
                        <li><a href="<?php echo site_url('/what-can-you-do'); ?>">Reducing Carbon Footprint</a></li>
                        <li><a href="<?php echo site_url('/the-reason-for-high-rates'); ?>">Causes of High<br>Carbon Rates</a></li>
                        <li><a href="<?php echo site_url('/case-studies'); ?>">Scientists opinions?</a></li>
                    </ul>
                </li>
                <li><a href="#" class="active">Gallery</a>
                    <ul>
                        <li><a href="<?php echo site_url('/meet-the-people'); ?>">Promotions</a></li>
                        <li><a href="<?php echo site_url('/more-evidence'); ?>">Carbon Damages</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>