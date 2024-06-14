<?php

use RankMath\Helpers\Arr;

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

  // var_dump($states['SG']);
  // die();

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
