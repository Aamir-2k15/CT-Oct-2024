<?php
// Conditionally remove unnecessary meta tags
function remove_unnecessary() {
    // Example condition: Only remove on the homepage
    if (is_home() || is_front_page()) {
        remove_action('wp_head', 'wp_generator'); // Remove WordPress version
        remove_action('wp_head', 'wlwmanifest_link'); // Remove Windows Live Writer manifest link
        remove_action('wp_head', 'rsd_link'); // Remove Really Simple Discovery link
        remove_action('wp_head', 'wp_shortlink_wp_head', 20, 0); // Remove shortlink

        // Remove adjacent posts links (next and previous)
        remove_action('wp_head', 'start_post_rel_link');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'adjacent_posts_rel_link');

        // Remove specific inline CSS (replace with actual function)
        remove_action('wp_head', 'bs_shortcodes-css');
        remove_action('wp_head', 'bs_bootstrap-css');

        // Remove adjacent posts links added by Yoast SEO
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 20, 0);

        // Remove start post link added by Yoast SEO
        remove_action('wp_head', 'start_post_rel_link', 20, 0);

        // Remove feed links (rss, rss2, atom)
        remove_action('wp_head', 'feed_links', 20);

        // Remove additional feed links (comments-rss2, etc.)
        remove_action('wp_head', 'feed_links_extra', 20);

        // Remove parent post link (WordPress adds this for hierarchical post types)
        remove_action('wp_head', 'parent_post_rel_link', 20, 0);
    }
}
add_action('init', 'remove_unnecessary');

// Conditionally remove inline CSS
function remove_inline_css() {
    // Example condition: Only remove on single posts
    if (is_single()) {
        // Check if the style was enqueued using wp_enqueue_style
        wp_dequeue_style('theme-inline-css-handle');
        wp_deregister_style('theme-inline-css-handle');
    }
}
add_action('wp_head', 'remove_inline_css', 20);

// Conditionally remove inline JS
function remove_inline_js() {
    // Example condition: Only remove on specific pages
    if (is_page('contact')) { // Replace 'contact' with the specific page slug
        // Check if the script was enqueued using wp_enqueue_script
        wp_dequeue_script('theme-inline-js-handle');
        wp_deregister_script('theme-inline-js-handle');
    }
}
add_action('wp_footer', 'remove_inline_js', 21);

remove_filter('the_excerpt', 'wpautop');