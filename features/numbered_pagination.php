<?php

/* * *********
 * NUMBERED PAGINATION
 */
function _pagination()
{
    echo "<style>  .pagination a, .pagination span {    position: relative;    float: left;    padding: 6px 12px;    margin-left: -1px;    line-height: 1.42857143;    color: #337ab7;    text-decoration: none;    background-color: #fff;    border: 1px solid #ddd;}</style>";
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    echo '<ul class="pagination">' . paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    )) . '</ul>';
}