<?php


add_action('woocommerce_after_shop_loop_item_title', 'display_short_description_below_title', 2);

function display_short_description_below_title()
{
  global $product;

  $description = $product->get_short_description();

  $des_text = !empty($description) ? $description : '<div></div>';

  $des_text = '<div class="product-description">' . $des_text . '</div>';

  echo $des_text;
}

add_action('wp_head', 'change_no_products_found_text');
function change_no_products_found_text()
{
  // Remove the original code that uses the no-products-found.php template.
  remove_action('woocommerce_no_products_found', 'wc_no_products_found');
  // and add in my own code.
  add_action('woocommerce_no_products_found', 'dcwd_no_products_found');
}

function dcwd_no_products_found()
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

add_filter('woocommerce_package_rates', 'override_ups_rates', 999);
function override_ups_rates($rates)
{
  global $woocommerce;
  $carttotal = $woocommerce->cart->subtotal;
  $flat_rate_cost = 100; // Adjust this value as needed
  foreach ($rates as $rate_key => $rate) {
    // Check if the shipping method ID is flat_rate
    if ($rate->method_id == 'flat_rate') {
      // Set cost based on cart total
      if ($carttotal >= 150) {
        $rates[$rate_key]->cost = 0;
        $rates[$rate_key]->label = 'Free shipping';
      } else {
        $rates[$rate_key]->cost = $flat_rate_cost;
      }
    }
  }

  return $rates;
}

add_action('woocommerce_product_query', 'storeapps_exclude_categories_from_shop_page');
function storeapps_exclude_categories_from_shop_page($q)
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
