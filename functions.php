<?php
$textdomain = 'CT';
define('TD', $textdomain);

/***|THEME DEFAULTS|****/
include_once 'theme-support/enqueue.php';
include_once 'theme-support/menu.php';
include 'theme-support/form-builder.php';
/***|Site Name Link|****/
include_once 'theme-support/site_name_link.php'; 
 

 
/***|HELPER FUNCTIONS|****/
include_once 'inc/custom_functions.php';
include_once 'inc/helper_functions.php';

/***|FEATURED IMAGE SUPPORT|****/ 
include_once 'theme-support/featured-image-support.php';


/***|SETTINGS|****/
include_once 'admin/admin.php';
include_once 'theme-support/admin-scripts.php';
include_once 'CONFIG.php';
/***|custom_search_form|****/
include_once 'theme-support/custom_search_form.php';
/***********************
 *  CUSTOM FUNCTIONS
 **********************/
 /***|custom_excerpts|****/
include_once 'features/custom_excerpts.php'; 
function custom_include($key,$file_name){
    if(!empty(CT_SETTINGS[$key]) && CT_SETTINGS[$key] == true){include_once 'features/'.$file_name.'.php'; }
}

/***|SHORTCODES|****/
custom_include('CT_Shortcodes','shortcodes');
/***|Disable Plugin Updates|****/
custom_include('CT_Disable_plugin_updates','disable_plugin_updates');
//CT_WooCommerce_Support
custom_include('CT_WooCommerce_Support','WooCommerce_Support');


 /***|CLASSIC EDITOR|****/
 custom_include('CT_classic','classic');
 /***|svg Support|****/
custom_include('CT_svg_support','svg_support');

/***|DISABLE COMMENTS|****/
custom_include('CT_disable_comments','disable-comments'); 

/***|REMOVE UNWANTED|****/
custom_include('CT_remove_unwanted','remove_unwanted');  

/***|search_form_in_menu|****/
custom_include('CT_search_in_menu','search_form_in_menu');  
/***|post_views|****/
custom_include('CT_post_views','post_views');   
/***|numbered_pagination|****/
custom_include('CT_numbered_pagination','numbered_pagination');  
/***|related_posts|****/ 
custom_include('CT_related_posts','related_posts');  
