<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="CT_AJAX" content="<?php echo CT_AJAX; ?>">
    <meta name="description" content="<?=(isset(CT_SETTINGS['site_dsec']) ? CT_SETTINGS['site_dsec']: '');?>">
    <meta name="author" content="<?=(isset(CT_SETTINGS['author_desc']) ? CT_SETTINGS['author_desc']: '');?>">
    <?php if(!is_front_page()){$page_title = wp_title('', false).' | '; }else{$page_title = 'Home | ';}?>
    <title> <?php echo $page_title;?><?php bloginfo('name'); ?> </title>

    <link rel="shortcut icon" href="<?= (isset(CT_SETTINGS['favicon']) ? CT_SETTINGS['favicon'] : ''); ?>"
        type="image/x-icon">
    <link rel="icon" href="<?= (isset(CT_SETTINGS['favicon']) ? CT_SETTINGS['favicon'] : ''); ?>" type="image/x-icon">
    <!-- Main Stylesheet File -->
    <?php wp_head();?>
</head>

<body <?php body_class(); ?>>
    <div id="wrap">
        <header id="header">

            <div id="topbar" class="navbar-dark bg-dark">
                <div class="container">
                    <div class="row pt-2 pb-0">
                        <div class="col-md-3 topbar-1"><?php dynamic_sidebar('topbar_1'); ?></div>
                        <div class="col-md-3 topbar-2"><?php dynamic_sidebar('topbar_2'); ?></div>
                        <div class="col-md-3 topbar-3"><?php dynamic_sidebar('topbar_3'); ?></div>
                        <div class="col-md-3 topbar-4"><?php dynamic_sidebar('topbar_4'); ?></div>
                    </div>
                </div>
            </div>
<?php // ?>
            <nav class="navbar navbar-expand-lg ">
              
                <div class="container">
                    <a href="<?= site_url(); ?>" class="navbar-brand">
                        <img 
                            src="<?php echo isset(CT_SETTINGS['site_logo'])?CT_SETTINGS['site_logo']:''; ?>"
                            alt="<?php echo image_meta_by_src(CT_SETTINGS['site_logo'])['alt']; ?>" class="img-fluid logo" 
                            width="<?php echo isset(CT_SETTINGS['logo-width'])?CT_SETTINGS['logo-width']:'64'; ?>" 
                            height="<?php echo isset(CT_SETTINGS['logo-height'])?CT_SETTINGS['logo-height']:'auto'; ?>"
                            title="<?php echo image_meta_by_src(CT_SETTINGS['site_logo'])['title']; ?>"
                            />
                    </a>
                    <button class="navbar-toggler navbar-toggler-right border" type="button" data-toggle="collapse"
                        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <?php
                    $args = array(
                        'theme_location' => 'primary_menu',
                        'menu' => 'primary_menu',
                        'container' => 'false',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'menu',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new Walker_Nav_Primary(), // This controls the display of the Bootstrap Navbar
                        'fallback_cb' => 'Walker::fallback', // For menu fallback
                    );
                    ?>
                        <?php wp_nav_menu($args); ?>
                    </div>
                    <!-- <div class="ml-auto pl-2">
                        <?php //dynamic_sidebar('header'); ?>
                    </div> -->
                </div>
            </nav>
        </header>