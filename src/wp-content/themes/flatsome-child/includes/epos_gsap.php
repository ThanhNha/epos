<?php

function load_gsap_scrolltrigger_only_page()
{

    if (is_page('epos360')) {
        $version = time();
        wp_enqueue_script(
            'gsap',
            get_stylesheet_directory_uri() . '/assets/js/gsap/gsap.min.js',
            array(),
            null,
            true
        );

        wp_enqueue_script(
            'gsap-scrolltrigger',
            get_stylesheet_directory_uri() . '/assets/js/gsap/ScrollTrigger.min.js',
            array('gsap'),
            null,
            true
        );
        wp_enqueue_script(
            'gsap-scroll',
            get_stylesheet_directory_uri() . '/assets/js/gsap/ScrollToPlugin.min.js',
            array('gsap'),
            null,
            true
        );

        wp_enqueue_script(
            'gsap-custom',
            get_stylesheet_directory_uri() . '/assets/js/gsap/gsap-scroll.js',
            array('gsap-scrolltrigger'),
            $version,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'load_gsap_scrolltrigger_only_page');
