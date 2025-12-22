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

add_action('wp_head', 'epos_add_knowledge_base_schema');
function epos_add_knowledge_base_schema()
{

  if (is_page('knowledge-base')) {

  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "name": "EPOS Knowledge Base",
        "url": "https://www.epos.com.sg/knowledge-base/",
        "description": "Find step by step guides, best practices and more to learn how to use the EPOS System",
        "publisher": {
          "@type": "Organization",
          "name": "EPOS Pte. Ltd.",
          "url": "https://www.epos.com.sg/",
          "logo": {
            "@type": "ImageObject",
            "url": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp"
          }
        },
        "mainEntity": {
          "@type": "ItemList",
          "numberOfItems": 10,
          "itemListElement": [{
              "@type": "ListItem",
              "position": 1,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/",
                "name": "FRONTEND",
                "description": "User Guide on our Frontend Ordering / Cashiering System"
              }
            },
            {
              "@type": "ListItem",
              "position": 2,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/knowledge-base-back-end/",
                "name": "BACKEND PORTAL",
                "description": "User Guide on our Backend Management Portal"
              }
            },
            {
              "@type": "ListItem",
              "position": 3,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end",
                "name": "Self-Service Kiosk",
                "description": "User Guide on our Self-Service Kiosk"
              }
            },
            {
              "@type": "ListItem",
              "position": 4,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/kitchen-display-system/",
                "name": "Kitchen Display System (KDS)",
                "description": "User Guide on our Kitchen Display System (KDS)"
              }
            },
            {
              "@type": "ListItem",
              "position": 5,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/stock-take-app/",
                "name": "Stock Take App",
                "description": "User Guide on our Stock take app"
              }
            },
            {
              "@type": "ListItem",
              "position": 6,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg//knowledge-base-back-end/erp-sales/payment-terminal/",
                "name": "Payment Terminal",
                "description": "User Guide on our Payment Terminal"
              }
            },
            {
              "@type": "ListItem",
              "position": 7,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/knowledge-base-front-end/soundbox/",
                "name": "Soundbox",
                "description": "User Guide on our Soundbox"
              }
            },
            {
              "@type": "ListItem",
              "position": 8,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/queue-display-system",
                "name": "Queue Display System (QDS)",
                "description": "User Guide on our Queue Display System (QDS)"
              }
            },
            {
              "@type": "ListItem",
              "position": 9,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/knowledge-base-release-updates/",
                "name": "RELEASE UPDATE",
                "description": "List of Updates that might make your business operate more smoothly"
              }
            }
          ]
        },
        "breadcrumb": {
          "@type": "BreadcrumbList",
          "itemListElement": [{
              "@type": "ListItem",
              "position": 1,
              "name": "Home",
              "item": "https://www.epos.com.sg/"
            },
            {
              "@type": "ListItem",
              "position": 2,
              "name": "Knowledge Base",
              "item": "https://www.epos.com.sg/knowledge-base/"
            }
          ]
        }
      }
    </script>
  <?php
  }
}


