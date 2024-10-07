<?php
define('CT_AJAX', admin_url('admin-ajax.php'));
$available_social_media_platforms = [
    'Facebook' => 'facebook',
    'Twitter' => 'twitter',
    'LinkedIn' => 'linkedin',
    // 'Pinterest' => 'pinterest',
    'Reddit' => 'reddit',
    'Tumblr' => 'tumblr',
    'Instagram' => 'instagram',
    // 'Snapchat' => 'snapchat',
    'YouTube' => 'youtube',
    'Vimeo' => 'vimeo',
    // 'Telegram' => 'telegram',
    'WhatsApp' => 'whatsapp',
    'Email' => 'site_email', // Not a social media platform, but often included in sharing options.
    'Phone' => 'phone',
];

define('CT_SOCIAL_MEDIA_PLATFORMS', $available_social_media_platforms);


$available_options_array = [

     'CT_classic' => 'checkbox',
     'CT_last_menuItem_button' => 'checkbox',
     'CT_WooCommerce_Support' => 'checkbox',
     'CT_Shortcodes' => 'checkbox',
     'CT_search_in_menu' => 'checkbox',
     'CT_svg_support' => 'checkbox',
     'CT_Disable_plugin_updates' => 'checkbox',
     'CT_post_views' => 'checkbox',
     'CT_numbered_pagination' => 'checkbox',
     'CT_related_posts' => 'checkbox',
     'CT_remove_unwanted' => 'checkbox',
     'CT_disable_comments' => 'checkbox',
     'CT_excerpt_length' => 'text',
];


$theme_features_array = [
    'site_logo' => 'wp_upload',
    'logo-width' => 'text',
    'logo-height' => 'text',
    'favicon' => 'wp_upload',
    'address' => 'textarea',
    'map' => 'textarea' 
];

$theme_support_array['widgets'] =  [
    'Topbar One' => 'topbar_1',
    'Topbar Two' => 'topbar_2',
    'Topbar Three' => 'topbar_3',
    'Topbar Four' => 'topbar_4',
    'Header' => 'header', 
    'Page Sidebar' => 'page', 
    'Blog Sidebar' => 'blog', 
    'Footer One' => 'footer_1', 
    'Footer Two' => 'footer_2',
    'Footer Three' => 'footer_3',
    'Footer Four' => 'footer_4'
];
$theme_support_array['nav_menu'] =  [
    'Primary Menu' => 'primary_menu', 
    'Secondary Menu' => 'secondary_menu', 
    'Footer Menu' => 'footer_menu'
];

// $theme_support_array['cpts'] = [];

define('CT_AVAILABLE_OPTIONS', $available_options_array);
define('CT_AVAILABLE_FEATURES', $theme_features_array);

$fb = new FormBuilder();
define('FORMBUILDER', $fb);

$CT_settings = get_option('CT_settings');//THE DB ONE
$CT_socialmedia = get_option('CT_socialmedia');

define('CT_SETTINGS', $CT_settings);
define('CT_SOCIALMEDIA', $CT_socialmedia); 


define('CT_THEME_SUPPORT_OPTIONS',$theme_support_array);