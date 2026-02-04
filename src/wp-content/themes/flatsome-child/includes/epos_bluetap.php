<?php
// Check cart item has Bluetap360
function cart_has_product_bluetap360() {
    if (WC()->cart->is_empty()) { return false; }

    foreach (WC()->cart->get_cart() as $cart_item) {
        if ((int) $cart_item['product_id'] === 39234) {
            return true;
        }
    }
    return false;
}

// Custom order MCC/UEN field for checkout
add_action('woocommerce_after_checkout_billing_form', function ($checkout) {
    if (!cart_has_product_bluetap360()) {
        return;
    }
    woocommerce_form_field('order_eg', [
        'type'        => 'text',
        'class'       => ['form-row-wide'],
        'label'       => ('UEN/Business Registration Number'),
        'placeholder' => ('UEN/Business Registration Number'),
        'required'    => true,
    ], $checkout->get_value('order_eg'));
});

add_action('woocommerce_checkout_process', function () {
    if (!cart_has_product_bluetap360()) {
        return;
    }
    if (empty($_POST['order_eg'])) {
        wc_add_notice(('Please enter UEN/Business Registration Number.'), 'error');
    }
});

// Show in order dashboard
add_action('woocommerce_admin_order_data_after_billing_address', function ($order) {
    $eg = $order->get_meta('order_eg');
    if ($eg) {
        echo '<p><strong>' . __('UEN/Business Registration Number', 'woocommerce') . ':</strong> ' . esc_html($eg) . '</p>';
    }
});


// Show in order detail
add_action('woocommerce_order_details_after_customer_details', function ($order) {
    $eg = $order->get_meta('order_eg');
    if ($eg) {
        echo '<p><strong>' . __('UEN/Business Registration Number', 'woocommerce') . ':</strong> ' . esc_html($eg) . '</p>';
    }
});


// Show in mail
add_filter('woocommerce_email_order_meta_fields', function ($fields, $sent_to_admin, $order) {
    $eg = $order->get_meta('order_eg');
    if ($eg) {
        $fields['order_eg'] = [
            'label' => __('UEN/Business Registration Number', 'woocommerce'),
            'value' => $eg,
        ];
    }
    return $fields;
}, 10, 3);



add_action('woocommerce_checkout_create_order', function($order, $data) {
    // Handle custom order eg field
    if (!empty($_POST['order_eg'])) {
        $order->update_meta_data(
            'order_eg',
            sanitize_text_field($_POST['order_eg'])
        );
    }
}, 99, 2);
