<?php

/**
 * Generates closing /div tag.
 *
 * @return string the generated HTML output
 */
function div_close(){
    $output = '</div>'; 
    return $output;
}
add_shortcode('_container', 'div_close');
add_shortcode('_row', 'div_close');
add_shortcode('_col', 'div_close');
add_shortcode('_div', 'div_close');
add_shortcode('_div', 'div_close');