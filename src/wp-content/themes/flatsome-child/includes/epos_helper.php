<?php
function deduct_the_amount_shipping_fee($subtotal, $shipping_fee)
{

  if (empty($subtotal) || empty($shipping_fee)) return;
  if ($shipping_fee <= $subtotal) return;

  return '*Buy ' . get_woocommerce_currency_symbol() . $shipping_fee - $subtotal . ' more to enjoy free shipping!';
}


