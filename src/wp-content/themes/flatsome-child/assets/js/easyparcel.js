(function () {

    function isCheckoutPage() {
        return document.body.classList.contains('woocommerce-checkout');
    }

    function replaceShippingLabel() {
        if (!isCheckoutPage()) return;

        var input = document.getElementById('shipping_method_0_ep-cs05k');
        if (!input) return;

        var label = document.querySelector('label[for="shipping_method_0_ep-cs05k"]');
        if (!label) return;

        if (label.textContent.trim() === 'Delivery') return;

        label.textContent = 'Delivery';
    }

    // DOM ready
    document.addEventListener('DOMContentLoaded', function () {
        if (isCheckoutPage()) {
            replaceShippingLabel();
        }
    });
wr
    // WooCommerce AJAX (checkout only)
    if (window.jQuery) {
        jQuery(document.body).on(
            'updated_checkout updated_shipping_method',
            function () {
                if (isCheckoutPage()) {
                    replaceShippingLabel();
                }
            }
        );
    }

    // MutationObserver
    var observer = new MutationObserver(function () {
        if (isCheckoutPage()) {
            replaceShippingLabel();
        }
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

})();

