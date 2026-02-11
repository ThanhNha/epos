<?php
add_action('wp_footer', function () {

    if (!is_front_page()) {
        return;
    }
?>
    <div id="BlueTap-Promo" class="bluetap-promo">
        <a href="/product/epos360-bluetap/" rel="noopener noreferrer">
            <div class="bluetap-promo-overlay"></div>

            <div class="bluetap-promo-content">
                <button class="bluetap-promo-close" aria-label="Close popup">×</button>

                <?php echo do_shortcode('[block id="bluetap-promo"]'); ?>
            </div>
        </a>
    </div>
<?php
});
