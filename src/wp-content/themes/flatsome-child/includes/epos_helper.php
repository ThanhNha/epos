<?php
function pr($data)
{
  echo '<style>
  #debug_wrapper {
    position: fixed;
    top: 0px;
    left: 0px;
    z-index: 999;
    background: #fff;
    color: #000;
    overflow: auto;
    width: 100%;
    height: 100%;
  }</style>';
  echo '<div id="debug_wrapper"><pre>';

  print_r($data); // or var_dump($data);
  echo "</pre></div>";
  die;
}
function deduct_the_amount_shipping_fee($subtotal, $shipping_fee)
{
  $has_peripherals   = is_product_in_category('peripherals');
  if (empty($subtotal) || empty($shipping_fee) || $has_peripherals) return;
  if ($shipping_fee <= $subtotal) return;

  return '*Buy ' . get_woocommerce_currency_symbol() . $shipping_fee - $subtotal . ' more to enjoy free shipping!';
}


function calculator_subtotal_price()
{
  global $woocommerce;
  $service_total_price = 0;
  foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {
    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
      $product_id = $_product->get_ID();

      // check if belongto Product Services
      $terms = get_the_terms($product_id, 'product_cat');
      $is_product_online_support = false;
      $is_product_on_site_support = false;
      foreach ($terms as $term) {
        $cat_slug = $term->slug;
        if ($cat_slug == 'online-support') $is_product_online_support = true;
        if ($cat_slug == 'on-site-support') $is_product_on_site_support = true;
        break;
      }
      if ($is_product_online_support)  $service_total_price += $_product->price;
    }
  }
  if ($is_product_on_site_support) {
    return 0;
  } else {
    $subtotal_price = $woocommerce->cart->get_subtotal() - $service_total_price;
    return $subtotal_price;
  }
}

function is_product_in_category($category_slug, $find_parent = false)
{

  global $woocommerce;
  $is_product_service = false;

  foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {
    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
      $product_id = $_product->get_ID();

      // check if belongto Product Services
      $terms = get_the_terms($product_id, 'product_cat');

      foreach ($terms as $term) {
        $cat_slug = $term->slug;
        if ($term->parent > 0 && $find_parent == false) {
          $parent = get_term_by("ID", $term->parent, "product_cat");
          $cat_slug = $parent->slug;
        }
        // Stop if is On Site Support 
        if ($cat_slug == $category_slug) {
          $is_product_service = true;
          break;
        }
      }
    }
    if ($is_product_service) break;
  }
  return $is_product_service;
}

function only_in_category($category_slug)
{

  global $woocommerce;
  $is_only_service = true;

  foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {
    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
      $product_id = $_product->get_ID();

      // check if belongto Product Services
      $terms = get_the_terms($product_id, 'product_cat');

      foreach ($terms as $term) {
        $cat_slug = $term->slug;
        // Stop if is On Site Support 
        if ($cat_slug != $category_slug) {
          $is_only_service = false;
          break;
        }
      }
    }
    if (!$is_only_service) break;
  }
  return $is_only_service;
}


function get_tax_percent()
{
  $all_tax_rates = [];
  $tax_classes = WC_Tax::get_tax_classes();
  if (!in_array('', $tax_classes)) {
    array_unshift($tax_classes, '');
  }

  foreach ($tax_classes as $tax_class) {
    $taxes = WC_Tax::get_rates_for_tax_class($tax_class);
    $all_tax_rates = array_merge($all_tax_rates, $taxes);
  }

  if (empty($all_tax_rates)) return;
  return $all_tax_rates[0];
}

// About us page
add_action('wp_head', 'epos_add_about_us_schema');
function epos_add_about_us_schema()
{

  if (is_page('about-us')) {

?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "AboutPage",
        "@id": "https://www.epos.com.sg/about-us/#aboutpage",
        "url": "https://www.epos.com.sg/about-us/",
        "name": "About Us | EPOS POS System",
        "description": "At EPOS, we power growth. As Singapore's No.1 POS vendor, we equip businesses with cutting-edge technology to increase sales, streamline operations, and build lasting customer relationships—helping over 6,000 businesses thrive since 2009.",
        "inLanguage": "en-SG",
        "mainEntity": {
          "@type": "Organization",
          "@id": "https://www.epos.com.sg/#organization",
          "name": "EPOS Pte. Ltd.",
          "url": "https://www.epos.com.sg/",
          "logo": {
            "@type": "ImageObject",
            "url": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp",
            "width": "1509",
            "height": "662"
          },
          "description": "EPOS is the leading POS system provider in Singapore. We empower small businesses with a wide range of technology that boosts sales, enhances operational efficiency, and fosters customer loyalty.",
          "foundingDate": "2009",
          "slogan": "Your Success Matters",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "2 Leng Kee Road, #02-07 Thye Hong Centre",
            "addressLocality": "Singapore",
            "postalCode": "159086",
            "addressCountry": "SG"
          },
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+65-8482-1888",
            "contactType": "customer service",
            "email": "hello@epos.com.sg",
            "availableLanguage": ["English"],
            "hoursAvailable": {
              "@type": "OpeningHoursSpecification",
              "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday"
              ],
              "opens": "00:00",
              "closes": "23:59"
            }
          },
          "sameAs": [
            "https://www.facebook.com/epossg",
            "https://www.instagram.com/epossg/",
            "https://www.youtube.com/@epospossystemsingapore9807",
            "https://www.linkedin.com/company/14524422",
            "https://www.xiaohongshu.com/user/profile/5ecf5cbc000000000100162e"
          ],
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "reviewCount": "3000",
            "bestRating": "5",
            "worstRating": "1"
          },
          "numberOfEmployees": {
            "@type": "QuantitativeValue",
            "value": "50"
          },
          "areaServed": {
            "@type": "Country",
            "name": "Singapore"
          }
        },
        "mainContentOfPage": {
          "@type": "WebPageElement",
          "about": [{
              "@type": "Thing",
              "name": "Client First",
              "description": "Your Success, Our Priority. By deeply understanding your needs, we build trust, nurture long-term relationships, and celebrate your growth as our own."
            },
            {
              "@type": "Thing",
              "name": "Growth Mindset",
              "description": "Always Learning, Always Improving. We embrace change, push beyond limits, and seek smarter solutions every day."
            },
            {
              "@type": "Thing",
              "name": "Integrity Always",
              "description": "Principles Over Shortcuts. We hold ourselves to the highest standards, choosing honesty and accountability over convenience."
            },
            {
              "@type": "Thing",
              "name": "One EPOS",
              "description": "Stronger Together. We believe in collaboration, support, and unity. Our collective success is what drives us forward."
            }
          ]
        },
        "specialty": [
          "Retail POS Systems",
          "F&B POS Systems",
          "Minimart POS Systems",
          "Payment Terminals",
          "Loyalty Programmes",
          "Digital Transformation"
        ],
        "award": [
          "IMDA Partner Appreciation Evening 2019",
          "IMDA Partner Appreciation Evening 2023",
          "The Asset Asian Awards - Best Payments & Collections Solution"
        ]
      }
    </script>
<?php
  }
}
