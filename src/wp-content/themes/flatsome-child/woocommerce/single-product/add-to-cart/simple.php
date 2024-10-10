<?php

/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;

// if (!$product->is_purchasable()) {
// 	return;
// }

?>

<?php
// Availability
$availability      = $product->get_availability();
$availability_html = empty($availability['availability']) ? '' : '<p class="stock ' . esc_attr($availability['class']) . '">' . esc_html($availability['availability']) . '</p>';

echo apply_filters('woocommerce_stock_html', $availability_html, $availability['availability'], $product);
?>

<?php if ($product->is_in_stock()) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
		<?php do_action('woocommerce_before_add_to_cart_button'); ?>

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
			if ($is_hidden) : ?>
				<button type="button" class="single_add_to_cart_button button alt view-all hvr-bounce-to-right shop_add_cart add_cart_second_btn"><a href="/contact-us">Contact Sales Now</a></button>

			<?php else : ?>

				<?php
				do_action('woocommerce_before_add_to_cart_quantity');

				woocommerce_quantity_input(
					array(
						'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
						'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
						'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
					)
				);

				do_action('woocommerce_after_add_to_cart_quantity');
				?>

				<input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>" />

				<button type="submit" class="single_add_to_cart_button button alt view-all hvr-bounce-to-right shop_add_cart add_cart_second_btn"><?php echo esc_html($product->add_to_cart_text()) ?></button>

			<?php endif; ?>

		<?php else : ?>
			<?php
			do_action('woocommerce_before_add_to_cart_quantity');

			woocommerce_quantity_input(
				array(
					'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
					'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
					'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				)
			);

			do_action('woocommerce_after_add_to_cart_quantity');
			?>
			<input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>" />

			<button type="submit" class="single_add_to_cart_button button alt view-all hvr-bounce-to-right shop_add_cart add_cart_second_btn"><?php echo esc_html($product->add_to_cart_text()) ?></button>


		<?php endif; ?>
		<?php do_action('woocommerce_after_add_to_cart_button'); ?>
	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

<?php endif; ?>
