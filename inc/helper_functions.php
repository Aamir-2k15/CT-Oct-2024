<?php


/**
 * CT_get_posts_loop
 * Outputs a loop of posts. If there are posts, it
 * displays them in a row with an image on the left
 * and the post title, excerpt, and meta on the right.
 * If there are no posts, it displays a "not found"
 * message.
 * @param WP_Query $data The WP_Query object from which to get the posts.
 */

function CT_get_posts_loop($data)
{
?>
    <div class="row">
        <div class="col-md-12">
            <?php if ($data->have_posts()) : ?>
                <?php $i = 0; ?>
                <div class="content">
                    <?php while ($data->have_posts()) : $data->the_post();
                        $i++; ?>
                        <div class="row border-bottom mb-2 mt-2 pb-4 pt-4 pb-2 pos-<?php echo $i; ?>?>">
                            <div class="col-md-2"><?php if (has_post_thumbnail()) { ?>
                                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full'); ?>
                                    <a href="<?= the_permalink(); ?>" class="entry__thumb-link pt-2 pb-2">
                                        <img width="100%" height="auto" src="<?php echo $image[0]; ?>" class="img-fluid" /></a><?php } ?>
                            </div>
                            <div class="col-md-10">
                                <h5 class="pb-2 heading-sm-b"><a href="<?= the_permalink(); ?>" class="the-link"><?php the_title(); ?></a></h5>
                                <div class="pt-2 pb-2"><?php the_excerpt(); ?></div>
                                <?php get_template_part('inc/meta_info'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <div class="row pt-2 pb-2">
                        <div class="col-md-12"><?php _pagination(); ?></div>
                    </div>
                <?php else : ?>
                    <?php get_template_part('inc/not-found'); ?>
                <?php endif; ?>
                </div>
        </div>
    </div><!-- /.row -->
<?php
}



/**
 * Display the formatted date for a given post.
 *
 * @param int $id The ID of the post.
 * @throws None
 * @return void
 */
function _CT_display_date($id)
{
    $post_date = get_the_date('j F, Y', $id);
    $day_link = get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));
    $month_link = get_month_link(get_post_time('Y'), get_post_time('m'));
    $year_link = get_year_link(get_post_time('Y')); ?>
    <span class="date-full"><a class="date-day" href="<?php echo esc_url($day_link); ?>"> <?php echo get_the_date('j'); ?> </a> <a class="date-month" href="<?php echo esc_url($month_link); ?>"> <?php echo get_the_date('F'); ?></a>, <a class="date-year" href="<?php echo esc_url($year_link); ?>"> <?php echo get_the_date('Y'); ?></a> </span>
<?php
}

/**
 * Displays the author name as a link to their author page.
 *
 * @since 1.0.0
 */
function _CT_author_info()
{
    // Get author information
    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author();
    $author_email = get_the_author_meta('user_email');
    $author_description = get_the_author_meta('description');
    $author_url = get_author_posts_url($author_id);
    echo '<a class="the_author" href="' . esc_url($author_url) . '">' . esc_html($author_name) . '</a>';
}