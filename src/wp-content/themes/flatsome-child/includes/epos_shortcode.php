<?php

add_action('woocommerce_after_shop_loop_item', 'add_to_cart_button', 15);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart');

function add_to_cart_button()
{
  global $product;
  $product_id = $product->get_id();


  $product_categories = get_the_terms($product->id, 'product_cat');

  if (!empty($product_categories)) : ?>
    <?php
    $is_hidden = false;
    foreach ($product_categories as $prod_term) {
      $cate = get_term_by('ID', $prod_term->parent, 'product_cat');
      if (isset($prod_term->slug) && $prod_term->slug == 'pos-terminal' || $prod_term->slug == 'pos-terminal') {
        $is_hidden = true;
      }
    }
    if ($is_hidden) : ?>

      <div class="add-to-cart-button"><a class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-gloss" href="/contact-us">Contact Sales Now</a></div>

    <?php else : ?>
      <?php
      echo '<div class="add-to-cart-button"><a class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-gloss" href="#order-popup-' . $product_id . '">Add to cart</a></div>';
      echo do_shortcode('[lightbox id="order-popup-' . $product_id . '" width="800px" padding="15px" ][product_add_to_cart id="' . $product_id . '"][/lightbox]');
      ?>
    <?php endif; ?>
  <?php else : ?>
    <?php
    echo '<div class="add-to-cart-button"><a class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-gloss" href="#order-popup-' . $product_id . '">Add to cart</a></div>';
    echo do_shortcode('[lightbox id="order-popup-' . $product_id . '" width="800px" padding="15px" ][product_add_to_cart id="' . $product_id . '"][/lightbox]');
    ?>
  <?php endif; ?>

<?php

}


add_shortcode('product_add_to_cart', 'callback_add_to_cart_button');

function callback_add_to_cart_button($product_id)
{
  $product_id = shortcode_atts(array(
    'id' => null,
  ), $product_id, 'product_details');


  if (!$product_id['id']) {
    return 'Product ID is required';
  }


  $product = wc_get_product($product_id['id']);
?>
  <div class="product-popup-addtocart">
    <div class="product-container">
      <div class="product-main">
        <div class="row content-row mb-0">
          <div class="product-gallery col large-4">
            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id['id']), 'single-post-thumbnail'); ?>

            <img src="<?php echo $image[0]; ?>" data-id="<?php echo $product_id['id'] ?>">
          </div>
          <div class="product-details col large-8">
            <?php do_action('woocommerce_single_product_summary'); ?>
          </div>
        </div>
      </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg></button>
  </div>

<?php
}
