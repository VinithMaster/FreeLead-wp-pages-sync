<?php
/*
Plugin Name: GitHub Pages Sync
Description: Load multiple HTML pages from GitHub-synced plugin folder.
Version: 1.0
*/

// Shortcode format: [html_page name="home"]
add_shortcode('html_page', function($atts) {
    $name = $atts['name'] ?? 'home';
    $file = plugin_dir_path(__FILE__) . "pages/$name.html";

    if (!file_exists($file)) {
        return "Page not found: $name";
    }

    return file_get_contents($file);
});
