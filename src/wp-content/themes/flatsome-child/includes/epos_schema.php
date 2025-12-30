<?php
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

// Knowledge Base
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

// EPOS Recommends
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

// KnowledgeBase Pos
add_action('wp_head', 'epos_add_epos_knowledge_base_frontend_windows_android_pos_schema');
function epos_add_epos_knowledge_base_frontend_windows_android_pos_schema()
{

  if (is_page('epos-knowledge-base-frontend-windows-android-pos')) {

  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@graph": [{
            "@type": "WebPage",
            "@id": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/#webpage",
            "url": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/",
            "name": "EPOS Knowledge Base Frontend Windows/Android POS",
            "description": "Find step by step guides, best practises and more to learn how to use the EPOS System. Access knowledge base for Windows POS, Android POS, and Portrait POS.",
            "isPartOf": {
              "@id": "https://www.epos.com.sg/#website"
            },
            "about": {
              "@type": "SoftwareApplication",
              "name": "EPOS POS System",
              "applicationCategory": "BusinessApplication"
            },
            "breadcrumb": {
              "@id": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/#breadcrumb"
            },
            "inLanguage": "en-SG",
            "potentialAction": {
              "@type": "SearchAction",
              "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/?s={search_term_string}"
              },
              "query-input": "required name=search_term_string"
            }
          },
          {
            "@type": "BreadcrumbList",
            "@id": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/#breadcrumb",
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
              },
              {
                "@type": "ListItem",
                "position": 3,
                "name": "Frontend Windows/Android POS"
              }
            ]
          },
          {
            "@type": "ItemList",
            "@id": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/#itemlist",
            "name": "EPOS Knowledge Base Categories",
            "description": "Main categories of the EPOS Knowledge Base",
            "numberOfItems": 3,
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "item": {
                  "@type": "SiteNavigationElement",
                  "@id": "https://www.epos.com.sg/knowledge-base-front-end",
                  "name": "WINDOWS POS",
                  "description": "Knowledge base guides for Windows POS system",
                  "url": "https://www.epos.com.sg/knowledge-base-front-end"
                }
              },
              {
                "@type": "ListItem",
                "position": 2,
                "item": {
                  "@type": "SiteNavigationElement",
                  "@id": "https://www.epos.com.sg/knowledge-base-android-pos-front-end/",
                  "name": "ANDROID POS",
                  "description": "Knowledge base guides for Android POS system",
                  "url": "https://www.epos.com.sg/knowledge-base-android-pos-front-end/"
                }
              },
              {
                "@type": "ListItem",
                "position": 3,
                "item": {
                  "@type": "SiteNavigationElement",
                  "@id": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end",
                  "name": "PORTRAIT POS",
                  "description": "Knowledge base guides for Portrait POS system",
                  "url": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end"
                }
              }
            ]
          },
          {
            "@type": "WebSite",
            "@id": "https://www.epos.com.sg/#website",
            "url": "https://www.epos.com.sg/",
            "name": "EPOS POS System",
            "description": "Leading POS system provider in Singapore",
            "publisher": {
              "@id": "https://www.epos.com.sg/#organization"
            },
            "inLanguage": "en-SG"
          },
          {
            "@type": "Organization",
            "@id": "https://www.epos.com.sg/#organization",
            "name": "EPOS Pte. Ltd.",
            "url": "https://www.epos.com.sg/",
            "logo": {
              "@type": "ImageObject",
              "url": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp",
              "contentUrl": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp"
            },
            "sameAs": [
              "https://www.facebook.com/epossg",
              "https://www.instagram.com/epossg/",
              "https://www.youtube.com/@epospossystemsingapore9807",
              "https://www.linkedin.com/company/14524422"
            ],
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
              "email": "sales@epos.com.sg",
              "contactType": "customer service",
              "areaServed": "SG",
              "availableLanguage": "en"
            }
          }
        ]
      }
    </script>
  <?php
  }
}

