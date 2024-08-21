<?php
function pr($data)
{
  echo '<style>
  #debug_wrapper {
    position: fixed;
    top: 0px;
    left: 0px;
    z-index: 999;
    background: #fff;
    color: #000;
    overflow: auto;
    width: 100%;
    height: 100%;
  }</style>';
  echo '<div id="debug_wrapper"><pre>';

  print_r($data); // or var_dump($data);
  echo "</pre></div>";
  die;
}
function deduct_the_amount_shipping_fee($subtotal, $shipping_fee)
{
  if (empty($subtotal) || empty($shipping_fee)) return;
  if ($shipping_fee <= $subtotal) return;

  return '*Buy ' . get_woocommerce_currency_symbol() . $shipping_fee - $subtotal . ' more to enjoy free shipping!';
}


function calculator_subtotal_price()
{
  global $woocommerce;
  $service_total_price = 0;
  foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {
    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
      $product_id = $_product->get_ID();

      // check if belongto Product Services
      $terms = get_the_terms($product_id, 'product_cat');
      $is_product_online_support = false;
      $is_product_on_site_support = false;
      foreach ($terms as $term) {
        $cat_slug = $term->slug;
        if ($cat_slug == 'online-support') $is_product_online_support = true;
        if ($cat_slug == 'on-site-support') $is_product_on_site_support = true;
        break;
      }
      if ($is_product_online_support)  $service_total_price += $_product->price;
    }
  }
  if ($is_product_on_site_support) {
    return 0;
  } else {
    $subtotal_price = $woocommerce->cart->get_subtotal() - $service_total_price;
    return $subtotal_price;
  }
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
