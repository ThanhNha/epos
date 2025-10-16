<?php
add_filter('woocommerce_product_tabs', 'my_remove_product_tabs', 98);
function my_remove_product_tabs($tabs)
{
    unset($tabs['description']);

    return $tabs;
}
function woocommerce_template_single_description()
{
    wc_get_template('single-product/tabs/description.php');
}

function my_move_full_description()
{
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_description', 35);
}
add_action('woocommerce_single_product_summary', 'my_move_full_description');
