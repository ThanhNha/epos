<?php

/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) {
  exit;
}

global $product;

$product_categories = get_the_terms($product->id, 'product_cat');
if (!empty($product_categories)) {
  $is_hidden = false;
  foreach ($product_categories as $prod_term) {
    if ($prod_term->slug == 'pos-terminal') {
      $is_hidden = true;
    }
  }
  if( $is_hidden){
    echo apply_filters(
      'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
      sprintf(
        '<a href="%s" class="%s">%s</a>',
        esc_url('tel:65 6871 8833'),
        'primary is-small mb-0 button  product_type_simple add_to_cart_button',
        esc_html('Contact Sales')
      ),
      $product,
      $args
    );
  }else{
    echo apply_filters(
      'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
      sprintf(
        '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
        esc_url($product->add_to_cart_url()),
        esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
        'primary is-small mb-0 button  product_type_simple add_to_cart_button',
        isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
        esc_html($product->add_to_cart_text())

      ),
      $product,
      $args
    );
  }
} else {
  echo apply_filters(
    'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
    sprintf(
      '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
      esc_url($product->add_to_cart_url()),
      esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
      esc_attr(isset($args['class']) ? $args['class'] : 'button'),
      isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
      esc_html($product->add_to_cart_text())
    ),
    $product,
    $args
  );
}
