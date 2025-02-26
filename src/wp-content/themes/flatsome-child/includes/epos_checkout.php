<?php
add_filter('woocommerce_billing_fields', 'custom_billing_fields', 90, 1);
function custom_billing_fields( $fields ) {
    $fields['billing_company']['required'] = true;

    return $fields;
}
// add_filter('woocommerce_billing_fields', 'modify_when_is_local_pickup', 1000, 1);
function modify_when_is_local_pickup($fields)
{
  $shipping_method = 'local_pickup:2';
  $chosen_methods = WC()->session->get('chosen_shipping_methods');

  $chosen_shipping = $chosen_methods[0];

  if ($chosen_shipping == $shipping_method) {
    $fields['billing_company']['required'] = false;
  }

  return $fields;
}
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
  $fields['billing']['billing_address_2']['required'] = true;
  $fields['billing_company']['required'] = true;
  return $fields;
}

add_filter('woocommerce_billing_fields', 'set_default_billing_company_required', 10, 1);
function set_default_billing_company_required($fields)
{
  if (isset($fields['billing_company'])) {
    $fields['billing_company']['required'] = true;
  }
  return $fields;
}

add_filter('woocommerce_billing_fields', 'conditionally_modify_billing_company_required', 20, 1);
function conditionally_modify_billing_company_required($fields)
{
  // Get the chosen shipping method
  $chosen_methods = WC()->session->get('chosen_shipping_methods');

  // Check if we have chosen a shipping method and if it matches 'local_pickup:2'
  if (!empty($chosen_methods) && $chosen_methods[0] === 'local_pickup:2') {
    // If local pickup is chosen, make 'billing_company' field not required
    // if (isset($fields['billing_company'])) {
    //   $fields['billing_company']['required'] = false;
    // }
  }

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
  wc_enqueue_js('function hideAddPress() {
  
  
    $("#billing_country_field").addClass("hidden");
  
    $("#billing_address_1_field").addClass("hidden");
    $("#billing_address_1_field input").val("");
  
    $("#billing_address_2_field").addClass("hidden");
    $("#billing_address_2_field input").val("");
  
    $("#billing_state_field").addClass("hidden");
    $("#billing_state_field input").val("");
  
    $("#billing_postcode_field").addClass("hidden");
    $("#billing_postcode_field input").val("");
  
    $("#billing_state_field").addClass("hidden");
    $("#billing_state_field input").val("");
  
    $("#billing_city_field").addClass("hidden");
    $("#billing_city_field input").val("");
  
    $(".woocommerce-NoticeGroup").addClass("hidden");
  }
  ');

  // Hide shipping on checkout shipping change
  wc_enqueue_js('function showAddPress() {
 
    $("#billing_country_field").removeClass("hidden hide");
    $("#billing_address_1_field").removeClass("hidden hide");
    $("#billing_address_2_field").removeClass("hidden hide");
    $("#billing_city_field").removeClass("hidden hide");
    $("#billing_state_field").removeClass("hidden hide");
    $("#billing_postcode_field").removeClass("hidden hide");
    $("#billing_state_field").removeClass("hidden hide");
    $("#billing_state_field").removeClass("hidden hide");
  }  ');


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
