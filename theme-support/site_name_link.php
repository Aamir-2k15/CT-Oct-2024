<?php 


function website_name_with_link() { 
    $site_name = get_bloginfo('name');
    $site_url = home_url();

    return '<a href="' . $site_url. '">' . $site_name . '</a>';
}
add_shortcode('site_name_link', 'website_name_with_link');


function website_name() { 
    $site_name = get_bloginfo('name');

    return $site_name;
}
add_shortcode('site_name', 'website_name');


function website_url(){

    return get_bloginfo('url');
}

add_shortcode('website_url', 'website_url');