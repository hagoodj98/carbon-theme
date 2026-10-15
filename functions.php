<?php


function carbon_files()
{
    wp_enqueue_script('chartjs', 'https://cdn.jsdelivr.net/npm/chart.js@4.5.0', array(), null, true);
    wp_enqueue_script('carbon_main_script', get_theme_file_uri('/src/index.js'), array(), filemtime(get_stylesheet_directory() . '/src/index.js'), true);
    wp_localize_script('carbon_main_script', 'carbonEnv', array(
        'baseUrlServer' => defined('BASE_URL_SERVER') ? BASE_URL_SERVER : '',
    ));

    wp_enqueue_style('font', 'https://fonts.googleapis.com/css?family=Red+Hat+Display&display=swap');
    wp_enqueue_style('fonttwo', 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap');
    wp_enqueue_style('carbon_main_styles', get_theme_file_uri('/css/main.css'), array(), filemtime(get_stylesheet_directory() . '/css/main.css'));
}

add_action('wp_enqueue_scripts', 'carbon_files');


function carbon_features()
{
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'carbon_features');
function createCard(string $title, string $content, int $stat)
{
    echo '<div class="card">';
    echo '<h3>' . $title . '</h3>';
    if ($content) echo '<p class="stat-number">' . $content . '</p>';
    if ($stat) echo '<p class="stat-number">' . $stat . '</p>';
    echo '</div>';
}






function get_template_order(int $post_id)
{
    $raw_content = get_post_field('post_content', $post_id);
    $blocks = parse_blocks($raw_content);
    $templates = [
        'intro-section' => 'template-parts/intro-section',
        'card-section' => 'template-parts/card-section',
        'text-image' => 'template-parts/text-image',
        'related-sources' => 'template-parts/related-sources',
        'connection-section' => 'template-parts/connection-section',
        'video-section' => 'template-parts/video-section',
    ];
    $templateOrder = [];
    foreach ($blocks as $block) {

        $className = $block['attrs']['className'] ?? '';

        if (isset($templates[$className])) {
            $templateOrder[] = array(
                'section' => [
                    'template' => $templates[$className],
                    'content' => $block
                ],
            );
        }
    }

    return $templateOrder;
}
function get_template_event_post_type(int $post_id, $meta_only = false)
{
    $raw_content = get_post_field('post_content', $post_id);
    $blocks = parse_blocks($raw_content);
    $templates = [
        'event-metadata-section' => 'template-parts/event-metadata-section',
        'event-what-happened-section' => 'template-parts/event-what-happened-section',
        'event-impacts-section' => 'template-parts/event-impacts-section',
        'event-take-away-section' => 'template-parts/event-take-away-section',
        'event-source-section' => 'template-parts/event-source-section'
    ];
    $templateOrder = [];
    foreach ($blocks as $block) {

        $className = $block['attrs']['className'] ?? '';
        if ($meta_only && isset($templates[$className]) && $className === 'event-metadata-section') {
            $templateOrder[] = array(
                'section' => [
                    'template' => $templates[$className],
                    'content' => $block
                ],
            );
        } else if (!$meta_only && isset($templates[$className])) {
            $templateOrder[] = array(
                'section' => [
                    'template' => $templates[$className],
                    'content' => $block
                ],
            );
        }
    }

    return $templateOrder;
}

function get_template_talk_post_type(int $post_id, $meta_only = false)
{
    $raw_content = get_post_field('post_content', $post_id);
    $blocks = parse_blocks($raw_content);
    $templates = [
        'talk-metadata-section' => 'template-parts/talk-intro-section',
        'talks-excerpt-section' => 'template-parts/talk-excerpt-section',
        'talks-learn-section' => 'template-parts/talk-learn-section',
        'talks-video-section' => 'template-parts/talk-video-section'
    ];
    $templateOrder = [];
    foreach ($blocks as $block) {

        $className = $block['attrs']['className'] ?? '';
        if ($meta_only && isset($templates[$className]) && $className === 'talks-excerpt-section') {
            $templateOrder[] = array(
                'section' => [
                    'template' => $templates[$className],
                    'content' => $block
                ],
            );
        } else if (!$meta_only && isset($templates[$className])) {
            $templateOrder[] = array(
                'section' => [
                    'template' => $templates[$className],
                    'content' => $block
                ],
            );
        }
    }

    return $templateOrder;
}
