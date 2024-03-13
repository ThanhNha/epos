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
