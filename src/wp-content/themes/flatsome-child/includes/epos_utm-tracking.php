<?php
add_action('init', function () {

    if (!function_exists('WC') || !WC()->session) return;

    $field = 'utm_term';

    if (!empty($_GET[$field])) {
        WC()->session->set(
            '_wc_order_attribution_' . $field,
            sanitize_text_field(wp_unslash($_GET[$field]))
        );
    }
}, 5);

add_action('woocommerce_checkout_create_order', function ($order) {

    if (!function_exists('WC') || !WC()->session) return;

    $field = 'utm_term';

    $key = '_wc_order_attribution_' . $field;

    $value = WC()->session->get($key);

    if (!empty($value)) {
        $order->update_meta_data($key, $value);
    }
}, 20);
