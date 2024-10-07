<?php

function the_post_views()
{

    $postID = get_the_ID();
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }

    $views = get_post_meta($postID, $countKey, true);
    echo $views;
}
