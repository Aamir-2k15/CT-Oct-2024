<?php


// Add a menu item to the WordPress admin menu
function CT_admin_menu()
{
    add_menu_page(
        'CT Admin',  // Page title
        'CT Admin',       // Menu title
        'manage_options',     // Capability required to access
        'CT-admin',  // Menu slug
        'CT_admin_page',  // Callback function to render the page
        'dashicons-media-document',  // Icon for the menu item (change as needed)
        100  // Menu position
    );
}
add_action('admin_menu', 'CT_admin_menu', 1);

// Render the custom admin page
function CT_admin_page()
{
    // pd(CT_SOCIALMEDIA);
?>
<div id="admin_page" class="wrap">
    <h2>CT Admin</h2>
    <div class="clearfix">&nbsp;</div>

    <form method="post" action="#" id="CT_save_settings_form">
        <ul class="tabs">
            <li class="tab " onclick="showContent('tab1', this);">Basic Settings</li>

            <li class="tab" id="social_media_tab" onclick="showContent('tab2', this);">Social Media</li>

            <li class="tab" onclick="showContent('tab3', this);">Toggle Available Functions/Features </li>
            <li class="tab" onclick="showContent('tab4', this);">Shortcodes, Functions</li>
            <!-- <li class="tab" onclick="showContent('tab3', this);">Tab 3</li> -->
        </ul>



        <div id="tab1" class="content active">
            <?php
                include_once('pages/basic-settings.php');
                ?>
        </div>

        <div id="tab2"  class="content">
            <?php
                include_once('pages/social-media.php');
                ?>
        </div>


        <div id="tab3" class="content the_features">
            <h2>Toggle Available Features List</h2>
            <?php 
        include_once('pages/toggle-features.php');
        ?>
        </div>


        <div id="tab4" class="content">
            <h2>Shortcodes, Functions Info</h2>
            <?php
        include_once('pages/shorcodes-functions-info.php');
        ?>
        </div>

        <!-- <div id="tab3" class="content">
                <h2>Content for Tab 3</h2>
                <p>This is the content for tab 3.</p>
            </div> -->
        <?php
            FORMBUILDER->field([
                'type' => 'button',
                'label' => 'Save Settings',
                'name' => 'CT_save_settings',
                'id' => 'CT_save_settings',
                'class' => 'button button-primary',
            ]); ?>
    </form>
    <div class="clearfix" id="target">
        <div id="loader" style="display:none;">&nbsp;</div>
    </div>
</div>
<?php include_once 'script.php'; ?>
<?php
}

/***
 * SET VALUES
 * ***/
add_action("wp_ajax_CT_save_settings", "CT_save_settings");
add_action("wp_ajax_nopriv_CT_save_settings", "CT_save_settings");
function CT_save_settings()
{
    ob_start();
    $CT_settings = [];
    $CT_socialmedia = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'sm_') === 0) {
            $CT_socialmedia[$key] = $value;
        } else {
            $CT_settings[$key] = $value;
        }
    }

    update_option('CT_settings', $CT_settings);
    update_option('CT_socialmedia', $CT_socialmedia);
?>
<div id="setting-error-settings_updated" class="notice notice-success  is-dismissible">
    <p><strong>Settings updated.</strong></p><button type="button" class="notice-dismiss"><span
            class="screen-reader-text">Dismiss this notice.</span></button>
</div>
<?php

    $result = ob_get_clean();
    $status = 200;
    $message = 'Success';
    $return = json_encode(array('result' => $result, 'status' => $status, 'message' => $message, 'request' => $_REQUEST, 'args' => $args));
    echo $return;
    exit;
}