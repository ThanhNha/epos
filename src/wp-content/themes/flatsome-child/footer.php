<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>

</main>

<footer id="footer" class="footer-wrapper">

	<?php do_action('flatsome_footer'); ?>

</footer>

</div>

<?php wp_footer(); ?>

<a href="https://api.whatsapp.com/send/?phone=6584821888&text&type=phone_number&app_absent=0" target="_blank" id="epos-whatsapp" class="epos-whatsapp-icon">
	<img src="<?php echo THEME_URL . '-child/assets/icons/contact-icon.png'?>" alt="to EPOS WhatsApp Chat" width="50" height="50">
</a>

</body>
</html>
