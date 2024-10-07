<?php

function wc_cart_icon() {
    if (is_woocommerce_activated()) {
        $cart_count = WC()->cart->get_cart_contents_count();
        ob_start(); ?>

<div class="cart-icon-container">
    <a href="<?php echo wc_get_cart_url(); ?>" class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
        <span class="badge" id="cart-badge"><?php echo esc_html($cart_count); ?></span>
    </a>
</div>

<script>
jQuery(function($) {
    // Listen for changes in the cart quantity
    $(document.body).on('updated_cart_totals', function(e) {
        console.log('event: ' + e);
        // Make an AJAX request to get the updated cart count
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                action: 'get_cart_count'
            },
            success: function(response) {
                // Update the cart icon with the new count
                $('#cart-badge').text(response);
            }
        });
    });
});
</script>

<?php
        return ob_get_clean();
    } else {
        return '<p>WooCommerce is not active.</p>';
    }
}

add_shortcode('wc_cart_icon', 'wc_cart_icon');







function get_cart_count() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}

add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');

add_shortcode('get_cart_count', 'get_cart_count');


function is_woocommerce_activated() {
    return class_exists('WooCommerce');
}
add_shortcode('is_woocommerce_activated', 'is_woocommerce_activated');