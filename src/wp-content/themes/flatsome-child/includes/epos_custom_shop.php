<?php
add_action('pre_get_posts', 'custom_sort_by_subcategory');

function custom_sort_by_subcategory($query)
{
  // Check if it's the main query, not in admin, and is a product category page
  if (!is_admin() && $query->is_main_query() && is_product_category()) {
    if (!isset($_GET['orderby']) || $_GET['orderby'] == 'category') {
      $current_cat = get_queried_object();
      if ($current_cat && isset($current_cat->term_id)) {
        $cat_id = $current_cat->term_id;

        // Get subcategories
        $subcategories = get_terms(array(
          'taxonomy'   => 'product_cat',
          'child_of'   => $cat_id,
          'orderby' => 'id',
          'hide_empty' => false,
          'fields'     => 'ids',
        ));

        if ($subcategories) {
          // Create an array to use as the sorting order
          $order = array();
          foreach ($subcategories as $subcat_id) {
            $order = array_merge($order, get_objects_in_term($subcat_id, 'product_cat'));
          }
          //Store current product cate
          $current_product = array();
          $current_product = array_merge($current_product, get_objects_in_term($cat_id, 'product_cat'));
          // Modify query to sort by subcategory order
          $all_post_order = array_merge($order, $current_product);

          $query->set('post__in', $all_post_order);
          $query->set('orderby', 'post__in');
        }
      }
    }
  }
}


add_filter('woocommerce_catalog_orderby', 'load_custom_woocommerce_catalog_sorting');

function load_custom_woocommerce_catalog_sorting($options)
{
  $options['category'] = 'Sort by category';
  return $options;
}

add_filter('woocommerce_default_catalog_orderby',    'custom_default_catalog_orderby');

function custom_default_catalog_orderby()
{
  return 'category'; // Can also use title and price
}
// add_filter( 'woocommerce_get_catalog_ordering_args', 'sort_by_name_woocommerce_shop' );

// function sort_by_name_woocommerce_shop( $args ) { 
//    $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
//    if ( 'category' == $orderby_value ) {
//       $args['orderby'] = 'category';
//       $args['order'] = 'DESC';
//    } 
//    return $args;
// }

add_filter('woocommerce_get_breadcrumb', 'remove_shop_crumb_page', 20, 2);
function remove_shop_crumb_page($crumbs, $breadcrumb)
{

  foreach ($crumbs as $key => $crumb) {


    if (strpos($crumbs[$key][0], "Page") === 0) {
      unset($crumbs[$key]);
    }
  }
  return $crumbs;
}
