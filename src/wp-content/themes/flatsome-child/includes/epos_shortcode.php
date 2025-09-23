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
  <div class="shin-popup">
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


add_action('wp_footer', 'shipping_tool_callback');
function shipping_tool_callback()
{
  if (is_checkout()) {
    echo do_shortcode('[button text="Lightbox Button" class="hidden toogle_shipping_popup" link="#shipping_tool"][lightbox id="shipping_tool" width="600px" padding="20px"]
    <div class="shin-popup">
     <div class="popup-content">
       <p><strong>Shipping Fee Policy:</strong></p>
       <p>
         (1) Miscellaneous Products:
         - For orders below $150: A shipping fee of $38 will be applied.
         - For orders of $150 or more: Free shipping.
       </p>
       <p>
         (2) Peripherals Products:
         A flat shipping fee of $50 will be applied, which includes installation services.
       </p>
  
  
       <p>(3) Onsite Support Service:
         If onsite support service is purchased, shipping is free for all items in the order.</span></p>
       
     </div>
   </div>
   
  [/lightbox]');
  }
}


// Shortcode Jobs
function jobs_available_shortcode($atts)
{
  ob_start();

  $departments = get_terms(array(
    'taxonomy'   => 'department',
    'hide_empty' => true
  ));

  if (!empty($departments) && !is_wp_error($departments)) {
  ?>
    <div class="jobs-available-wrapper">
      <div class="row">
        <?php foreach ($departments as $dept) :
          $image_id  = get_term_meta($dept->term_id, 'department_image', true);
          $image_url = wp_get_attachment_url($image_id);

          $jobs_query = new WP_Query(array(
            'post_type'      => 'jobs',
            'posts_per_page' => -1,
            'tax_query'      => array(
              array(
                'taxonomy' => 'department',
                'field'    => 'term_id',
                'terms'    => $dept->term_id
              )
            )
          ));
        ?>
          <div class="col medium-6 large-4">
            <div class="job-card">
              <div class="job-icon">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($dept->name); ?>">
              </div>
              <h5 class="department-title uppercase"><?php echo esc_html($dept->name); ?></h5>

              <?php if ($jobs_query->have_posts()) : ?>
                <ul class="job-list">
                  <?php while ($jobs_query->have_posts()) : $jobs_query->the_post(); ?>
                    <?php
                    $post_id  = get_the_ID();
                    $title    = get_the_title($post_id);
                    $content  = apply_filters('the_content', get_post_field('post_content', $post_id));

                    ob_start(); ?>
                    <div class="careers-popup">
                      <h3 class="popup-title"><?php echo esc_html($title); ?></h3>
                      <div class="popup-body">
                        <?php echo $content; ?>
                      </div>
                      <div class="popup-footer">
                        <a href="#contact" class="button primary apply-btn">Apply Now</a>
                      </div>
                    </div>
                    <?php
                    $popup_inner = ob_get_clean();
                    $lightbox_sc = '[lightbox id="job-popup-' . $post_id . '" width="800px" padding="20px"]' . $popup_inner . '[/lightbox]';
                    ?>
                    <li class="job-item">
                      <a href="#job-popup-<?php echo esc_attr($post_id); ?>" class="open-popup-link">
                        <?php echo esc_html($title); ?>
                      </a>

                      <?php
                      echo do_shortcode($lightbox_sc);
                      ?>
                    </li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        <?php
          wp_reset_postdata();
        endforeach; ?>
      </div>
    </div>
<?php
  }

  return ob_get_clean();
}
add_shortcode('jobs_available', 'jobs_available_shortcode');
