<?php


function CTite_admin_scripts($hook)
{

    if (is_admin()) {

        // Add the color picker css file       
        wp_enqueue_style('wp-color-picker');

        // Include our custom jQuery file with WordPress Color Picker dependency
        // wp_enqueue_script('wp-colorpicker', get_template_directory_uri() . '/js/custom.js', array('wp-color-picker'), false, true);

        // wp_enqueue_script('functions-handle', get_template_directory_uri() . '/js/functions.js', array('jquery'));
    }
}
// add_action('admin_enqueue_scripts', 'CTite_admin_scripts');
add_action('admin_footer', 'CTite_admin_scripts');


add_action('admin_footer', 'colorPicker_scripts');

function colorPicker_scripts()
{
?>
<script>

var upload_image_button=false;
jQuery(document).ready(function() {
 // Add Color Picker to all inputs that have 'color-field' class
 jQuery( '.cpa-color-picker' ).wpColorPicker();    
//Upload Logo
 jQuery('#upload_logo_button').click(function() {
        upload_image_button =true;
        formfieldID=jQuery(this).prev().attr("id");
     formfield = jQuery("#"+formfieldID).attr('name');
     tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        if(upload_image_button==true){

                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {

                imgurl = jQuery('img', html).attr('src');
                jQuery("#"+formfieldID).val(imgurl);
                 tb_remove();
                window.send_to_editor = oldFunc;
                }
        }
        upload_image_button=false;
  });
//Upload Favicon
 jQuery('#upload_favicon_button').click(function() {
        upload_image_button =true;
        formfieldID=jQuery(this).prev().attr("id");
     formfield = jQuery("#"+formfieldID).attr('name');
     tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        if(upload_image_button==true){
                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {
                imgurl = jQuery('img', html).attr('src');
                jQuery("#"+formfieldID).val(imgurl);
                 tb_remove();
                window.send_to_editor = oldFunc;
                }
        }
        upload_image_button=false;
  });


});
(function($) {

    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-field').wpColorPicker();
    });

})(jQuery);
</script>
<?php

}


/**
 * CSS FOR ACF PAGE TEMPLATE BACKEND
 * * */
add_action('admin_head', 'admin_custom_css');

function admin_custom_css()
{
?><style>
    label{cursor: pointer;}
.special,
.special * {
    background: #EEE;
}

.form_builder_row {
    clear: both;
}

textarea {
    min-width: 40%;
}



.the_features label {font-size:15px;}
.the_features .form_builder_row {
    padding: 20px;
    float: left;
    width: 27%;
    display: inline-block;
    clear: none;
    margin: 5px;
    border-left: 6px solid #2271b1;
    background: #EAEAEA;
}

.the_features input#CT_excerpt_length {
    max-width: 70px;
    float: right;
    display: inline-block;
    clear: none;
}

.the_features .form_builder_row>label {    max-width: 210px !important;}

.the_features .form-group.form_builder_row.row>div {
    max-height: 40px;
    width: 17px;
    float: right;
}


.the_features input[type=checkbox]:checked::before {
    margin: 0;
    height: 15px;
    width: 15px;
}

</style><?php
        }


        /**
         * WORDPRESS ADMIN MEDIA UPLOAD ENQUEUE
         * * */
        function enqueue_media_uploader()
        {
            if (is_admin()) {
                wp_enqueue_media();
            }
        }
        add_action('admin_enqueue_scripts', 'enqueue_media_uploader');