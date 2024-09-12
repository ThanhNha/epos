<?php

/**
 * Shipping fee part
 *
 */

// add_filter('woocommerce_package_rates', 'override_ups_rates', 999);

function override_ups_rates($rates)
{
  $all_free_rates = array();

  $carttotal = calculator_subtotal_price();
  $flat_rate_cost = 38;
  $only_has_product_service = is_only_support_product();
  $only_has_miscellaneous = is_miscellaneous();

  foreach ($rates as $rate_key => $rate) {

    if (!$only_has_product_service) {

      if ($rate->method_id == 'flat_rate') {
        // Set cost based on cart total
        if ($only_has_miscellaneous) {
          if ($carttotal >= 150) {
            $rates[$rate_key]->cost = 0;
            $rates[$rate_key]->label = 'Free shipping';
          } else {
            $rates[$rate_key]->cost = $flat_rate_cost;
          }
        } else {
          $rates[$rate_key]->cost = $flat_rate_cost;
        }
      }
    } else {

      if ($rate->method_id == 'local_pickup') {

        $rates[$rate_key]->cost = 0;
        $rates[$rate_key]->label = 'No shipping';
        $all_free_rates[$rate_key] = $rate;
        add_filter('woocommerce_checkout_fields', 'remove_billing_checkout_fields');
      }
    }
  }

  if (empty($all_free_rates)) {
    return $rates;
  } else {
    return $all_free_rates;
  }
}

add_filter('woocommerce_package_rates', 'customize_shipping_rates', 999);

function customize_shipping_rates($rates)
{
  if (empty($rates)) {
    return $rates;
  }

  $all_free_rates = array();

  $cart_total = calculator_subtotal_price();
  $flat_rate_cost = 38;
  $has_support_product = is_only_support_product();
  $has_miscellaneous = is_miscellaneous();

  foreach ($rates as $rate_key => $rate) {
    // Apply custom rate for flat_rate shipping
    if ($rate->method_id == 'flat_rate') {
      $rates[$rate_key] = adjust_flat_rate($rate, $has_support_product, $cart_total, $has_miscellaneous, $flat_rate_cost);
    }

    // Apply custom rate for local_pickup shipping
    if ($rate->method_id == 'local_pickup' && $has_support_product) {
      $rates[$rate_key] = adjust_local_pickup($rate, $rate_key);
      $all_free_rates[$rate_key] = $rate;
      add_filter('woocommerce_checkout_fields', 'remove_billing_checkout_fields');
    }
  }

  if (empty($all_free_rates)) {
    return $rates;
  } else {
    return $all_free_rates;
  }

  return $rates;
}

function adjust_flat_rate($rate, $has_support_product, $cart_total, $has_miscellaneous, $flat_rate_cost)
{
  if ($has_miscellaneous) {
    if ($cart_total >= 150) {
      $rate->cost = 0;
      $rate->label = 'Free shipping';
    } else {
      $rate->cost = $flat_rate_cost;
    }
  }

  return $rate;
}

function adjust_local_pickup($rate, $rate_key)
{
  $rate->cost = 0;
  $rate->label = 'No shipping';

  return $rate;
}

/**
 *  Product Condition
 *
 */

function is_miscellaneous()
{
  global $woocommerce;
  $is_miscellaneous = true;

  foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {
    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
      $product_id = $_product->get_ID();

      $terms = get_the_terms($product_id, 'product_cat');

      foreach ($terms as $term) {
        $cat_slug = $term->slug;
        if ($term->parent > 0) {
          $parent = get_term_by("id", $term->parent, "product_cat");
          $cat_slug = $parent->slug;
        }

        // var_dump($term);
        // get_category();
        // Stop if is On Site Support
        if ($cat_slug != 'miscellaneous') {
          $is_miscellaneous = false;
          break;
        }
      }
    }
    if (!$is_miscellaneous) break;
  }
  return $is_miscellaneous;
}


// Check is_only_support_product
function is_only_support_product()
{
  global $woocommerce;
  $is_product_service = false;

  foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {
    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
      $product_id = $_product->get_ID();

      // check if belongto Product Services
      $terms = get_the_terms($product_id, 'product_cat');

      foreach ($terms as $term) {
        $cat_slug = $term->slug;
        // Stop if is On Site Support 
        if ($cat_slug == 'on-site-support') {
          $is_product_service = true;
          break;
        } else {
          if (!$cat_slug == 'online-support') {
            $is_product_service = false;
            break;
          }
        }
      }
    }
    if ($is_product_service) break;
  }
  return $is_product_service;
}
