<?php


 
function enable_page_excerpts() {
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'enable_page_excerpts');

// Custom excerpt length for search results and pages
function custom_search_and_page_excerpt_length($length) {
    $new_length = CT_SETTINGS['CT_excerpt_length'];
    if (is_search()) {
        return $new_length; // Longer excerpt for search results
    } elseif (is_page()) {
        return $new_length; // Medium excerpt length for pages
    }
    return $new_length; // Default excerpt length for posts
}
add_filter('excerpt_length', 'custom_search_and_page_excerpt_length');

// Customize the excerpt "read more" text
function custom_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '">Read More</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');
