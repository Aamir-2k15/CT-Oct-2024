<?php /*
 * Template Name: LP Oct2024
 */ ?>
<?php get_header(); ?>
<section id="LP-Oct2024" class="mt-4">
    <div class="container mt-4">

        <!-- HERO SECTION -->
        <div class="jumbotron">
            <div class="row">
                <div class="col">
                    <h1><?php echo get_post_meta(get_the_ID(), 'hero_title', true);?></h1>
                    <p class="lead"><?php echo get_post_meta(get_the_ID(), 'hero_text', true);?></p>
                </div>
                <div class="col"><img
                        src="<?php echo get_post_meta(get_the_ID(), 'hero_image', true);?>"
                        alt="<?php echo get_post_meta(get_the_ID(), 'hero_image_alt', true);?>" 
                        title="<?php echo get_post_meta(get_the_ID(), 'hero_image_alt', true);?>" 
                        width="<?php echo get_post_meta(get_the_ID(), 'hero_image_width', true);?>" 
                        height="<?php echo get_post_meta(get_the_ID(), 'hero_image_height', true);?>"></div>

            </div>
        </div>
        <!-- /HERO SECTION -->
        <?php /*?><div class="section-header">
            <h3><?php __( 'Contact Us', TD );?></h3>
        </div>

        <div class="row">
            <?php if (have_posts()):while (have_posts()):the_post(); ?>
            <div class="col-lg-6">
                <?php the_content(); ?>
                <?php edit_post_link('edit', '<p>', '</p><br/>'); ?>
            </div>
            <?php endwhile; endif;?>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-5 info">
                        <i class="ion-ios-location-outline"></i>
                        <p><?= $options['address']; ?></p>
                    </div>
                    <div class="col-md-4 info">
                        <i class="ion-ios-email-outline"></i>
                        <p><?= $options['site_email']; ?></p>
                    </div>
                    <div class="col-md-3 info">
                        <i class="ion-ios-telephone-outline"></i>
                        <p><?= $options['phone']; ?></p>
                    </div>
                </div>

                <div class="form">
                    <?= do_shortcode('[contact-form-7 id="33" title="Contact form 1"]'); ?>
                </div>
            </div>

        </div><?php */?>

    </div>
</section><!-- / -->
<?php get_footer(); ?>