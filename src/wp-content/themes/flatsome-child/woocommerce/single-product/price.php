<?php

/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;

$classes = array();
if ($product->is_on_sale()) $classes[] = 'price-on-sale';
if (!$product->is_in_stock()) $classes[] = 'price-not-in-stock'; ?>
<?php

$product_categories = get_the_terms($product->id, 'product_cat');

if (!empty($product_categories)) : ?>
	<?php
	$is_hidden = false;
	foreach ($product_categories as $prod_term) {
		$cate = get_term_by('ID', $prod_term->parent, 'product_cat');
		if ($prod_term->slug == 'pos-terminal' || $cate->slug == 'pos-terminal') {
			$is_hidden = true;
		}
	}
	if (!$is_hidden) : ?>
		<div class="price-wrapper">
			<p class="price product-page-price <?php echo implode(' ', $classes); ?>">
				<?php echo $product->get_price_html(); ?></p>
		</div>
	<?php endif; ?>
<?php endif; ?>
