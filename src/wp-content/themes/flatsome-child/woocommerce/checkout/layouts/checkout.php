<?php
// Default checkout layout
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
	wc_get_template('checkout/header.php');

	echo '<div class="cart-container container page-wrapper page-checkout">';
	wc_print_notices();
	the_content();
	echo '</div>';
	?>

<?php endwhile; // end of the loop. 
?>

<!-- Add the Related product -->

<?php		get_template_part('template-parts/cart/related', 'product');?>

<?php get_footer(); ?>
