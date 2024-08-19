<?php

/**
 * Display product description on card Product
 *
 */

add_action('woocommerce_after_shop_loop_item_title', 'display_short_description_below_title', 2);

function display_short_description_below_title()
{
  global $product;

  $description = $product->get_short_description();

  $des_text = !empty($description) ? '<div class="product-description">' . $description . '</div>' : '';

  $des_text = '<div class="product-description">' . $des_text . '</div>';

  echo $des_text;
}

/**
 * Change Message Prdoduct Not Found
 *
 */
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
 * Hide Product Out Stock
 *
 */

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

    $query->set('meta_query', $meta_query);
  }
}

/**
 * Hide Product Has Status Private
 *
 */
add_filter('posts_where', 'hide_private_products');

function hide_private_products($where)
{
  if (is_admin()) return $where;
  global $wpdb;
  return " $where AND {$wpdb->posts}.post_status != 'private' ";
}

/**
 * Custom Order Thank You Message
 *
 */

add_filter('woocommerce_thankyou_order_received_text', 'change_text_thankyou');
function change_text_thankyou()
{
  $added_text = '<p class="success-color woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><strong>Thank you. Your order has been received. <br>
  <br>*We would contact you for the arrangement within 1 working day.</strong></p>';
  return $added_text;
}

/**
 * Custom Email Thank You Message
 *
 */

add_action('woocommerce_email_before_order_table', 'email_after_order_table', 10, 4);
function email_after_order_table($order, $sent_to_admin, $plain_text, $email)
{
  echo "<p>Thanks for shopping with us.<br> *We would contact you for the arrangement for 1 working day.</p>";
}

/**
 * Disable Product Gallery
 *
 */

add_action('woocommerce_before_single_product', function () {
  add_filter('woocommerce_product_get_gallery_image_ids', '__return_empty_array');
});

/**
 * Hide Shipping Method in Cart Page 
 *
 */


function disable_shipping_calc_on_cart($show_shipping)
{
  if (is_cart()) {
    return false;
  }
  return $show_shipping;
}
add_filter('woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99);

/**
 *
 * Hide Product On Shop Page To Show Product Categories
 */

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

/**
 *
 * CallBack Update Total Cart After Change Product Quantity Items
 */

add_filter('woocommerce_checkout_cart_item_quantity', 'checkout_item_quantity_input', 9999, 3);

function checkout_item_quantity_input($product_quantity, $cart_item, $cart_item_key)
{
  $product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
  $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
  if (!$product->is_sold_individually()) {
    $product_quantity = woocommerce_quantity_input(array(
      'input_name'  => 'shipping_method_qty_' . $product_id,
      'input_value' => $cart_item['quantity'],
      'max_value'   => $product->get_max_purchase_quantity(),
      'min_value'   => '0',
    ), $product, false);
    $product_quantity .= '<input type="hidden" name="product_key_' . $product_id . '" value="' . $cart_item_key . '">';
  }
  return $product_quantity;
}


/**
 *
 * Detect Quantity Change and Recalculate Totals
 */

add_action('woocommerce_checkout_update_order_review', 'callback_update_item_quantity_checkout');

function callback_update_item_quantity_checkout($post_data)
{
  parse_str($post_data, $post_data_array);
  $updated_qty = false;
  foreach ($post_data_array as $key => $value) {
    if (substr($key, 0, 20) === 'shipping_method_qty_') {
      $id = substr($key, 20);
      WC()->cart->set_quantity($post_data_array['product_key_' . $id], $post_data_array[$key], false);
      $updated_qty = true;
    }
  }
  if ($updated_qty) WC()->cart->calculate_totals();
}

/**
 * Add Notice Location Pickup
 *
 */

add_action('woocommerce_cart_totals_after_shipping', 'shipping_method_custom_notice');
add_action('woocommerce_review_order_after_shipping', 'shipping_method_custom_notice');
function shipping_method_custom_notice()
{

  $targeted_shipping_methods = array('local_pickup:2');
  // Get the chosen shipping methods
  $chosen_methods = WC()->session->get('chosen_shipping_methods');
  if (! empty($chosen_methods)) {
    $chosen_method = reset($chosen_methods);
    // Check if the chosen shipping method is in the targeted list
    if (in_array($chosen_method, $targeted_shipping_methods)) {
      echo '<tr class="shipping">
                <td colspan="2" style="text-align:left"> Pickup location: 2 Leng Kee Road, #02-07
Thye Hong Centre
Singapore 159086</td>
            </tr>';
    }
  }
}
