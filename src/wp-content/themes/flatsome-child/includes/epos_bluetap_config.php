<?php
/**
 * Add a custom Bluetap settings field in WooCommerce Products settings.
 */
add_filter('woocommerce_get_settings_products', function ($settings, $current_section) {

    if ($current_section === '') {

        $settings[] = [
            'title' => __('Bluetap360 Settings', 'woocommerce'),
            'type'  => 'title',
            'id'    => 'bluetap360_settings'
        ];

        $settings[] = [
            'title'    => __('Bluetap Product IDs', 'woocommerce'),
            'desc'     => __('Enter product IDs separated by comma (ex: 34592,39234)', 'woocommerce'),
            'id'       => 'bluetap360_product_ids',
            'type'     => 'text',
            'css'      => 'min-width:300px;',
            'desc_tip' => true,
        ];

        $settings[] = [
            'type' => 'sectionend',
            'id'   => 'bluetap360_settings'
        ];
    }

    return $settings;
}, 10, 2);

/**
 * Bluetap Product IDs (Global Access)
 */
function bluetap_product_ids()
{

    static $ids = null; // Cache the result

    if ($ids !== null) {
        return $ids;
    }

    $option = get_option('bluetap360_product_ids', '');

    if (empty($option)) {
        $ids = [];
    } else {
        $ids = array_filter(array_map('intval', explode(',', $option)));
    }

    return $ids;
}
function is_bluetap_product($product_id)
{
    return in_array((int)$product_id, bluetap_product_ids());
}