add_action('wp_head', 'epos_add_epos_recommends_schema');
function epos_add_epos_recommends_schema()
{

  if (is_page('epos-recommends')) {

  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "name": "EPOS Recommends",
        "url": "https://www.epos.com.sg/epos-recommends/",
        "description": "Curated recommendations, guides, and insights for small business owners in Singapore covering lifestyle, retail trends, POS systems, and business tips.",
        "publisher": {
          "@type": "Organization",
          "name": "EPOS Pte. Ltd.",
          "url": "https://www.epos.com.sg/",
          "logo": {
            "@type": "ImageObject",
            "url": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp"
          }
        },
        "mainEntity": {
          "@type": "ItemList",
          "numberOfItems": 45,
          "itemListElement": [{
              "@type": "ListItem",
              "position": 1,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/where-to-spend-your-300-climate-vouchers-given-to-every-hdb-household-by-nea-and-pub/",
                "name": "Where to Spend Your $300 Climate Vouchers Given To Every HDB Household by NEA and PUB",
                "description": "Upgrading your HDB home with energy and water-efficient appliances can cool your living space, lighten your bills, and help the planet.",
                "datePublished": "2024-11-24"
              }
            },
            {
              "@type": "ListItem",
              "position": 2,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/traditional-bakes-every-singaporean-grew-up-with-and-still-love-today/",
                "name": "Traditional Bakes Every Singaporean Grew Up With (And Still Love Today)",
                "description": "Singapore may be a modern city, but our love for traditional bakes has never faded.",
                "datePublished": "2024-11-14"
              }
            },
            {
              "@type": "ListItem",
              "position": 3,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/10-types-of-tea-leaves-every-singaporean-should-try-at-least-once/",
                "name": "10 Types of Tea Leaves Every Singaporean Should Try at Least Once",
                "description": "Tea is more than just a drink, it's a tradition, a ritual, and for many a moment of peace in a busy day.",
                "datePublished": "2024-11-07"
              }
            },
            {
              "@type": "ListItem",
              "position": 4,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/personalised-photo-gifts-that-never-go-out-of-style/",
                "name": "Personalised Photo Gifts That Never Go Out of Style",
                "description": "In a world full of digital everything, personalised photo gifts remain one of the most meaningful ways to show you care.",
                "datePublished": "2024-09-05"
              }
            },
            {
              "@type": "ListItem",
              "position": 5,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/6-reasons-why-the-rich-dont-drive-in-singapore/",
                "name": "6 Reasons Why the Rich Don't Drive in Singapore",
                "description": "In a city where every minute counts and prestige matters, it's no surprise that many wealthy Singaporeans choose not to drive.",
                "datePublished": "2024-08-08"
              }
            },
            {
              "@type": "ListItem",
              "position": 6,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/singaporeans-are-saving-over-1000-by-upgrading-their-fridges/",
                "name": "Singaporeans Are Saving Over $1,000 By Upgrading Their Fridges!",
                "description": "If your electricity bill has been creeping up lately, you're not alone. Many Singaporeans are discovering they can save over $1,000 by upgrading to energy-efficient fridges.",
                "datePublished": "2024-07-04"
              }
            },
            {
              "@type": "ListItem",
              "position": 7,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/budget-home-makeover-for-the-smart-shopper-2025-guide/",
                "name": "Budget Home Makeover for the Smart Shopper (2025 Guide)",
                "description": "Redecorating your home doesn't have to mean expensive renovations or designer makeovers.",
                "datePublished": "2024-06-20"
              }
            },
            {
              "@type": "ListItem",
              "position": 8,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/8-surprising-benefits-of-fabric-canopies-you-see-in-malls-parks-and-airports/",
                "name": "5 Surprising Benefits of the Canopies You See in Malls, Parks and Airports",
                "description": "Those sleek, flowing structures that provide shade and style across Singapore's public spaces.",
                "datePublished": "2024-06-13"
              }
            },
            {
              "@type": "ListItem",
              "position": 9,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/10-must-try-authentic-korean-restaurants-in-singapore/",
                "name": "10 Must-Try Authentic Korean Restaurants in Singapore",
                "description": "Korean food has become a global sensation, from the streets of Seoul to the heart of Singapore.",
                "datePublished": "2024-05-23"
              }
            },
            {
              "@type": "ListItem",
              "position": 10,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/best-taiwanese-fried-chicken-singapore/",
                "name": "Crispy, Juicy, and Totally Addictive: The Best Taiwanese Fried Chicken in Singapore",
                "description": "There's a new crunch taking over Singapore's food scene, and it's loud, juicy, and unapologetically Taiwanese.",
                "datePublished": "2024-05-09"
              }
            },
            {
              "@type": "ListItem",
              "position": 11,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/best-camera-shop-singapore/",
                "name": "Unplug and Capture: Why a Dedicated Camera Can Be Your Digital Detox Tool",
                "description": "In our hyper-connected world, the siren song of notifications and the endless scroll of social media can feel inescapable.",
                "datePublished": "2024-04-28"
              }
            },
            {
              "@type": "ListItem",
              "position": 12,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/7-ways-to-make-your-car-sound-like-a-concert-hall/",
                "name": "7 Ways to Make Your Car Sound Like a Concert Hall",
                "description": "Your car is more than just a mode of transportation; for many, it's a mobile sanctuary.",
                "datePublished": "2024-04-11"
              }
            },
            {
              "@type": "ListItem",
              "position": 13,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/top-7-must-buy-items-for-a-perfect-hari-raya-feast/",
                "name": "Top 7 Must-Buy Items for a Perfect Hari Raya Feast",
                "description": "Hari Raya Aidilfitri, a celebration of joy and togetherness, is synonymous with delicious food shared with loved ones.",
                "datePublished": "2024-03-28"
              }
            },
            {
              "@type": "ListItem",
              "position": 14,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/best-custom-pc-builder-singapore/",
                "name": "Build Your Dream Gaming PC: 2025 Guide",
                "description": "By 2025, gaming technology will have advanced significantly, with higher resolutions, more complex simulations, and immersive experiences.",
                "datePublished": "2024-03-21"
              }
            },
            {
              "@type": "ListItem",
              "position": 15,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/best-korean-fried-chicken/",
                "name": "The Ultimate Guide to Korean Fried Chicken Flavors You NEED to Try",
                "description": "Step aside, Kentucky. Korean fried chicken, or 'chikin,' is here to stay in the global culinary scene.",
                "datePublished": "2024-02-26"
              }
            },
            {
              "@type": "ListItem",
              "position": 16,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/what-is-a-payment-terminal/",
                "name": "What Is a Payment Terminal? A Complete Guide for Retailers",
                "description": "A payment terminal is more than a card reader; it's the link between your business and secure, efficient transactions.",
                "datePublished": "2024-11-14"
              }
            },
            {
              "@type": "ListItem",
              "position": 17,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/cloud-pos-vs-traditional-pos-which-system-is-best-for-your-business-in-2025/",
                "name": "Cloud POS vs Traditional POS: Which System Is Best for Your Business in 2025?",
                "description": "In today's fast-moving business environment, choosing the right Point-of-Sale (POS) system can make or break your operations.",
                "datePublished": "2024-07-09"
              }
            },
            {
              "@type": "ListItem",
              "position": 18,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/what-is-a-pos-system-2026/",
                "name": "What Is a POS System? A Complete Beginner's Guide for 2026",
                "description": "Running a business without a modern Point-of-Sale system means slower checkouts, manual inventory tracking, and missed opportunities.",
                "datePublished": "2024-07-07"
              }
            },
            {
              "@type": "ListItem",
              "position": 19,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/epos-soundbox-reliable-payment-solution/",
                "name": "EPOS Soundbox: Fast, Clear & Reliable Payment Solution for Food Stalls",
                "description": "Payment mistakes slow down service and frustrate customers. EPOS Soundbox eliminates confusion with instant audio confirmations.",
                "datePublished": "2024-06-30"
              }
            },
            {
              "@type": "ListItem",
              "position": 20,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/care-for-your-pos-machine-10-tips-every-business-owner-should-follow/",
                "name": "Care for Your POS Machine: 10 Tips Every Business Owner Should Follow",
                "description": "Your Point-of-Sale (POS) system is the heart of your daily operations. Proper maintenance ensures longevity and reliability.",
                "datePublished": "2024-06-27"
              }
            },
            {
              "@type": "ListItem",
              "position": 21,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/how-to-choose-the-best-pos-system-for-your-retail-business-2025-edition/",
                "name": "How to Choose the Best POS System for Your Retail Business (2025 Edition)",
                "description": "In today's fast-paced retail environment, having the right POS system can be the difference between success and stagnation.",
                "datePublished": "2024-06-25"
              }
            },
            {
              "@type": "ListItem",
              "position": 22,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/soundbox-vs-traditional-pos-which-payment-solution-is-best-for-your-business/",
                "name": "Soundbox vs Traditional POS: Which Payment Solution Is Best for Your Business?",
                "description": "In today's fast-moving digital economy, SMEs need fast, reliable, and simple payment solutions.",
                "datePublished": "2024-05-26"
              }
            },
            {
              "@type": "ListItem",
              "position": 23,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/6-hidden-costs-youre-losing-without-an-optimised-pos/",
                "name": "6 Hidden Costs You're Losing Without an Optimised POS",
                "description": "In today's fast-paced business environment, efficiency is paramount. An optimised POS system saves money you didn't know you were losing.",
                "datePublished": "2024-04-02"
              }
            },
            {
              "@type": "ListItem",
              "position": 24,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/7-ways-a-modern-pos-system-can-double-your-retail-profits/",
                "name": "7 Ways a Modern POS System Can Double Your Retail Profits",
                "description": "In today's highly competitive retail market, using the right technology is essential for business success.",
                "datePublished": "2024-03-07"
              }
            },
            {
              "@type": "ListItem",
              "position": 25,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/essential-inventory-reports/",
                "name": "5 Essential Inventory Reports You Can't Ignore",
                "description": "As a business owner, it's important to keep a close eye on your inventory and make data-driven decisions.",
                "datePublished": "2024-06-16"
              }
            },
            {
              "@type": "ListItem",
              "position": 26,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/inventory-reports-what-are-they/",
                "name": "Inventory Reports: What Are They and How to Use Them",
                "description": "For any business dealing with products or inventory, keeping track of it all can be a daunting task.",
                "datePublished": "2024-05-26"
              }
            },
            {
              "@type": "ListItem",
              "position": 27,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/what-is-inventory-management-software/",
                "name": "What Is Inventory Management Software?",
                "description": "Inventory management is crucial for any business that deals with products or services that require tracking.",
                "datePublished": "2024-05-12"
              }
            },
            {
              "@type": "ListItem",
              "position": 28,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/best-pos-system-singapore/",
                "name": "10 Best POS Systems in Singapore for SME Business Owners",
                "description": "Running a business in Singapore can be both challenging and rewarding. Finding the right POS system is crucial.",
                "datePublished": "2024-05-10"
              }
            },
            {
              "@type": "ListItem",
              "position": 29,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/efficient-inventory-management-tactics/",
                "name": "Inventory Management: 8 Efficient Tactics You Need to Implement",
                "description": "Inventory management is the process of tracking, moving and restocking a business' inventory effectively.",
                "datePublished": "2024-04-28"
              }
            },
            {
              "@type": "ListItem",
              "position": 30,
              "item": {
                "@type": "TechArticle",
                "url": "https://www.epos.com.sg/essential-tips-for-inventory-management/",
                "name": "10 Essential Tips for Effective Inventory Management",
                "description": "Managing inventory can be challenging, but these essential tips will help you maintain optimal stock levels.",
                "datePublished": "2024-04-21"
              }
            },
            {
              "@type": "ListItem",
              "position": 31,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/10-digital-tools-every-modern-retailer-should-be-using/",
                "name": "10 Digital Tools Every Modern Retailer Should Be Using",
                "description": "In today's market, success for retailers hinges on creating a seamless, personalised experience across all touchpoints.",
                "datePublished": "2024-12-05"
              }
            },
            {
              "@type": "ListItem",
              "position": 32,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/omnichannel-retail-strategy-retail/",
                "name": "Why Omnichannel Retail Is Becoming the Core Strategy for Singapore Brands",
                "description": "With 68.3 percent of Singapore shoppers using both online and in-store channels, omnichannel retail is essential.",
                "datePublished": "2024-11-27"
              }
            },
            {
              "@type": "ListItem",
              "position": 33,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/7-digital-marketing-myths-that-are-costing-you-customers/",
                "name": "7 Digital Marketing Myths That Are Costing You Customers",
                "description": "In the fast-moving world of retail and e-commerce, strategies that worked last year might be costing you today.",
                "datePublished": "2024-11-21"
              }
            },
            {
              "@type": "ListItem",
              "position": 34,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/15-easy-social-media-content-ideas-for-busy-business-owners/",
                "name": "15 Easy Social Media Content Ideas for Busy Business Owners",
                "description": "As a business owner, you know that social media is crucial for staying relevant and engaging with your audience.",
                "datePublished": "2024-10-31"
              }
            },
            {
              "@type": "ListItem",
              "position": 35,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/omnichannel-retail-pos/",
                "name": "Omnichannel Retail POS: Why Integration Drives Business Growth",
                "description": "Retail success no longer depends solely on physical stores or online sales, but on creating seamless experiences across all channels.",
                "datePublished": "2024-10-28"
              }
            },
            {
              "@type": "ListItem",
              "position": 36,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/10-digital-marketing-tricks-every-small-business-can-use-today-for-free/",
                "name": "10 Digital Marketing Tricks Every Small Business Can Use Today, For Free",
                "description": "The biggest misconception in marketing is that you need a huge budget to succeed online.",
                "datePublished": "2024-10-17"
              }
            },
            {
              "@type": "ListItem",
              "position": 37,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/what-is-fb-qr-ordering-and-how-does-it-work/",
                "name": "What Is F&B QR Ordering and How Does It Work?",
                "description": "QR Ordering has become a game-changer for F&B businesses, streamlining how customers browse menus and place orders.",
                "datePublished": "2024-09-11"
              }
            },
            {
              "@type": "ListItem",
              "position": 38,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/hidden-costs-manual-sales-vs-pos-machines/",
                "name": "Hidden Costs of Manual Sales: How POS Machines Save SMEs Money",
                "description": "Many SMEs underestimate how much manual sales processes cost them through missed sales and human errors.",
                "datePublished": "2024-09-10"
              }
            },
            {
              "@type": "ListItem",
              "position": 39,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/customer-loyalty-programme-why-it-matters/",
                "name": "Customer Loyalty Programme: Why It's Essential for Business",
                "description": "A strong customer loyalty programme builds trust, improves retention, and drives repeat business.",
                "datePublished": "2024-08-28"
              }
            },
            {
              "@type": "ListItem",
              "position": 40,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/sme-grants-for-pos-system-adoption/",
                "name": "7 SME Grants in Singapore That Help Fund POS System Adoption",
                "description": "Modernising your business with a POS system doesn't have to be expensive with multiple SME grants available.",
                "datePublished": "2024-08-15"
              }
            },
            {
              "@type": "ListItem",
              "position": 41,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/psg-grant-supports-pos-system-upgrades/",
                "name": "How the PSG Grant Supports POS System Upgrades for SMEs",
                "description": "The Productivity Solutions Grant (PSG) makes it easier for SMEs in Singapore to adopt essential business technology.",
                "datePublished": "2024-08-14"
              }
            },
            {
              "@type": "ListItem",
              "position": 42,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/hawker-productivity-grant/",
                "name": "How the Hawker Productivity Grant Helps Hawkers Upgrade Their POS System",
                "description": "Discover how the Hawker Productivity Grant can help hawkers modernise operations with affordable POS upgrades.",
                "datePublished": "2024-08-13"
              }
            },
            {
              "@type": "ListItem",
              "position": 43,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/5-signs-digital-marketing-sme-catch-up/",
                "name": "2025 Digital Marketing: 5 Signs Your SME in Singapore Needs to Catch Up",
                "description": "Digital advertising has become a key component in marketing strategies for businesses of all sizes.",
                "datePublished": "2024-07-23"
              }
            },
            {
              "@type": "ListItem",
              "position": 44,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/5-signs-your-small-business-needs-a-digital-marketing-strategy-in-2025/",
                "name": "5 Signs Your Small Business Needs a Digital Marketing Strategy in 2025",
                "description": "As a small business owner in Singapore, you're likely juggling multiple responsibilities including operations and customer service.",
                "datePublished": "2024-07-16"
              }
            },
            {
              "@type": "ListItem",
              "position": 45,
              "item": {
                "@type": "Article",
                "url": "https://www.epos.com.sg/what-killed-singapores-department-stores-7-lessons-for-small-business-owners/",
                "name": "What Killed Singapore's Department Stores? 7 Lessons for Small Business Owners",
                "description": "Once the cornerstone of Singapore's retail landscape, department stores offer valuable lessons for today's business owners.",
                "datePublished": "2024-07-02"
              }
            }
          ]
        },
        "breadcrumb": {
          "@type": "BreadcrumbList",
          "itemListElement": [{
              "@type": "ListItem",
              "position": 1,
              "name": "Home",
              "item": "https://www.epos.com.sg/"
            },
            {
              "@type": "ListItem",
              "position": 2,
              "name": "EPOS Recommends",
              "item": "https://www.epos.com.sg/epos-recommends/"
            }
          ]
        }
      }
    </script>
<?php
  }
}
