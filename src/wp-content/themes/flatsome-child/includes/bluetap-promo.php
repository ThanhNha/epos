<?php
add_action('wp_footer', function () {

    if (!is_product()) {
        return;
    }

    global $post;
    if ($post->post_name !== 'epos360-bluetap') {
        return;
    }
?>
    <div id="BlueTap-Promo" class="bluetap-promo">
        <div class="bluetap-promo-overlay"></div>

        <div class="bluetap-promo-content">
            <button class="bluetap-promo-close" aria-label="Close popup">×</button>

            <?php echo do_shortcode('[block id="bluetap-promo"]'); ?>
        </div>
    </div>
<?php
});
