<?php
define('BLUETAP_PRODUCT_ID', 34592); // This is ID on live site: 39234

// Check cart item has Bluetap360
function cart_has_product_bluetap360()
{
    if (WC()->cart->is_empty()) {
        return false;
    }

    foreach (WC()->cart->get_cart() as $cart_item) {
        if ((int) $cart_item['product_id'] === BLUETAP_PRODUCT_ID) {
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

    foreach (WC()->cart->get_cart() as $cart_item) {
        if ((int) $cart_item['product_id'] === BLUETAP_PRODUCT_ID) {

            $order->update_meta_data('bluetap360_order', 'yes');
            break;
        }
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
        <label for="supported_mcc">MCC <span class="required" aria-hidden="true">*</span></label>

        <select name="supported_mcc" class="woocommerce-select" required>
            <option value="">Only applicable to supported MCCs</option>

            <?php foreach ($options as $option): ?>
                <option value="<?php echo esc_attr($option['label'] . ' - ' . $option['value']); ?>">
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

add_action('woocommerce_single_product_summary', 'bluetap_show_promo_ends_text', 25);
function bluetap_show_promo_ends_text()
{

    global $product;



    if (! $product || $product->get_id() != BLUETAP_PRODUCT_ID) {
        return;
    }

    if ($product->is_on_sale()) {

        $sale_end = $product->get_date_on_sale_to();

        if ($sale_end) {
            echo '<p class="bluetap-promo-ends">';
            echo 'Promo Ends ' . date_i18n('d M', $sale_end->getTimestamp());
            echo '</p>';
        }
    }
}


add_filter('woocommerce_package_rates', 'easyparcel_only_sf_domestic_free_shipping', 100, 2);
function easyparcel_only_sf_domestic_free_shipping($rates, $package)
{

    $has_free  = false;
    $has_other = false;

    foreach ($package['contents'] as $item) {
        if (empty($item['data'])) continue;

        $product = $item['data'];
        $class   = $product->get_shipping_class();

        if ($class === 'free-shipping') {
            $has_free = true;
        } else {
            $has_other = true;
        }
    }

    foreach ($rates as $rate_id => $rate) {

        $method_id = $rate->method_id;
        $label     = $rate->label;

        $is_easyparcel = (
            stripos($method_id, 'easyparcel') !== false ||
            stripos($label, 'SF') !== false ||
            stripos($label, 'EasyParcel') !== false
        );

        if (! $has_free || $has_other) {
            if ($is_easyparcel) {
                unset($rates[$rate_id]);
            }
            continue;
        }

        if ($is_easyparcel) {

            if (stripos($label, 'SF Domestic') === false) {
                unset($rates[$rate_id]);
                continue;
            }

            $rates[$rate_id]->cost = 0;

            if (! empty($rates[$rate_id]->taxes)) {
                foreach ($rates[$rate_id]->taxes as $key => $tax) {
                    $rates[$rate_id]->taxes[$key] = 0;
                }
            }
        }
    }

    return $rates;
}

function cart_has_product_id_safe($target_product_id)
{
    if (! WC()->cart || WC()->cart->is_empty()) return false;

    foreach (WC()->cart->get_cart() as $cart_item) {
        $product = $cart_item['data'];
        if (! $product) continue;

        $product_id = $product->get_parent_id() ?: $product->get_id();

        if ((int) $product_id === (int) $target_product_id) {
            return true;
        }
    }
    return false;
}

add_filter('woocommerce_package_rates', 'exclude_shipping_tax_when_product_id_in_cart', 20, 2);
function exclude_shipping_tax_when_product_id_in_cart($rates, $package)
{

    if (! cart_has_product_id_safe(BLUETAP_PRODUCT_ID)) {
        return $rates;
    }

    foreach ($rates as $rate_key => $rate) {
        $rates[$rate_key]->taxes = [];
        $rates[$rate_key]->tax_status = 'none';
    }

    return $rates;
}

add_action('woocommerce_checkout_process', function () {

    if (! cart_has_product_bluetap360()) {
        return;
    }

    if (empty($_POST['order_eg'])) {
        return;
    }

    $uen = sanitize_text_field($_POST['order_eg']);

    $orders = wc_get_orders([
        'limit'      => 1,
        'status'     => ['processing', 'completed'],
        'meta_key'   => 'order_eg',
        'meta_value' => $uen,
    ]);

    foreach ($orders as $order) {
        foreach ($order->get_items() as $item) {
            if ((int) $item->get_product_id() === BLUETAP_PRODUCT_ID) {
                wc_add_notice(
                    __('This UEN has already purchased Bluetap360. Each UEN is allowed to purchase only once.', 'woocommerce'),
                    'error'
                );
                return;
            }
        }
    }
});

add_action('woocommerce_check_cart_items', function () {

    foreach (WC()->cart->get_cart() as $cart_item) {
        if ((int) $cart_item['product_id'] === BLUETAP_PRODUCT_ID && $cart_item['quantity'] > 1) {

            wc_add_notice(
                __('Each UEN is allowed to purchase only one Bluetap product. Please adjust the quantity.', 'woocommerce'),
                'error'
            );

            WC()->cart->set_quantity($cart_item['key'], 1);
            break;
        }
    }
});

add_filter('woocommerce_is_sold_individually', function ($return, $product) {

    if ((int) $product->get_id() === BLUETAP_PRODUCT_ID) { 
        return true;
    }

    return $return;
}, 10, 2);
