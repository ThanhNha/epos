<?php
add_action('init', function () {

    if (!function_exists('WC') || !WC()->session) return;

    if (!empty($_GET['utm_term'])) {
        WC()->session->set(
            '_wc_order_attribution_utm_term',
            sanitize_text_field(wp_unslash($_GET['utm_term']))
        );
    }
}, 5);

add_action('woocommerce_checkout_create_order', function ($order) {

    if (!function_exists('WC') || !WC()->session) return;

    $value = WC()->session->get('_wc_order_attribution_utm_term');

    if (!empty($value)) {
        $order->update_meta_data('_wc_order_attribution_utm_term', $value);
    }
}, 20);
