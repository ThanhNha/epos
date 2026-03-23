<?php
class GMT_Events
{
  public function __construct()
  {
    add_action('wp_footer', array($this, 'gtm_add_to_cart_event'));
  }

  public function gtm_add_to_cart_event()
  {
?>
    <script>
      jQuery(document.body).on('added_to_cart', function(event, fragments, cart_hash, $button) {
        var product_id = $button.data('product_id');
        window.dataLayer = window.dataLayer || [];
        let data = {
          'event': 'add_to_cart',
          'ecommerce': {
            'currency': '<?php echo get_woocommerce_currency(); ?>',
            'value': $button.data('price') || 0,
            'items': [{
              'item_id': product_id,
              'item_name': $button.attr('aria-label') || 'Product',
              'quantity': $button.data('quantity') || 1
            }]
          }
        };
        console.log(data)
        window.dataLayer.push(data);
      });
    </script>
  <?php
  }
}

add_action('woocommerce_add_to_cart', 'gtm_add_to_cart_event', 10, 3);

function gtm_add_to_cart_event($cart_item_key, $product_id, $quantity)
{
  $product = wc_get_product($product_id);
  ?>
  <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
      event: 'add_to_cart',
      ecommerce: {
        currency: '<?php echo get_woocommerce_currency(); ?>',
        value: <?php echo $product->get_price(); ?>,
        items: [{
          item_id: '<?php echo $product_id; ?>',
          item_name: '<?php echo $product->get_name(); ?>',
          quantity: <?php echo $quantity; ?>
        }]
      }
    });
  </script>
<?php
}
