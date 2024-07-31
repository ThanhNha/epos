<?php

//Display pr
add_action('woocommerce_after_shop_loop_item_title', 'display_short_description_below_title', 2);

function display_short_description_below_title()
{
  global $product;

  $description = $product->get_short_description();

  $des_text = !empty($description) ? '<div class="product-description">' . $description . '</div>' : '';

  $des_text = '<div class="product-description">' . $des_text . '</div>';

  echo $des_text;
}

// // add_action('woocommerce_before_shop_loop_item_title', 'display_category_name', 2);

// function display_category_name()
// {
//   global $product;

//   $cat_ids = $product->get_category_ids(); // returns an array of cat IDs
//   var_dump($cat_ids);
//   $cat_names = [];

//   foreach ((array) $cat_ids as $cat_id) {
//     $cat_term = get_term_by('id', (int)$cat_id, 'product_cat');
//     if ($cat_term) {
//       $cat_names[] = $cat_term->name;
//     }
//   }

//   $category = !empty($cat_names) ? $cat_names[array_key_first($cat_names)] : '';

//   // $des_text = !empty($description) ? '<div class="product-description">' . $category . '</div>' : '';

//   $des_text = '<p class="category uppercase is-smaller no-text-overflow product-cat op-7">' . $category . '</p>';

//   echo $des_text;
// }

add_action('wp_head', 'change_no_products_found_text');
function change_no_products_found_text()
{
  // Remove the original code that uses the no-products-found.php template.
  remove_action('woocommerce_no_products_found', 'wc_no_products_found');
  // and add in my own code.
  add_action('woocommerce_no_products_found', 'display_no_products_found');
}

function display_no_products_found()
{
  // Use the original message in case one of the conditions below is not met.
  $message = 'No products were found matching your selection.';

  if (is_product_category()) :
    $message = sprintf('More products are coming soon.');
?>
    <div class="message-container container medium-text-center">

      <?php echo $message; ?></div>

  <?php endif; ?>
<?php
}

/**
 * Add or modify States
 */
add_filter('woocommerce_states', 'custom_woocommerce_states');

function custom_woocommerce_states($states)
{

  $states['SG'] = array(
    'SG001' => 'Ang Mo Kio / Bishan',
    'SG002' => 'Bukit Panjang',
    'SG003' => 'Bedok',
    'SG004' => 'Bugis',
    'SG005' => 'Clarke Quay',
    'SG006' => 'Orchard-Tanglin',
    'SG007' => 'Harbourfront',
    'SG008' => 'Sentosa',
    'SG009' => 'Chinatown',
    'SG010' => 'Katong',
    'SG011' => 'Geylang',
  );

  return $states;
}

// add_action('pre_get_posts', 'hide_out_of_stock_products');

function hide_out_of_stock_products($query)
{
  if (!is_admin() && $query->is_main_query() && (is_shop() || is_product_category() || is_product_tag())) {
    $meta_query = $query->get('meta_query');
    $meta_query[] = array(
      array(
        'key' => '_stock_status',
        'value' => 'outofstock',
        'compare' => '!='
      ),
      array(
        'key' => 'post_status',
        'value' => 'private',
        'compare' => '!='
      )
    );


    // var_dump($query);
    $query->set('meta_query', $meta_query);
  }
}

add_filter('posts_where', 'hide_private_products');

function hide_private_products($where)
{
  if (is_admin()) return $where;
  global $wpdb;
  return " $where AND {$wpdb->posts}.post_status != 'private' ";
}
add_filter('woocommerce_thankyou_order_received_text', 'change_text_thankyou');
function change_text_thankyou()
{
  $added_text = '<p class="success-color woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><strong>Thank you. Your order has been received. <br>
  <br>*We would contact you for the arrangement for 1 working day.</strong></p>';
  return $added_text;
}

add_action('woocommerce_email_before_order_table', 'mm_email_after_order_table', 10, 4);
function mm_email_after_order_table($order, $sent_to_admin, $plain_text, $email)
{
  echo "<p>Thanks for shopping with us.<br> *We would contact you for the arrangement for 1 working day.</p>";
}

add_filter('woocommerce_package_rates', 'override_ups_rates', 999);
function override_ups_rates($rates)
{
  global $woocommerce;
  // get the cart total_product price after minus price product support
  $all_free_rates = array();

  $carttotal = calculator_subtotal_price();
  $flat_rate_cost = 100; // Adjust this value as needed
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


// function no_shipping_for_woocomerce($rates, $package)
// {
//   $all_free_rates = array();
//   $only_has_product_service = is_only_support_product();

//   if ($only_has_product_service) {
//     foreach ($rates as $rate_id => $rate) {
//       if ('local_pickup' == $rate->method_id) {
//         $rates[$rate_id]->cost = 0;
//         $rates[$rate_id]->label = 'No shipping';
//         $all_free_rates[$rate_id] = $rate;
//         break;
//       }
//     }
//   }

//   if (empty($all_free_rates)) {
//     return $rates;
//   } else {
//     return $all_free_rates;
//   }
// }

// add_filter('woocommerce_package_rates', 'no_shipping_for_woocomerce', 10, 2);

// Hide Shipping Method in Cart Page 

function disable_shipping_calc_on_cart($show_shipping)
{
  if (is_cart()) {
    return false;
  }
  return $show_shipping;
}
add_filter('woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99);

add_action('woocommerce_product_query', 'exclude_categories_from_shop_page');
function exclude_categories_from_shop_page($q)
{
  $tax_query = (array) $q->get('tax_query');

  $tax_query[] = array(
    'taxonomy' => 'product_cat',
    'field' => 'slug',
    // 'terms' => array('uncategorized'), // Define an array of hidden categories.
    'operator' => 'NOT IN',
    'post_status' => 'private'
  );
  $q->set('tax_query', $tax_query);  // Return the modified tax query.
}

add_filter('woocommerce_checkout_fields', 'remove_billing_checkout_fields');
function remove_billing_checkout_fields($fields)
{
  // change below for the method
  $shipping_method = 'local_pickup:2';
  // change below for the list of fields
  $hide_fields = array('billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode');

  $chosen_methods = WC()->session->get('chosen_shipping_methods');

  $chosen_shipping = $chosen_methods[0];

  foreach ($hide_fields as $field) {
    if ($chosen_shipping == $shipping_method) {
      $fields['billing'][$field]['required'] = false;
      $fields['billing'][$field]['class'][] = 'hide';
    }
    $fields['billing'][$field]['class'][] = 'billing-dynamic';
  }

  return $fields;
}

add_action('woocommerce_after_checkout_form', 'disable_shipping_local_pickup');

function disable_shipping_local_pickup($available_gateways)
{

  // Hide shipping on checkout load
  $chosen_methods = WC()->session->get('chosen_shipping_methods');
  $chosen_shipping = $chosen_methods[0];
  if (0 === strpos($chosen_shipping, 'local_pickup')) {
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
}
