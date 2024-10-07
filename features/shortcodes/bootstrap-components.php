<?php




/**
 * Generates the function comment for the given function body.
 *
 * @param array $atts the shortcode attributes
 * @param string|null $content the shortcode content
 * @throws Some_Exception_Class description of exception
 * @return string the generated HTML output
 */
function bootstrap_container_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'class' => '',
            'id' => '',
        ),
        $atts,
        'bootstrap_container'
    );

    $class = !empty($atts['class']) ? ' ' . esc_attr($atts['class']) : '';
    $id = !empty($atts['id']) ? ' id="' . esc_attr($atts['id']) . '"' : '';

    $output = '<div class="container' . $class . '"' . $id . '/>';

    return $output;
}
add_shortcode('container', 'bootstrap_container_shortcode');


/**
 * Generate the function comment for the given function body.
 *
 * @param array $atts The attributes passed to the shortcode.
 * @param string|null $content The content within the shortcode.
 * @throws None
 * @return string The generated output. That is <div class="row">
 */
function bootstrap_row_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'class' => '',
            'id' => '',
        ),
        $atts,
        'bootstrap_row'
    );

    $class = !empty($atts['class']) ? ' ' . esc_attr($atts['class']) : '';
    $id = !empty($atts['id']) ? ' id="' . esc_attr($atts['id']) . '"' : '';

    $output = '<div class="row' . $class . '"' . $id . '>';

    return $output;
}
add_shortcode('row', 'bootstrap_row_shortcode');



function bootstrap_col_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'class' => '',
            'id' => '',
            'size' => '', // Default size is an empty string
        ),
        $atts,
        'bootstrap_col'
    );

    $class = !empty($atts['class']) ? ' ' . esc_attr($atts['class']) : '';
    $id = !empty($atts['id']) ? ' id="' . esc_attr($atts['id']) . '"' : '';
    $size = !empty($atts['size']) ? 'col-' . esc_attr($atts['size']) : 'col';

    $output = '<div class="' . $size . $class . '"' . $id . '>';

    return $output;
}
add_shortcode('col', 'bootstrap_col_shortcode');





add_shortcode('button', 'button_cb');

function button_cb($atts, $content = null) {
ob_start();?>
<a href="<?php echo @$atts['link'];?>" class="btn btn-primary <?php echo @$atts['class'];?>"
    id="<?php echo @$atts['id']; ?>"><?php echo @$atts['title'];?>
    <i class="<?php echo @$atts['icon']; ?>"></i>
</a>
<?php $button = ob_get_clean();
return $button;
}