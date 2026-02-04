<?php
function footer_shortcode()
{
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $path_trimmed = trim($path, '/');

    if (strpos($path_trimmed, 'epos360') === 0) {
        return do_shortcode('[block id="footer-epos-360"]');
    } else {
        return do_shortcode('[block id="footer"]');
    }
}
add_shortcode('custom_footer', 'footer_shortcode');
