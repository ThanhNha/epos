<?php

function load_gsap_scrolltrigger_only_page()
{

    if (is_page('epos360')) {

        $version = time();

        // GSAP core
        wp_enqueue_script(
            'gsap',
            get_stylesheet_directory_uri() . '/assets/js/gsap/gsap.min.js',
            [],
            null,
            true
        );

        wp_enqueue_script(
            'gsap-scrolltrigger',
            get_stylesheet_directory_uri() . '/assets/js/gsap/ScrollTrigger.min.js',
            ['gsap'],
            null,
            true
        );

        wp_enqueue_script(
            'gsap-scrollto',
            get_stylesheet_directory_uri() . '/assets/js/gsap/ScrollToPlugin.min.js',
            ['gsap'],
            null,
            true
        );
        wp_enqueue_script(
            'gsap-scrollSmooth',
            get_stylesheet_directory_uri() . '/assets/js/gsap/ScrollSmoother.min.js',
            ['gsap'],
            null,
            true
        );

        wp_enqueue_script(
            'gsap-custom',
            get_stylesheet_directory_uri() . '/assets/js/gsap/gsap-scroll.js',
            ['gsap', 'gsap-scrolltrigger', 'gsap-scrollto', 'gsap-scrollSmooth'],
            $version,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'load_gsap_scrolltrigger_only_page');


add_action('wp_body_open', function () {
    if (!is_page('epos360')) return;

    echo '<div id="smooth-wrapper"><div id="smooth-content">';
}, 1);

add_action('wp_footer', function () {
    if (!is_page('epos360')) return;

    echo '</div></div>';
}, 999);
