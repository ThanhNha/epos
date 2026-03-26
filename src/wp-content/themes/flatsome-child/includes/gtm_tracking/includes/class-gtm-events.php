<?php
class GMT_Events
{
  public function __construct()
  {
    add_action('woocommerce_add_to_cart', [$this, 'gtm_add_to_cart_event'], 10, 3);
  }

  public function gtm_add_to_cart_event($cart_item_key, $product_id, $quantity)
  {
    $product = wc_get_product($product_id);
    if (!$product) return;

    $currency = get_woocommerce_currency() ?: 'SGD';
    $price    = $product->get_price() ? floatval($product->get_price()) : 0;
    $name     = $product->get_name() ? esc_js($product->get_name()) : 'EPOS Product';
    $qty      = $quantity ? intval($quantity) : 1;
?>
    <script>
      window.dataLayer = window.dataLayer || [];

      window.dataLayer.push({
        event: 'add_to_cart',
        ecommerce: {
          currency: '<?php echo esc_js($currency); ?>',
          value: <?php echo $price; ?>,
          items: [{
            item_id: '<?php echo esc_js($product_id); ?>',
            item_name: '<?php echo $name; ?>',
            quantity: <?php echo $qty; ?>
          }]
        }
      });

      console.log(window.dataLayer);
    </script>
<?php
  }
}
