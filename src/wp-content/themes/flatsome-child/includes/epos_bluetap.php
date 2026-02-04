<?php
// Check cart item has Bluetap360
function cart_has_product_bluetap360()
{
    if (WC()->cart->is_empty()) {
        return false;
    }

    foreach (WC()->cart->get_cart() as $cart_item) {
        if ((int) $cart_item['product_id'] === 34592) {  //39234
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
    $mcc = $order->get_meta('_supported_mcc');
    if ($eg) {
        echo '<p><strong>' . __('UEN/Business Registration Number', 'woocommerce') . ':</strong> ' . esc_html($eg) . '</p>';
    }
    if ($mcc) {
        echo '<p><strong>Supported MCC:</strong> ' . esc_html($mcc) . '</p>';
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
     $mcc = $order->get_meta('_supported_mcc');
    if ($eg) {
        $fields['order_eg'] = [
            'label' => __('UEN/Business Registration Number', 'woocommerce'),
            'value' => $eg,
        ];
    }

    if ($mcc) {
        $fields['supported_mcc'] = [
            'label' => 'Supported MCC',
            'value' => $mcc,
        ];
    }
    return $fields;
}, 10, 3);



add_action('woocommerce_checkout_create_order', function ($order, $data) {
    // Handle custom order eg field
    if (!empty($_POST['order_eg'])) {
        $order->update_meta_data(
            'order_eg',
            sanitize_text_field($_POST['order_eg'])
        );
    }
    if (! empty($_POST['supported_mcc'])) {
        $order->update_meta_data(
            '_supported_mcc',
            sanitize_text_field($_POST['supported_mcc'])
        );
    }
}, 99, 2);


add_action('woocommerce_after_checkout_billing_form', function ($checkout) {

    if (! cart_has_product_bluetap360()) {
        return;
    }

    $json_path = get_stylesheet_directory() . '/assets//json/mcc-options.json';
    $options   = json_decode(file_get_contents($json_path), true);
?>

    <div id="supported-mcc-field">
        <label for="supported_mcc">Supported MCC <span class="required" aria-hidden="true">*</span></label>

        <select name="supported_mcc" class="woocommerce-select" required>
            <option value="">-- Select MCC --</option>

            <?php foreach ($options as $option): ?>
                <option value="<?php echo esc_attr($option['value']); ?>">
                    <?php echo esc_html($option['label'] . ' - ' . $option['value']); ?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>

<?php
});
add_action('woocommerce_checkout_process', function () {
    if (cart_has_product_bluetap360()  && empty($_POST['supported_mcc'])) {
        wc_add_notice(__('Please select Supported MCC'), 'error');
    }
});

