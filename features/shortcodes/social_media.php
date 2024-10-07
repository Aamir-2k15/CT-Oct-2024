<?php


/**
 * Generate the function comment for the given function body.
 *
 * @param array $atts An associative array of attributes.
 *     - string $atts['no_icon'] Whether to display the icon or not.
 *     - string $atts['for'] The name to be displayed.
 *     - string $atts['icon'] The custom icon to be displayed.
 *     - string $atts['extra_icon_class'] The extra class for the icon.
 *     - string $atts['platform'] The platform for the social media.
 *
 * @throws Some_Exception_Class This function may throw a Some_Exception_Class
 *     if something goes wrong.
 *
 * @return string The HTML code for the social media link.
 */
function show_social_media($atts)
{

if(!empty($atts['help'])){
    _sm_help();
    die();
}

    $no_icon = !empty($atts['no_icon']) ? $atts['no_icon'] : '';
    $name = $atts['for'];
    $custom_icon = !empty($atts['icon']) ? $atts['icon'] : '';
    $extra_icon_class = !empty($atts['extra_icon_class']) ? $atts['extra_icon_class'] : '';
    $fontAwesomeClass = 'fab fa-' . $name;

    // Check if the key exists in _SOCIALMEDIA array
    $url = (isset(_SOCIALMEDIA['sm_' . $name]) && !empty(_SOCIALMEDIA['sm_' . $name])) ? _SOCIALMEDIA['sm_' . $name] : '';

    $icon = empty($custom_icon) ? '<i class="' . $fontAwesomeClass . ' ' . $extra_icon_class . '"></i>' : $custom_icon;

    $with_icon = '<a href="' . $url . '" class="' . $name . '" title="' . $name . '">' . $icon . '</a>';
    $without_icon = '<label>' . ucfirst(str_replace("site_", "", $name)) . '</label> : <a href="' . $url . '" class="' . $name . '" title="' . $name . '">' . $url . '</a>';

    $return = $no_icon ? $without_icon : $with_icon;

    return !empty($url) ? $return : '.';
}

add_shortcode('sm', 'show_social_media');





function _sm_help()
{
?>
<h3>[_sm] help</h3>
<code>
    $atts = [
      'no_icon'            => '', // Whether to display the icon or not.<br/>
      'for'                => '', // The name to be displayed.<br/>
      'icon'               => '', // The custom icon to be displayed.<br/>
      'extra_icon_class'   => '', // The extra class for the icon.<br/>
      'platform'           => '' // The platform for the social media.<br/>
    ];<br/><br/>
    _sm($atts);<br/>
  </code><br /><br />
<p>Generate the function comment for the given function body.</p>

<p><strong>Parameters:</strong></p>
<ul>
    <li><code>$atts['no_icon']</code> (string) - Whether to display the icon or not.</li>
    <li><code>$atts['for']</code> (string) - The name to be displayed.</li>
    <li><code>$atts['icon']</code> (string) - The custom icon to be displayed.</li>
    <li><code>$atts['extra_icon_class']</code> (string) - The extra class for the icon.</li>
    <li><code>$atts['platform']</code> (string) - The platform for the social media.</li>
</ul>

<p><strong>Throws:</strong></p>
<p>Some_Exception_Class - This function may throw a Some_Exception_Class if something goes wrong.</p>

<p><strong>Returns:</strong></p>
<p>The HTML code for the social media link.</p>
<p><strong>Use:</strong></p>

<ol>
    <li><strong>Display Social Media Icon:</strong>
        <pre><code>[_sm for="facebook"]</code></pre>
    </li>

    <li><strong>Display Custom Icon:</strong>
        <pre><code>[_sm for="twitter" icon="icon-url"]</code></pre>
    </li>

    <li><strong>Hide Icon:</strong>
        <pre><code>[_sm for="instagram" no_icon="true"]</code></pre>
        <em>This'll display " name: url " instead of icon</em>
    </li>

    <li><strong>Override Icon Class:</strong>
        <pre><code>[_sm for="linkedin" extra_icon_class="custom-class"]</code></pre>
    </li>

    <li><strong>Display Help:</strong>
        <pre><code>[_sm help='true']</code></pre>
    </li>
</ol>




<?php
}




/**
 * Generates HTML code for displaying social media links.
 *
 * @param array|null $atts The attributes for the function. Defaults to null.
 * @return string The HTML code for displaying the social media links.
 */
function show_social_media_links($atts = null)
{
    $extra_class_for_icon = !empty($atts['extra_icon_class']) ? $atts['extra_icon_class'] : '';
    $socialMedia = CT_SOCIAL_MEDIA_PLATFORMS;
    $output = '<div class="wpl-social-links"><ul>';

    foreach ($socialMedia as $name => $key) {
        $url = CT_SOCIALMEDIA['sm_' . $key];
        $fontAwesomeClass = 'fab fa-' . $key . ' ' . $extra_class_for_icon;

        if (!empty($url)) {
            $output .= '<li><a href="' . $url . '" class="' . $key . '" title="' . $name . '"><i class="' . $fontAwesomeClass . '"></i></a></li>';
        }
    }

    $output .= '<ul></div>';
    return $output;
}

add_shortcode('sm_links', 'show_social_media_links');