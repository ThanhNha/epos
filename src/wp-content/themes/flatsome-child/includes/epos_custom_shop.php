<?php
add_action('pre_get_posts', 'custom_sort_by_subcategory');

function custom_sort_by_subcategory($query)
{
  // Check if it's the main query, not in admin, and is a product category page
  if (!is_admin() && $query->is_main_query() && is_product_category()) {
    $current_cat = get_queried_object();
    if ($current_cat && isset($current_cat->term_id)) {
      $cat_id = $current_cat->term_id;

      // Get subcategories
      $subcategories = get_terms(array(
        'taxonomy'   => 'product_cat',
        'child_of'   => $cat_id,
        'hide_empty' => false,
        'fields'     => 'ids',
      ));

      if ($subcategories) {
        // Create an array to use as the sorting order
        $order = array();
        foreach ($subcategories as $subcat_id) {
          $order = array_merge($order, get_objects_in_term($subcat_id, 'product_cat'));
        }

        // Modify query to sort by subcategory order
        $query->set('post__in', $order);
        $query->set('orderby', 'post__in');
      }
    }
  }
}


add_filter('woocommerce_get_breadcrumb', 'remove_shop_crumb_page', 20, 2);
function remove_shop_crumb_page($crumbs, $breadcrumb)
{
  // pr($crumbs);

  foreach ($crumbs as $key => $crumb) {


    if (strpos($crumbs[$key][0], "Page") === 0) {
      unset($crumbs[$key]);
    }
  }
  return $crumbs;
}
