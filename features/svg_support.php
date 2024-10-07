<?php

function custom_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');

// Fix the SVG display issue by setting dimensions
function fix_svg_display_size($content) {
    if (strpos($content, '.svg') !== false) {
        $content = preg_replace('/<img([^>]+?)src="([^"]+?\.svg)"([^>]*?)>/', '<img$1src="$2"$3 style="width:100%; height:auto;">', $content);
    }
    return $content;
}
add_filter('the_content', 'fix_svg_display_size');



function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// Allow only safe SVG uploads with sanitization
function sanitize_svg_upload( $data, $file, $filename, $mimes ) {
    if ( $data['type'] == 'image/svg+xml' ) {
        $xml = simplexml_load_file( $file );
        if ( ! $xml ) {
            $data['error'] = 'Invalid SVG file';
        }
    }
    return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'sanitize_svg_upload', 10, 4 );