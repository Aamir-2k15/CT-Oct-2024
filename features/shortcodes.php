<?php
include_once('shortcodes/social_media.php');//[sm help='1'] [sm_links]
 

include_once('shortcodes/div_close.php');
include_once('shortcodes/bootstrap-components.php');
include_once('shortcodes/wc_cart.php');//[get_cart_count] & [wc_cart_icon] & [is_woocommerce_activated]


add_shortcode('_search', 'custom_serach_form');