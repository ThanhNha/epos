<?php

/**
 * Remove shipping fields
 *
 */

// add_filter('woocommerce_checkout_fields',  'shipping_remove_fields');
function shipping_remove_fields($fields)
{
  unset($fields['billing']['billing_city_field']);
  unset($fields['billing']['billing_state_field']);
  // unset($fields['billing']['billing_country']);

  return $fields;
}

/**
 * Custom rates
 *
 */


add_filter('woocommerce_package_rates', 'override_ups_rates', 999);
function override_ups_rates($rates)
{
  global $woocommerce;
  // get the cart total_product price after minus price product support
  $all_free_rates = array();

  $carttotal = calculator_subtotal_price();
  $flat_rate_cost = 38; // Adjust this value as needed
  $only_has_product_service = is_only_support_product();

  foreach ($rates as $rate_key => $rate) {

    // Check if the shipping method ID is flat_rate
    if (!$only_has_product_service) {

      if ($rate->method_id == 'flat_rate') {
        // Set cost based on cart total

        if ($carttotal >= 150) {
          $rates[$rate_key]->cost = 0;
          $rates[$rate_key]->label = 'Free shipping';
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


/**
 * Custom require fields by Shipping Method
 *
 */

add_filter('woocommerce_checkout_fields', 'remove_billing_checkout_fields');
function remove_billing_checkout_fields($fields)
{
  $shipping_method = 'local_pickup:2';

  $hide_fields = array('billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode');

  $chosen_methods = WC()->session->get('chosen_shipping_methods');

  $chosen_shipping = $chosen_methods[0];

  foreach ($hide_fields as $field) {
    if ($chosen_shipping == $shipping_method) {
      $fields['billing'][$field]['required'] = false;
    }
    $fields['billing'][$field]['class'][] = 'billing-dynamic';
  }

  return $fields;
}

/**
 * Hide Shipping fields by Shipping Method
 *
 */

add_filter('woocommerce_checkout_fields', 'disable_shipping_local_pickup');

function disable_shipping_local_pickup($fields)
{

  // Hide shipping on checkout load

  $shipping_method = 'local_pickup:2';

  $chosen_methods = WC()->session->get('chosen_shipping_methods');

  $chosen_shipping = $chosen_methods[0];

  if ($chosen_shipping == $shipping_method) {
    wc_enqueue_js("hideAddPress();");
  }

  // Hide shipping on checkout shipping change
  wc_enqueue_js("
      $('form.checkout').on('change','input[name^=\"shipping_method\"]',function() {
         var val = $( this ).val();
         if (val.match('^local_pickup')) {
           hideAddPress();
         } else {
            showAddPress();
         }
      });
   ");
  return $fields;
}