// Knowledge Base
add_action('wp_head', 'epos_add_epos_knowledge_base_schema');
function epos_add_epos_knowledge_base_schema()
{

  if (is_page('knowledge-base')) {

  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@graph": [{
            "@type": "CollectionPage",
            "@id": "https://www.epos.com.sg/knowledge-base/#webpage",
            "url": "https://www.epos.com.sg/knowledge-base/",
            "name": "EPOS Knowledge Base",
            "headline": "Welcome to EPOS Knowledge Base",
            "description": "Find step by step guides, best practises and more to learn how to use the EPOS System. Access comprehensive user guides for all EPOS products including Frontend, Backend Portal, Self-Service Kiosk, Kitchen Display System, Stock Take App, Payment Terminal, Soundbox, Queue Display System, and Release Updates.",
            "isPartOf": {
              "@id": "https://www.epos.com.sg/#website"
            },
            "about": {
              "@type": "SoftwareApplication",
              "name": "EPOS POS System",
              "applicationCategory": "BusinessApplication",
              "operatingSystem": "Windows, Android, iOS"
            },
            "breadcrumb": {
              "@id": "https://www.epos.com.sg/knowledge-base/#breadcrumb"
            },
            "inLanguage": "en-SG",
            "potentialAction": {
              "@type": "SearchAction",
              "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://www.epos.com.sg/knowledge-base/?s={search_term_string}"
              },
              "query-input": "required name=search_term_string"
            },
            "mainEntity": {
              "@id": "https://www.epos.com.sg/knowledge-base/#itemlist"
            }
          },
          {
            "@type": "BreadcrumbList",
            "@id": "https://www.epos.com.sg/knowledge-base/#breadcrumb",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://www.epos.com.sg/"
              },
              {
                "@type": "ListItem",
                "position": 2,
                "name": "Knowledge Base"
              }
            ]
          },
          {
            "@type": "ItemList",
            "@id": "https://www.epos.com.sg/knowledge-base/#itemlist",
            "name": "EPOS Knowledge Base Categories",
            "description": "Comprehensive collection of user guides and documentation for all EPOS products and systems",
            "numberOfItems": 9,
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "item": {
                  "@type": "HowTo",
                  "@id": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/",
                  "name": "FRONTEND",
                  "description": "User Guide on our Frontend Ordering / Cashiering System",
                  "url": "https://www.epos.com.sg/epos-knowledge-base-frontend-windows-android-pos/"
                }
              },
              {
                "@type": "ListItem",
                "position": 2,
                "item": {
                  "@type": "HowTo",
                  "@id": "https://www.epos.com.sg/knowledge-base-back-end/",
                  "name": "BACKEND PORTAL",
                  "description": "User Guide on our Backend Management Portal",
                  "url": "https://www.epos.com.sg/knowledge-base-back-end/"
                }
              },
              {
                "@type": "ListItem",
                "position": 3,
                "item": {
                  "@type": "HowTo",
                  "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end",
                  "name": "Self-Service Kiosk",
                  "description": "User Guide on our Self-Service Kiosk",
                  "url": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end"
                }
              },
              {
                "@type": "ListItem",
                "position": 4,
                "item": {
                  "@type": "HowTo",
                  "@id": "https://www.epos.com.sg/kitchen-display-system/",
                  "name": "Kitchen Display System (KDS)",
                  "description": "User Guide on our Kitchen Display System (KDS)",
                  "url": "https://www.epos.com.sg/kitchen-display-system/"
                }
              },
              {
                "@type": "ListItem",
                "position": 5,
                "item": {
                  "@type": "HowTo",
                  "@id": "https://www.epos.com.sg/stock-take-app/",
                  "name": "Stock Take App",
                  "description": "User Guide on our Stock take app",
                  "url": "https://www.epos.com.sg/stock-take-app/"
                }
              },
              {
                "@type": "ListItem",
                "position": 6,
                "item": {
                  "@type": "HowTo",
                  "@id": "https://www.epos.com.sg//knowledge-base-back-end/erp-sales/payment-terminal/",
                  "name": "Payment Terminal",
                  "description": "User Guide on our Payment Terminal",
                  "url": "https://www.epos.com.sg//knowledge-base-back-end/erp-sales/payment-terminal/"
                }
              },
              {
                "@type": "ListItem",
                "position": 7,
                "item": {
                  "@type": "HowTo",
                  "@id": "https://www.epos.com.sg/knowledge-base-front-end/soundbox/",
                  "name": "Soundbox",
                  "description": "User Guide on our Soundbox",
                  "url": "https://www.epos.com.sg/knowledge-base-front-end/soundbox/"
                }
              },
              {
                "@type": "ListItem",
                "position": 8,
                "item": {
                  "@type": "HowTo",
                  "@id": "https://www.epos.com.sg/queue-display-system",
                  "name": "Queue Display System (QDS)",
                  "description": "User Guide on our Queue Display System (QDS)",
                  "url": "https://www.epos.com.sg/queue-display-system"
                }
              },
              {
                "@type": "ListItem",
                "position": 9,
                "item": {
                  "@type": "WebPage",
                  "@id": "https://www.epos.com.sg/knowledge-base-release-updates/",
                  "name": "RELEASE UPDATE",
                  "description": "List of Updates that might make your business operate more smoothly",
                  "url": "https://www.epos.com.sg/knowledge-base-release-updates/"
                }
              }
            ]
          },
          {
            "@type": "WebSite",
            "@id": "https://www.epos.com.sg/#website",
            "url": "https://www.epos.com.sg/",
            "name": "EPOS POS System",
            "description": "Leading POS system provider in Singapore",
            "publisher": {
              "@id": "https://www.epos.com.sg/#organization"
            },
            "inLanguage": "en-SG",
            "potentialAction": {
              "@type": "SearchAction",
              "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://www.epos.com.sg/?s={search_term_string}"
              },
              "query-input": "required name=search_term_string"
            }
          },
          {
            "@type": "Organization",
            "@id": "https://www.epos.com.sg/#organization",
            "name": "EPOS Pte. Ltd.",
            "url": "https://www.epos.com.sg/",
            "logo": {
              "@type": "ImageObject",
              "url": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp",
              "contentUrl": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp",
              "width": 2258,
              "height": 504
            },
            "sameAs": [
              "https://www.facebook.com/epossg",
              "https://www.instagram.com/epossg/",
              "https://www.youtube.com/@epospossystemsingapore9807",
              "https://www.linkedin.com/company/14524422",
              "https://www.xiaohongshu.com/user/profile/5ecf5cbc000000000100162e"
            ],
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
              "email": "sales@epos.com.sg",
              "contactType": "customer service",
              "areaServed": "SG",
              "availableLanguage": ["en"]
            }
          }
        ]
      }
    </script>
  <?php
  }
}

