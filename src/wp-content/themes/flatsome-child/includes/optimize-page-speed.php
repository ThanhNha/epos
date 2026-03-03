<?php
//cusstom meta

add_filter('flatsome_viewport_meta', function () {
    return '<meta name="viewport" content="width=device-width, initial-scale=1">';
});

// add attribute to all anchors and buttons
add_action('template_redirect', function () {
    ob_start(function ($html) {

        if (is_admin()) {
            return $html;
        }

        libxml_use_internal_errors(true);

        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->loadHTML($html);

        foreach ($dom->getElementsByTagName('a') as $el) {
            if (!$el->hasAttribute('name')) {
                $el->setAttribute('name', 'epos');
            }
        }

        foreach ($dom->getElementsByTagName('button') as $el) {
            if (!$el->hasAttribute('name')) {
                $el->setAttribute('name', 'epos');
            }
        }

        return $dom->saveHTML();
    });
});

add_action('init', 'block_wp_json_root_only');

function block_wp_json_root_only()
{
    $current_url = $_SERVER['REQUEST_URI'];

    if ($current_url === '/wp-json/' || $current_url === '/wp-json') {
        wp_die('Access Denied', 'Forbidden', array('status' => 403));
    }
}
