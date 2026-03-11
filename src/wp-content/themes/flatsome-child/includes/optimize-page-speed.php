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


function preload_fonts()
{
    echo '<link rel="preload" href="/wp-content/themes/flatsome-child/assets/fonts/Montserrat/Montserrat-Regular.woff2" as="font" type="font/woff2" crossorigin>';
    echo '<link rel="preload" href="/wp-content/themes/flatsome-child/assets/fonts/PlusJakartaSans/PlusJakartaSans-Bold.woff2" as="font" type="font/woff2" crossorigin>';
}
add_action('wp_head', 'preload_fonts', 1);