//Knowledge-base-front-end
add_action('wp_head', 'epos_add_knowledge_base_front_end_schema');

function epos_add_knowledge_base_front_end_schema()
{
  if (is_page('knowledge-base-front-end')) {

  ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@graph": [{
            "@type": "CollectionPage",
            "@id": "https://www.epos.com.sg/knowledge-base-front-end/#webpage",
            "url": "https://www.epos.com.sg/knowledge-base-front-end/",
            "name": "EPOS Knowledge Base Front End",
            "headline": "Windows POS Frontend User Guide",
            "description": "Comprehensive user guide for EPOS Windows POS Frontend system. Browse topics including getting started, products, transactions, payments, F&B features, history, delivery orders, and settings.",
            "isPartOf": {
              "@id": "https://www.epos.com.sg/#website"
            },
            "about": {
              "@type": "SoftwareApplication",
              "name": "EPOS Windows POS Frontend",
              "applicationCategory": "BusinessApplication",
              "operatingSystem": "Windows"
            },
            "breadcrumb": {
              "@id": "https://www.epos.com.sg/knowledge-base-front-end/#breadcrumb"
            },
            "inLanguage": "en-SG",
            "potentialAction": {
              "@type": "SearchAction",
              "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://www.epos.com.sg/knowledge-base-front-end/?s={search_term_string}"
              },
              "query-input": "required name=search_term_string"
            },
            "mainEntity": [{
                "@id": "https://www.epos.com.sg/knowledge-base-front-end/#itemlist"
              },
              {
                "@id": "https://www.epos.com.sg/knowledge-base-front-end/#faqpage"
              }
            ]
          },
          {
            "@type": "BreadcrumbList",
            "@id": "https://www.epos.com.sg/knowledge-base-front-end/#breadcrumb",
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
              },
              {
                "@type": "ListItem",
                "position": 3,
                "name": "Windows POS Frontend"
              }
            ]
          },
          {
            "@type": "ItemList",
            "@id": "https://www.epos.com.sg/knowledge-base-front-end/#itemlist",
            "name": "Windows POS Frontend Knowledge Base Topics",
            "description": "Categorised topics covering all aspects of the EPOS Windows POS Frontend system",
            "numberOfItems": 11,
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "item": {
                  "@type": "HowTo",
                  "name": "Getting Started",
                  "description": "Learn how to start using the POS system, manage sessions and shifts",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "Starting the POS",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-starting-the-pos/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Session Management",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-session-management/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 2,
                "item": {
                  "@type": "HowTo",
                  "name": "Product",
                  "description": "Handle different product types including modifiers, serial numbers, open price, set menus, and packages",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "Modifier products",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-handle-products-with-add-ons-options/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "SN/IMEI products",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-handle-serial-number-imei-products/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Product Enquiry",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-product-enquiry-function/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 3,
                "item": {
                  "@type": "HowTo",
                  "name": "Transaction",
                  "description": "Manage order transactions including adding products, applying discounts, vouchers, and promotions",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "Add product",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-add-product-to-order-cart/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Apply discount",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-apply-discounts/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Hold and retrieve sale",
                      "url": "https://www.epos.com.sg/knowledge-base-windows-pos-front-end-hold-and-retrieve-orders/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 4,
                "item": {
                  "@type": "HowTo",
                  "name": "Payment",
                  "description": "Process payments through multiple methods including credit, membership points, NETS, PayNow, and vouchers",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "Split payment",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-split-payment/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "EPOS PayNow",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-make-payment-via-epos-paynow/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Return order(s)",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-return-order/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 5,
                "item": {
                  "@type": "HowTo",
                  "name": "F&B Features",
                  "description": "Manage restaurant-specific features including table management, kitchen receipts, and split settlements",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "Table Management",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-tag-tables-to-sales-orders/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Print Kitchen Receipt",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-print-kitchen-receipts/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Split settlement",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-split-settlement-by-pax/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 6,
                "item": {
                  "@type": "HowTo",
                  "name": "History",
                  "description": "View and manage historical data including sales receipts, shift reports, and tax reports",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "Sales Receipt",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-sales-receipt/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Sales Report",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-sales-report/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 7,
                "item": {
                  "@type": "HowTo",
                  "name": "GrabFood / GrabMart",
                  "description": "Handle delivery orders from GrabFood and GrabMart integration",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "UI Interface",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-introduction-to-ui-interface-for-delivery-module/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Auto accept order",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-handling-auto-accept-orders-on-the-pos/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 8,
                "item": {
                  "@type": "Article",
                  "name": "Delivery Orders",
                  "url": "https://www.epos.com.sg/delivery-orders-on-pos",
                  "description": "Manage delivery orders on POS"
                }
              },
              {
                "@type": "ListItem",
                "position": 9,
                "item": {
                  "@type": "HowTo",
                  "name": "Miscellaneous",
                  "description": "Additional features including POS updates, customer management, barcode printing, and cash management",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "Update POS",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-update-pos/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Cash Management",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-cash-management/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 10,
                "item": {
                  "@type": "HowTo",
                  "name": "Settings",
                  "description": "Configure general, user, hardware, receipt, and quickpick settings",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "General Settings",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-general-settings/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Hardware Settings",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end-hardware-settings/"
                    }
                  ]
                }
              },
              {
                "@type": "ListItem",
                "position": 11,
                "item": {
                  "@type": "HowTo",
                  "name": "Kiosk & Web Ordering",
                  "description": "Set up and configure self-service kiosk and web ordering features",
                  "step": [{
                      "@type": "HowToStep",
                      "name": "QR/Web Ordering",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end/qr-web-ordering-app/"
                    },
                    {
                      "@type": "HowToStep",
                      "name": "Kiosk Configuration",
                      "url": "https://www.epos.com.sg/knowledge-base-front-end/kiosk-configuration/"
                    }
                  ]
                }
              }
            ]
          },
          {
            "@type": "FAQPage",
            "@id": "https://www.epos.com.sg/knowledge-base-front-end/#faqpage",
            "mainEntity": [{
                "@type": "Question",
                "name": "Can my POS work without internet connection?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "Without internet connection, transactions made on your frontend POS system will not be synced to the backend. Thus, you will not be able to see the latest sales and reports when you view from the backend."
                }
              },
              {
                "@type": "Question",
                "name": "Can I reset my receipt number back to 0 at the start of the day?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "Yes, you can do so by referring to Receipt Settings at https://www.epos.com.sg/receipt-settings/"
                }
              },
              {
                "@type": "Question",
                "name": "What is the max number of characters I can input for quickpick tab name?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "You can enter a maximum of 15 characters."
                }
              },
              {
                "@type": "Question",
                "name": "Can I hold my order for a few days?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "An order cannot be held if you want to end your shift. This means that if you end your shift daily, you will not be able to hold orders for the next day."
                }
              },
              {
                "@type": "Question",
                "name": "How many digits can I input for SKU number?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "The minimum number is 1, and the maximum number is 30."
                }
              },
              {
                "@type": "Question",
                "name": "How many digits can I input for barcode number?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "A maximum of 13 characters is allowed. Do note that alphabets take up 2 character space, and numbers take up 1 character space."
                }
              },
              {
                "@type": "Question",
                "name": "What do I do if I forgot my login details?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "If you forget your frontend login password, you can reset it on the backend (Go to Set Up > Users > Edit Staff Account)"
                }
              }
            ]
          },
          {
            "@type": "WebSite",
            "@id": "https://www.epos.com.sg/#website",
            "url": "https://www.epos.com.sg/",
            "name": "EPOS POS System",
            "description": "Leading POS system provider in Singapore",
            "publisher": {
              "@id": "https://www.epos.com.sg/#organization"
            },
            "inLanguage": "en-SG"
          },
          {
            "@type": "Organization",
            "@id": "https://www.epos.com.sg/#organization",
            "name": "EPOS Pte. Ltd.",
            "url": "https://www.epos.com.sg/",
            "logo": {
              "@type": "ImageObject",
              "url": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp",
              "contentUrl": "https://www.epos.com.sg/wp-content/uploads/2025/12/EPOS_Full-Color.webp"
            },
            "sameAs": [
              "https://www.facebook.com/epossg",
              "https://www.instagram.com/epossg/",
              "https://www.youtube.com/@epospossystemsingapore9807",
              "https://www.linkedin.com/company/14524422",
              "https://www.xiaohongshu.com/user/profile/5ecf5cbc000000000100162e"
            ],
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
              "email": "sales@epos.com.sg",
              "contactType": "customer service",
              "areaServed": "SG",
              "availableLanguage": ["en"]
            }
          }
        ]
      }
    </script>
<?php
  }
}
