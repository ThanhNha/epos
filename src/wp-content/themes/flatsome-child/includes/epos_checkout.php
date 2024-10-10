<?php

/**
 * Custom Address  shipping fields
 *
 */

add_filter('woocommerce_default_address_fields', 'custom_override_default_checkout_fields', 10, 1);
function custom_override_default_checkout_fields($address_fields)
{
  // Remove labels for "address 2" shipping fields
  unset($address_fields['address_2']['placeholder']);
  unset($address_fields['address_2']['required']);

  return $address_fields;
}

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{

  unset($fields['billing']['billing_city']);
  $fields['billing']['billing_address_2']['placeholder'] = __('Apartment, suite, unit etc...', 'woocommerce');
  $fields['billing']['billing_address_2']['required'] = true; // Making Address 2 field required
  return $fields;
}


/**
 * Custom require fields by Shipping Method
 *
 */

add_filter('woocommerce_checkout_fields', 'remove_billing_checkout_fields', 90, 1);
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
