<?php
/*
Plugin Name: GitHub Pages Sync
Description: Load multiple HTML pages from GitHub-synced plugin folder.
Version: 1.0
*/

function github_pages_sync_shortcode($atts) {
    $atts = shortcode_atts(array(
        'name' => ''
    ), $atts);

    if ($atts['name'] == '') {
        return "Error: No page name provided.";
    }

    $file = plugin_dir_path(__FILE__) . "pages/" . $atts['name'] . ".html";

    if (!file_exists($file)) {
        return "Error: Page not found → " . $atts['name'] . ".html";
    }

    return file_get_contents($file);
}

add_shortcode('html_page', 'github_pages_sync_shortcode');
