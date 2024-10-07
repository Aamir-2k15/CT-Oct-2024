<?php

/* * *
 * FILTER TO ADD FORM TO LAST li OF nav
 * * */
if(isset(CT_SETTINGS['CT_search_in_menu'])){
    add_filter('wp_nav_menu_items', 'add_search_box_to_primary_menu', 10, 2);
    function add_search_box_to_primary_menu($items, $args)
    {
        if ($args->theme_location == 'primary_menu') {
            $items .= '<li class="nav-item">';
            $items .= custom_search_form();
            $items .= '</li>';
        }
        return $items;
    }
}