<?php
function floating_mail_shortcode() {
    ob_start();
    ?>
    <a class="floating-mail-btn" href="/contact-us">
        <img width="50" height="50"  src="https://www.epos.com.sg/wp-content/uploads/2026/03/Sticky-CTA-Icons-Mail.webp" alt="Mail Us" namespace="btn-cta-email">
    </a>
    <?php
    return ob_get_clean();
}
add_shortcode('floating_mail', 'floating_mail_shortcode');

add_action('wp_footer', function() {
    echo do_shortcode('[floating_mail]');
});
