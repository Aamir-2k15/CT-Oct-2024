<?php


function _related_posts()
{
    global $post;

    // Get post tags
    $post_tags = wp_get_post_tags($post->ID);

    // If there are tags, get related posts
    if ($post_tags) {
        $tag_ids = array();
        foreach ($post_tags as $tag) {
            $tag_ids[] = $tag->term_id;
        }

        $args = array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => -1, // Display all related posts
            'ignore_sticky_posts' => 1,
            'orderby' => 'rand', // You can change the orderby parameter as needed
        );

        $related_query = new WP_Query($args);

        // Start output buffering
        ob_start();

        // Display related posts cards
        if ($related_query->have_posts()) {
    ?>
            <div id="related-posts-cards" class="row">
                <div class="col-md-12">
                    <?php
                    $custom_post_type = get_post_type(); // Replace this with the actual custom post type variable or name

                    $post_type_object = get_post_type_object($custom_post_type);

                    if ($post_type_object) {
                        $post_type_name = $post_type_object->labels->singular_name;
                    ?>
                        <h3>Related <?php echo esc_html($post_type_name); ?></h3>
                    <?php
                    } else {
                    ?>

                        <h3>Related Posts</h3>
                    <?php } ?>
                </div>
                <?php

                while ($related_query->have_posts()) {
                    $related_query->the_post();
                ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <?php
                            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'large');

                            if ($thumbnail_url) { ?>
                                <div class="card-img img-container-270">
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" class="card-img-top img-fluid" alt="<?php echo esc_attr(get_the_title()); ?>" width="100%" height="100%">
                                </div>
                            <?php }
                            ?>

                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php echo get_permalink(); ?>" class="text-normal"><?php echo get_the_title(); ?></a></h5>
                                <!-- <p class="card-text"><?php //echo get_the_excerpt(); 
                                                            ?></p> -->
                                <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>

                <?php
                }

                ?>
            </div>
<?php

            wp_reset_postdata();
        } else {
            echo '<p>No related posts found.</p>';
        }

        // End output buffering and return the content
        return ob_get_clean();
    } else {
        return '<p>No tags found.</p>';
    }
}
