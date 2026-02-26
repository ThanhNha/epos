<?php

/**
 * Shipping fee part
 *
 */


add_filter('woocommerce_package_rates', 'customize_shipping_rates', 999);

function customize_shipping_rates($rates)
{
  if (empty($rates)) {
    return $rates;
  }

  $all_free_rates = array();

  $cart_total = calculator_subtotal_price();
  $flat_rate_cost = 38;
  $has_miscellaneous = is_product_in_category('miscellaneous');
  $has_peripherals   = is_product_in_category('peripherals');
  $has_onsite_product  = is_product_in_category('on-site-support', true);
  $only_onsite_product   = only_in_category('on-site-support');
  $only_online_product   = only_in_category('online-support');

  foreach ($rates as $rate_key => $rate) {
    // Apply custom rate for flat_rate shipping
    if ($rate->method_id == 'flat_rate' && ($has_miscellaneous || $has_peripherals) && $has_onsite_product == false && $only_online_product == false) {
      $rates[$rate_key] = adjust_flat_rate($rate, $only_online_product, $has_peripherals, $has_miscellaneous, $cart_total, $flat_rate_cost);
    }

    // Apply custom rate for local_pickup shipping
    if ($rate->method_id == 'flat_rate' && $has_onsite_product == true || ($only_onsite_product || $only_online_product)) {
      $rates[$rate_key] = adjust_local_pickup($rate, $rate_key);
      $all_free_rates[$rate_key] = $rate;
      add_filter('woocommerce_checkout_fields', 'remove_billing_checkout_fields');
      break;
    }
  }

  if (empty($all_free_rates)) {
    return $rates;
  } else {
    return $all_free_rates;
  }

  return $rates;
}

function adjust_flat_rate($rate, $only_online_product, $has_peripherals, $has_miscellaneous, $cart_total, $flat_rate_cost)
{
  $tax_rate = get_tax_percent();
  if ($has_miscellaneous == true && $has_peripherals == false) {
    if ($cart_total >= 150) {
      $rate->cost = 0;
      $rate->taxes = array('1' => 0);
      $rate->label = 'Free shipping';
    } else {
      $rate->cost = $flat_rate_cost;
      $rate->taxes = array('1' => ($flat_rate_cost * $tax_rate->tax_rate) / 100);
    }
  }

  return $rate;
}

function adjust_local_pickup($rate, $rate_key)
{
  $rate->cost = 0;
  $rate->taxes = array('1' => 0);
  $rate->label = '$0';

  return $rate;
}

/**
 *  Product Condition
 *
 */

