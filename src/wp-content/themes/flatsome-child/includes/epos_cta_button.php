<?php
function floating_mail_shortcode() {
    ob_start();
    ?>
    <a class="floating-mail-btn" href="/contact-us">
        <img width="30" height="30"  src="https://www.epos.com.sg/wp-content/uploads/2025/07/envelope-solid-full-1.svg" alt="Mail Us">
    </a>
    <?php
    return ob_get_clean();
}
add_shortcode('floating_mail', 'floating_mail_shortcode');

add_action('wp_footer', function() {
    echo do_shortcode('[floating_mail]');
});
