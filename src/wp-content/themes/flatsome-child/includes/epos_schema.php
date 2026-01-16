<?php

function add_ahrefs_verification_meta() {
	echo '<meta name="ahrefs-site-verification" content="e05760c95c9bbd859b594f1e26f914167ca78fb886fb657461df0c853ded7fca">' . "\n";
}
add_action('wp_head', 'add_ahrefs_verification_meta');

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
// EPOS Blog
add_action('wp_head', 'epos_add_epos_blog_schema');
function epos_add_epos_blog_schema()
{

	if (is_home() || is_page('blog')) {

?>
<script type="application/ld+json" class="epos-schema">
      {
        "@context": "https://schema.org",
        "@graph": [{
            "@type": "CollectionPage",
            "@id": "https://www.epos.com.sg/blog/#webpage",
            "url": "https://www.epos.com.sg/blog/",
            "name": "Blog | EPOS Singapore",
            "headline": "EPOS Blog - POS System Insights, Business Tips & Industry News",
            "description": "Explore the EPOS blog for POS system insights, digital marketing strategies, business tips, industry news, and expert recommendations for retail and F&B businesses in Singapore.",
            "isPartOf": {
              "@id": "https://www.epos.com.sg/#website"
            },
            "breadcrumb": {
              "@id": "https://www.epos.com.sg/blog/#breadcrumb"
            },
            "inLanguage": "en-SG",
            "publisher": {
              "@id": "https://www.epos.com.sg/#organization"
            }
          },
          {
            "@type": "Blog",
            "@id": "https://www.epos.com.sg/blog/#blog",
            "url": "https://www.epos.com.sg/blog/",
            "name": "EPOS Blog",
            "description": "Articles about POS systems, business technology, digital marketing, and industry insights for SMEs in Singapore",
            "publisher": {
              "@id": "https://www.epos.com.sg/#organization"
            },
            "inLanguage": "en-SG",
            "blogPost": [{
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/mobile-pos-system-benefits-features/",
                "headline": "The Portability of Mobile POS Systems: Sell Anywhere, Anytime",
                "url": "https://www.epos.com.sg/mobile-pos-system-benefits-features/",
                "datePublished": "2025-12-23",
                "dateModified": "2025-12-24",
                "author": {
                  "@type": "Person",
                  "name": "Krystine",
                  "url": "https://www.epos.com.sg/author/krystine/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "Mobile POS systems have transformed how businesses process transactions by removing the constraint of fixed checkout locations.",
                "image": {
                  "@type": "ImageObject",
                  "url": "https://www.epos.com.sg/wp-content/uploads/mobile-pos-system.jpg",
                  "width": 1020,
                  "height": 680
                },
                "articleSection": "EPOS",
                "keywords": ["payments", "POS System"],
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/epos-amgd-2025/",
                "headline": "How EPOS Technology Drives Inclusion at AMGD Superfood Restaurant",
                "url": "https://www.epos.com.sg/epos-amgd-2025/",
                "datePublished": "2025-12-19",
                "dateModified": "2025-12-19",
                "author": {
                  "@type": "Person",
                  "name": "Krystine",
                  "url": "https://www.epos.com.sg/author/krystine/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "As Enabling Village marked its 10th anniversary with Prime Minister Lawrence Wong officiating celebrations, EPOS restaurant technology played a supporting role in demonstrating how accessible systems create dignified employment.",
                "image": {
                  "@type": "ImageObject",
                  "url": "https://www.epos.com.sg/wp-content/uploads/epos-amgd.jpg",
                  "width": 1020,
                  "height": 765
                },
                "articleSection": "EPOS News & Events",
                "keywords": ["events"],
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/7-ways-indoor-playgrounds-boost-your-childs-brain-development/",
                "headline": "7 Ways Indoor Playgrounds Boost Your Child's Brain Development",
                "url": "https://www.epos.com.sg/7-ways-indoor-playgrounds-boost-your-childs-brain-development/",
                "datePublished": "2025-12-12",
                "dateModified": "2025-12-23",
                "author": {
                  "@type": "Person",
                  "name": "kelvin",
                  "url": "https://www.epos.com.sg/author/kelvin/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "As parents, we often think of indoor playgrounds as simply a fun way to burn off energy on a rainy day. But those multi-story climbing structures, twisty slides, and elaborate obstacle courses are more than just entertainment.",
                "articleSection": "EPOS Recommends",
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/epos-singapore-fintech-festival-2025/",
                "headline": "EPOS Powers Seamless Payments at Singapore Fintech Festival 2025",
                "url": "https://www.epos.com.sg/epos-singapore-fintech-festival-2025/",
                "datePublished": "2025-12-11",
                "dateModified": "2025-12-15",
                "author": {
                  "@type": "Person",
                  "name": "Krystine",
                  "url": "https://www.epos.com.sg/author/krystine/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "EPOS, a brand of Ant International's Antom, was the official point-of-sale system and payments provider across merchandise booths and F&B stalls at Singapore Fintech Festival 2025.",
                "image": {
                  "@type": "ImageObject",
                  "url": "https://www.epos.com.sg/wp-content/uploads/singapore-fintech-festival.jpg",
                  "width": 1020,
                  "height": 680
                },
                "articleSection": "EPOS News & Events",
                "keywords": ["events"],
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/10-digital-tools-every-modern-retailer-should-be-using/",
                "headline": "10 Digital Tools Every Modern Retailer Should Be Using",
                "url": "https://www.epos.com.sg/10-digital-tools-every-modern-retailer-should-be-using/",
                "datePublished": "2025-12-05",
                "dateModified": "2025-12-12",
                "author": {
                  "@type": "Person",
                  "name": "kelvin",
                  "url": "https://www.epos.com.sg/author/kelvin/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "In today's market, success for retailers hinges on creating a seamless, personalised experience across both physical stores and online platforms.",
                "articleSection": "EPOS Business Tips",
                "keywords": ["digital marketing", "small business"],
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/epos-voyage-2025/",
                "headline": "EPOS at Ant International's Voyage 2025: Executive Merchant Forum",
                "url": "https://www.epos.com.sg/epos-voyage-2025/",
                "datePublished": "2025-12-03",
                "dateModified": "2025-12-03",
                "author": {
                  "@type": "Person",
                  "name": "Krystine",
                  "url": "https://www.epos.com.sg/author/krystine/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "On 11th November 2025, more than 200 MSME owners, entrepreneurs, and industry leaders gathered at Marina Bay Sands at Ant International's Voyage 2025.",
                "image": {
                  "@type": "ImageObject",
                  "url": "https://www.epos.com.sg/wp-content/uploads/voyage-2025.jpg",
                  "width": 1020,
                  "height": 679
                },
                "articleSection": "EPOS News & Events",
                "keywords": ["news", "small business"],
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/the-desert-gold-3-reasons-why-camel-milk-is-superior-to-cow-goat-and-oat/",
                "headline": "The Desert Gold: 3 reasons why Camel Milk is superior to Cow, Goat and Oat.",
                "url": "https://www.epos.com.sg/the-desert-gold-3-reasons-why-camel-milk-is-superior-to-cow-goat-and-oat/",
                "datePublished": "2025-11-28",
                "dateModified": "2025-12-23",
                "author": {
                  "@type": "Person",
                  "name": "kelvin",
                  "url": "https://www.epos.com.sg/author/kelvin/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "For years, the milk wars have been fought between the dairy traditionalists (cow and goat) and the plant-based upstarts (oat, almond, soy).",
                "articleSection": "EPOS Recommends",
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/omnichannel-retail-strategy-retail/",
                "headline": "Why Omnichannel Retail Is Becoming the Core Strategy for Singapore Brands",
                "url": "https://www.epos.com.sg/omnichannel-retail-strategy-retail/",
                "datePublished": "2025-11-27",
                "dateModified": "2025-11-27",
                "author": {
                  "@type": "Person",
                  "name": "Krystine",
                  "url": "https://www.epos.com.sg/author/krystine/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "With 68.3 percent of Singapore shoppers using both online and in-store channels to find the best value, omnichannel retail has become a defining competitive advantage.",
                "image": {
                  "@type": "ImageObject",
                  "url": "https://www.epos.com.sg/wp-content/uploads/omnichannel-retail.jpg",
                  "width": 1020,
                  "height": 574
                },
                "articleSection": "EPOS Business Tips",
                "keywords": ["retail", "small business"],
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/where-to-spend-your-300-climate-vouchers-given-to-every-hdb-household-by-nea-and-pub/",
                "headline": "Where to Spend Your $300 Climate Vouchers Given To Every HDB Household by NEA and PUB",
                "url": "https://www.epos.com.sg/where-to-spend-your-300-climate-vouchers-given-to-every-hdb-household-by-nea-and-pub/",
                "datePublished": "2025-11-24",
                "author": {
                  "@type": "Person",
                  "name": "Yingli Liao",
                  "url": "https://www.epos.com.sg/author/yingli-liao/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "Upgrading your HDB home with energy and water-efficient appliances can cool your living space, lighten your utility bills, and help the environment!",
                "image": {
                  "@type": "ImageObject",
                  "url": "https://www.epos.com.sg/wp-content/uploads/climate-vouchers.jpg",
                  "width": 1020,
                  "height": 574
                },
                "articleSection": "EPOS Recommends",
                "keywords": ["grants"],
                "inLanguage": "en-SG"
              },
              {
                "@type": "BlogPosting",
                "@id": "https://www.epos.com.sg/7-digital-marketing-myths-that-are-costing-you-customers/",
                "headline": "7 Digital Marketing Myths That Are Costing You Customers",
                "url": "https://www.epos.com.sg/7-digital-marketing-myths-that-are-costing-you-customers/",
                "datePublished": "2025-11-21",
                "dateModified": "2025-12-12",
                "author": {
                  "@type": "Person",
                  "name": "kelvin",
                  "url": "https://www.epos.com.sg/author/kelvin/"
                },
                "publisher": {
                  "@id": "https://www.epos.com.sg/#organization"
                },
                "description": "In the fast-moving world of retail and e-commerce, strategies that worked last year might be obsolete today.",
                "image": {
                  "@type": "ImageObject",
                  "url": "https://www.epos.com.sg/wp-content/uploads/digital-marketing-myths.jpg",
                  "width": 1020,
                  "height": 574
                },
                "articleSection": "EPOS Business Tips",
                "keywords": ["digital marketing", "small business"],
                "inLanguage": "en-SG"
              }
            ]
          },
          {
            "@type": "BreadcrumbList",
            "@id": "https://www.epos.com.sg/blog/#breadcrumb",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://www.epos.com.sg/"
              },
              {
                "@type": "ListItem",
                "position": 2,
                "name": "Blog"
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

add_filter('post_class', function ($classes) {
	if (is_home() || is_page('blog')) {
		$classes = array_diff($classes, ['hentry']);
	}
	return $classes;
});

add_filter('rank_math/json_ld', function ($data) {

	if (is_home() || is_page('blog')) {
		foreach ($data as $key => $schema) {
			if (isset($schema['@type']) && $schema['@type'] === 'CollectionPage') {
				unset($data[$key]);
			}
		}
	}

	return $data;
}, 99);
// end epos blog schema
add_action('wp_head', 'epos_add_epos_knowledge_base_schema');
function epos_add_epos_knowledge_base_schema()
{

	if (is_page('knowledge-base-self-service-kiosk-front-end')) {

?>
<script type="application/ld+json" class="epos-schema">
    {
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "CollectionPage",
      "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/#webpage",
      "url": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/",
      "name": "EPOS Knowledge Base Self-Service Kiosk Front End",
      "headline": "Self-Service Kiosk User Guide",
      "description": "Comprehensive user guide for EPOS Self-Service Kiosk system. Browse topics including configurations, getting started, transactions, products, payments, and membership/CRM features for unattended retail operations.",
      "isPartOf": {
        "@id": "https://www.epos.com.sg/#website"
      },
      "about": {
        "@type": "SoftwareApplication",
        "name": "EPOS Self-Service Kiosk",
        "applicationCategory": "BusinessApplication",
        "applicationSubCategory": "Self-Service Retail Kiosk"
      },
      "breadcrumb": {
        "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/#breadcrumb"
      },
      "inLanguage": "en-SG",
      "potentialAction": {
        "@type": "SearchAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/?s={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      },
      "mainEntity": [
        {
          "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/#itemlist"
        },
        {
          "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/#faqpage"
        }
      ]
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/#breadcrumb",
      "itemListElement": [
        {
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
          "name": "Self-Service Kiosk"
        }
      ]
    },
    {
      "@type": "ItemList",
      "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/#itemlist",
      "name": "Self-Service Kiosk Knowledge Base Topics",
      "description": "Categorised topics covering all aspects of the EPOS Self-Service Kiosk system for unattended retail operations",
      "numberOfItems": 6,
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "item": {
            "@type": "HowTo",
            "name": "Configurations",
            "description": "Configure backend portal settings, general settings, cash management, quickpick, hardware, config, local setup, and receipt settings for your self-service kiosk",
            "step": [
              {
                "@type": "HowToStep",
                "name": "Backend Portal",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-backend-portal"
              },
              {
                "@type": "HowToStep",
                "name": "General Settings",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-general"
              },
              {
                "@type": "HowToStep",
                "name": "Hardware Settings",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-hardware"
              },
              {
                "@type": "HowToStep",
                "name": "Receipt Settings",
                "url": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end-receipt-settings"
              }
            ]
          }
        },
        {
          "@type": "ListItem",
          "position": 2,
          "item": {
            "@type": "HowTo",
            "name": "Getting Started",
            "description": "Learn how to start the kiosk, use training mode, manage shifts and sessions, navigate the retail kiosk interface, and set up quickpick",
            "step": [
              {
                "@type": "HowToStep",
                "name": "Starting the Kiosk",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-starting-the-pos"
              },
              {
                "@type": "HowToStep",
                "name": "Retail Kiosk Interface",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-pos-interface"
              },
              {
                "@type": "HowToStep",
                "name": "Session Management",
                "url": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end-session-management/"
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
            "description": "Manage self-service transactions including adding products, editing products, processing retail kiosk orders, and handling returns",
            "step": [
              {
                "@type": "HowToStep",
                "name": "Add Product",
                "url": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end-add-product"
              },
              {
                "@type": "HowToStep",
                "name": "Retail Kiosk Order",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-order"
              },
              {
                "@type": "HowToStep",
                "name": "Return Mode",
                "url": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end-return-order"
              }
            ]
          }
        },
        {
          "@type": "ListItem",
          "position": 4,
          "item": {
            "@type": "HowTo",
            "name": "Product",
            "description": "Handle different product types including modifiers, SN/IMEI, open price, set menus, packages, weight scale products, plastic bag prompts, restricted products, and product enquiry",
            "step": [
              {
                "@type": "HowToStep",
                "name": "Modifier Products",
                "url": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end-modifier-products/"
              },
              {
                "@type": "HowToStep",
                "name": "Weight Scale Products",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-weight-scale-products"
              },
              {
                "@type": "HowToStep",
                "name": "Restricted Products",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-restricted-products"
              }
            ]
          }
        },
        {
          "@type": "ListItem",
          "position": 5,
          "item": {
            "@type": "HowTo",
            "name": "Payment",
            "description": "Process payments through multiple methods including credit cards, NETS, PayNow, membership points, vouchers, climate vouchers, and split payments for self-service kiosks",
            "step": [
              {
                "@type": "HowToStep",
                "name": "Integrated Payments",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-integrated-payments"
              },
              {
                "@type": "HowToStep",
                "name": "EPOS PayNow",
                "url": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end-epos-paynow"
              },
              {
                "@type": "HowToStep",
                "name": "Climate Voucher",
                "url": "https://www.epos.com.sg/knowledge-base-android-pos-front-end-nea-voucher"
              }
            ]
          }
        },
        {
          "@type": "ListItem",
          "position": 6,
          "item": {
            "@type": "HowTo",
            "name": "Membership/CRM",
            "description": "Manage customer membership features including member login, credit consumption, and loyalty programmes on self-service kiosks",
            "step": [
              {
                "@type": "HowToStep",
                "name": "Members Login",
                "url": "https://www.epos.com.sg/knowledge-base-retail-kiosk-front-end-members-login"
              },
              {
                "@type": "HowToStep",
                "name": "Credit Consumption",
                "url": "https://www.epos.com.sg/knowledge-base-portrait-pos-front-end-credit-consumption"
              }
            ]
          }
        }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/#faqpage",
      "mainEntity": [
        {
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
      "@type": "SoftwareApplication",
      "@id": "https://www.epos.com.sg/knowledge-base-self-service-kiosk-front-end/#software",
      "name": "EPOS Self-Service Kiosk",
      "applicationCategory": "BusinessApplication",
      "applicationSubCategory": "Self-Service Retail Kiosk System",
      "operatingSystem": "Windows, Android",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "SGD"
      },
      "featureList": [
        "Unattended Self-Service Checkout",
        "Multiple Payment Methods",
        "Weight Scale Integration",
        "Restricted Product Controls",
        "Membership Integration",
        "Plastic Bag Charge Prompts",
        "Age-Restricted Product Verification",
        "Climate Voucher Support",
        "Integrated Payment Terminals",
        "Customer-Facing Interface"
      ],
      "screenshot": "https://www.epos.com.sg/wp-content/uploads/self-service-kiosk-screenshot.jpg",
      "provider": {
        "@id": "https://www.epos.com.sg/#organization"
      },
      "availableLanguage": "en-SG",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "ratingCount": "150"
      }
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
        "availableLanguage": ["en-SG"]
      }
    }
  ]
}

</script>
<?php
	}
}
add_action('wp_head', 'epos_add_stock_take_app_schema');
function epos_add_stock_take_app_schema()
{
	if (is_page('stock-take-app')) {
?>
<script type="application/ld+json" class="epos-schema">
      {
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "TechArticle",
      "@id": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/#article",
      "url": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/",
      "headline": "Stock Take App - Stocktake Device User Guide",
      "name": "Complete Guide to EPOS Stocktake Device",
      "description": "Comprehensive guide to EPOS Stock Take App covering stock adjustment, stocktake operations, stock in procedures, purchase order management, and stock transfer between outlets. Learn barcode scanning, inventory management, and mobile stocktaking.",
      "articleBody": "The EPOS Stocktake Device is a mobile handheld solution for managing inventory operations including stock adjustments, stocktake, stock in, purchase orders, and stock transfers between outlets.",
      "about": {
        "@id": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/#software"
      },
      "author": {
        "@type": "Person",
        "name": "Nicholas Ten",
        "url": "https://www.epos.com.sg/author/nicholas/"
      },
      "publisher": {
        "@id": "https://www.epos.com.sg/#organization"
      },
      "isPartOf": {
        "@id": "https://www.epos.com.sg/#website"
      },
      "breadcrumb": {
        "@id": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/#breadcrumb"
      },
      "inLanguage": "en-SG",
      "articleSection": "EPOS Knowledge Base",
      "keywords": [
        "stock take app",
        "inventory management",
        "barcode scanner",
        "stocktake device",
        "purchase order mobile",
        "stock transfer",
        "inventory counting",
        "mobile stocktaking"
      ],
      "hasPart": [
        {
          "@type": "HowToSection",
          "name": "Stock Adjustment",
          "description": "Scan barcodes to adjust stock quantities, update supplier information, cost prices, and product descriptions"
        },
        {
          "@type": "HowToSection",
          "name": "Stock Take",
          "description": "Perform physical stock counts by scanning products and recording actual quantities"
        },
        {
          "@type": "HowToSection",
          "name": "Stock In",
          "description": "Receive inventory into the system for both normal and composite products"
        },
        {
          "@type": "HowToSection",
          "name": "Purchase Order",
          "description": "Create, edit, and manage purchase orders directly from the mobile device"
        },
        {
          "@type": "HowToSection",
          "name": "Stock Transfer",
          "description": "Transfer inventory between outlets, send goods, and receive transferred stock"
        }
      ],
      "video": [
        {
          "@type": "VideoObject",
          "name": "Creating Purchase Orders on Stock Take App",
          "description": "Video tutorial showing how to create new purchase orders using the stocktake device",
          "uploadDate": "2023-10-03"
        },
        {
          "@type": "VideoObject",
          "name": "Editing Draft and Receiving Goods",
          "description": "Video tutorial on editing purchase order drafts and receiving goods",
          "uploadDate": "2023-10-03"
        }
      ]
    },
    {
      "@type": "MobileApplication",
      "@id": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/#software",
      "name": "EPOS Stock Take App",
      "alternateName": "EPOS Stocktake Device",
      "applicationCategory": "BusinessApplication",
      "applicationSubCategory": "Inventory Management System",
      "operatingSystem": "Android",
      "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock",
        "price": "0",
        "priceCurrency": "SGD"
      },
      "featureList": [
        "Barcode Scanning for Product Identification",
        "Real-Time Stock Adjustment",
        "Physical Stocktake Recording",
        "Stock In Management",
        "Purchase Order Creation and Management",
        "Multi-Outlet Stock Transfer",
        "Send and Receive Goods Tracking",
        "Composite Product Support",
        "Supplier Management",
        "Cost Price Updates",
        "Product Description Editing",
        "Reference Number Tracking",
        "Error Validation and Alerts",
        "Auto-Fill Functionality",
        "Staff Permission Controls",
        "Handheld Device Optimisation"
      ],
      "screenshot": [
        "https://www.epos.com.sg/wp-content/uploads/stock-adjustment-screen.png",
        "https://www.epos.com.sg/wp-content/uploads/stock-take-screen.png",
        "https://www.epos.com.sg/wp-content/uploads/purchase-order-screen.png",
        "https://www.epos.com.sg/wp-content/uploads/stock-transfer-screen.png"
      ],
      "provider": {
        "@id": "https://www.epos.com.sg/#organization"
      },
      "availableLanguage": "en-SG",
      "softwareRequirements": "Android handheld device with barcode scanner, Internet connection",
      "softwareHelp": {
        "@type": "WebPage",
        "url": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.7",
        "ratingCount": "180"
      }
    },
    {
      "@type": "HowTo",
      "@id": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/#howto-stockadjustment",
      "name": "How to Perform Stock Adjustment with EPOS Stocktake Device",
      "description": "Step-by-step guide to adjusting stock quantities using the handheld stocktake device",
      "tool": [
        {
          "@type": "HowToTool",
          "name": "EPOS Stocktake Device (Handheld Scanner)"
        },
        {
          "@type": "HowToTool",
          "name": "Product Barcodes"
        }
      ],
      "step": [
        {
          "@type": "HowToStep",
          "name": "Select Stock Adjustment Function",
          "text": "User selects 'Stock Adjustment' button on the stocktake device home screen",
          "position": 1
        },
        {
          "@type": "HowToStep",
          "name": "Scan Product Barcode",
          "text": "Press and hold scanner button on either side of device, point at product barcode. Scanner button is located on both sides of the device for convenience.",
          "position": 2
        },
        {
          "@type": "HowToStep",
          "name": "Update Product Details",
          "text": "Update supplier information, cost price, base price, and product description. For descriptions longer than 5 rows, tap 'Read More' to expand full details.",
          "position": 3
        },
        {
          "@type": "HowToStep",
          "name": "Adjust Quantity",
          "text": "Tap on 'QTY Adjustment', input adjust quality (+number increases stock, -number decreases stock), input reason, then tap 'Update'. For composite products, child product quantities adjust automatically.",
          "position": 4
        }
      ],
      "totalTime": "PT5M",
      "estimatedCost": {
        "@type": "MonetaryAmount",
        "currency": "SGD",
        "value": "0"
      }
    },
    {
      "@type": "HowTo",
      "@id": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/#howto-stocktransfer",
      "name": "How to Transfer Stock Between Outlets",
      "description": "Complete guide to creating stock transfers, sending goods, and receiving goods between outlets",
      "step": [
        {
          "@type": "HowToStep",
          "name": "Create New Stock Transfer",
          "text": "Navigate to Stock Transfer > New Stock Transfer. Select destination outlet, enter reference number, tap 'Add Product'. Add products by scanning barcodes, input quantity requested, tap 'Create'.",
          "position": 1
        },
        {
          "@type": "HowToStep",
          "name": "Send Goods",
          "text": "View transfer details, enter reference number, manually fill quantity to send or tap 'Auto Fill'. Confirm send goods. System tracks sent quantities and allows partial shipments.",
          "position": 2
        },
        {
          "@type": "HowToStep",
          "name": "Receive Goods at Destination",
          "text": "Navigate to Send/Receive Goods, select ongoing transfer, tap 'Receive Goods'. Enter reference number and quantities received. Use 'Auto Fill' for quick entry or scan barcodes to locate specific items.",
          "position": 3
        },
        {
          "@type": "HowToStep",
          "name": "Complete Transfer",
          "text": "Once 100% receiving rate is achieved, tap 'Complete' > 'Yes'. Status changes to Completed.",
          "position": 4
        }
      ],
      "totalTime": "PT10M"
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://www.epos.com.sg/knowledge-base-front-end/stock-take-app/#breadcrumb",
      "itemListElement": [
        {
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
          "name": "Frontend",
          "item": "https://www.epos.com.sg/knowledge-base-front-end/"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "name": "Stock Take App"
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
        "contactType": "sales",
        "areaServed": "SG",
        "availableLanguage": ["en-SG"]
      }
    }
  ]
}
</script>
<?php
	}
}
add_action('wp_head', 'epos_add_payment_terminal_schema');
function epos_add_payment_terminal_schema()
{
	if (strpos($_SERVER['REQUEST_URI'], '/knowledge-base-back-end/erp-sales/payment-terminal/') !== false) {

?>
<script type="application/ld+json" class="epos-schema">
      {
        "@context": "https://schema.org",
        "@graph": [{
            "@type": "TechArticle",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/payment-terminal/#article",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/payment-terminal/",
            "headline": "Payment Terminal - Complete User Guide",
            "name": "EPOS Payment Terminal User Guide and Documentation",
            "description": "Comprehensive guide to EPOS Payment Terminal covering credit card payments, e-wallet QR payments, refund processing, settlement reports, hardware maintenance, and troubleshooting. Supports Visa, Mastercard, Touch 'n Go, Alipay, and more.",
            "articleBody": "Our Credit Card Payment Terminal allows customers to pay using credit/debit cards, mobile wallets, and QR code payments. Working hand-in-hand with our POS to create a smoother, faster checkout experience.",
            "datePublished": "2025-03-21",
            "about": {
              "@id": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/payment-terminal/#product"
            },
            "author": {
              "@type": "Person",
              "name": "Nicholas Ten",
              "url": "https://www.epos.com.sg/author/nicholas/"
            },
            "publisher": {
              "@id": "https://www.epos.com.sg/#organization"
            },
            "isPartOf": {
              "@id": "https://www.epos.com.sg/#website"
            },
            "breadcrumb": {
              "@id": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/payment-terminal/#breadcrumb"
            },
            "inLanguage": "en-SG",
            "articleSection": "EPOS Knowledge Base",
            "keywords": [
              "payment terminal",
              "credit card terminal",
              "contactless payment",
              "QR payment",
              "card reader",
              "mobile wallet",
              "Antom terminal",
              "payment gateway Singapore"
            ],
            "hasPart": [{
                "@type": "HowToSection",
                "name": "Overview",
                "description": "Introduction to payment terminal features, supported payment methods (Visa, Mastercard, Touch 'n Go, Alipay, Kakao Pay, TrueMoney), and benefits including competitive fees and T+1 payouts"
              },
              {
                "@type": "HowToSection",
                "name": "Payment Flow Demo Videos",
                "description": "Video demonstrations for POS transactions (card and e-wallet), Kiosk payments, and QR ordering payment flows"
              },
              {
                "@type": "HowToSection",
                "name": "Refund and Void",
                "description": "Process refunds via payment terminal or Antom Portal, including PIN authentication and instant customer refunds"
              },
              {
                "@type": "HowToSection",
                "name": "Settlement Report",
                "description": "Access and download daily and monthly settlement reports through Antom Dashboard with T+1 settlement details"
              },
              {
                "@type": "HowToSection",
                "name": "Hardware",
                "description": "Hardware functions including power button, volume control, charging port, receipt roll replacement, and remote assistance setup"
              },
              {
                "@type": "HowToSection",
                "name": "Settings",
                "description": "Configure automatic receipt printing, lock/unlock D-store app, standalone payment processing, and resolve connection issues"
              }
            ],
            "video": [{
                "@type": "VideoObject",
                "name": "POS Card Payment Flow",
                "description": "Demonstration of credit card payment processing through POS system",
                "contentUrl": "https://www.epos.com.sg/wp-content/uploads/2025/03/Screen-Recording-2025-03-24-at-12.44.31.mp4"
              },
              {
                "@type": "VideoObject",
                "name": "POS E-Wallet Payment Flow",
                "description": "Demonstration of e-wallet QR payment processing through POS system",
                "contentUrl": "https://www.epos.com.sg/wp-content/uploads/2025/03/Screen-Recording-2025-03-24-at-12.45.09.mp4"
              },
              {
                "@type": "VideoObject",
                "name": "Kiosk Card Payment Flow",
                "description": "Demonstration of credit card payment on self-service kiosk",
                "contentUrl": "https://www.epos.com.sg/wp-content/uploads/2025/03/Screen-Recording-2025-03-24-at-12.38.38.mp4"
              },
              {
                "@type": "VideoObject",
                "name": "Kiosk E-Wallet Payment Flow",
                "description": "Demonstration of e-wallet payment on self-service kiosk",
                "contentUrl": "https://www.epos.com.sg/wp-content/uploads/2025/03/Screen-Recording-2025-03-24-at-12.39.56.mp4"
              }
            ]
          },
          {
            "@type": "Product",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/payment-terminal/#product",
            "name": "EPOS Payment Terminal",
            "alternateName": "Antom Credit Card Terminal",
            "description": "Credit card and mobile payment terminal supporting Visa, Mastercard, Touch 'n Go, Alipay, Kakao Pay, and TrueMoney with competitive transaction fees and T+1 settlement",
            "category": "Payment Processing Equipment",
            "brand": {
              "@type": "Brand",
              "name": "EPOS"
            },
            "manufacturer": {
              "@type": "Organization",
              "name": "Antom"
            },
            "offers": {
              "@type": "Offer",
              "availability": "https://schema.org/InStock",
              "price": "0",
              "priceCurrency": "SGD",
              "priceSpecification": {
                "@type": "UnitPriceSpecification",
                "price": "0",
                "priceCurrency": "SGD",
                "description": "Competitive transaction fees apply per transaction"
              }
            },
            "additionalProperty": [{
                "@type": "PropertyValue",
                "name": "Payment Methods",
                "value": "Visa, Mastercard, Touch 'n Go, Alipay, Kakao Pay, TrueMoney"
              },
              {
                "@type": "PropertyValue",
                "name": "Settlement Period",
                "value": "T+1 Working Days (Next-day payout)"
              },
              {
                "@type": "PropertyValue",
                "name": "Charging Port",
                "value": "USB Type-C"
              },
              {
                "@type": "PropertyValue",
                "name": "Connectivity",
                "value": "WiFi"
              },
              {
                "@type": "PropertyValue",
                "name": "Transaction Storage",
                "value": "40 days"
              }
            ],
            "featureList": [
              "Credit Card Acceptance (Visa, Mastercard)",
              "QR Code Mobile Wallet Payments",
              "Contactless NFC Payments",
              "Integrated Receipt Printer",
              "Standalone Payment Mode",
              "Remote Assistance Support",
              "PIN-Protected Refund Processing",
              "Instant Customer Refunds",
              "Transaction History Access",
              "Settlement Report Generation",
              "POS System Integration",
              "Kiosk Integration",
              "QR Ordering Integration",
              "Antom Portal Dashboard Access"
            ],
            "image": "https://www.epos.com.sg/wp-content/uploads/payment-terminal-hardware.jpg",
            "aggregateRating": {
              "@type": "AggregateRating",
              "ratingValue": "4.8",
              "ratingCount": "220"
            }
          },
          {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/payment-terminal/#howto-refund",
            "name": "How to Process Refunds on Payment Terminal",
            "description": "Step-by-step guide to processing refunds via payment terminal or Antom Portal with PIN authentication",
            "tool": [{
                "@type": "HowToTool",
                "name": "EPOS Payment Terminal"
              },
              {
                "@type": "HowToTool",
                "name": "Admin PIN"
              }
            ],
            "step": [{
                "@type": "HowToStep",
                "name": "Void Order in POS First",
                "text": "Before processing refund on terminal, first void or return the order on the POS Frontend to keep settlement reports accurate. This is a mandatory first step.",
                "position": 1,
                "url": "https://www.epos.com.sg/knowledge-base-front-end-how-to-void-order/"
              },
              {
                "@type": "HowToStep",
                "name": "Navigate to Transactions",
                "text": "On the payment terminal, navigate to the Transactions tab to view all payment transactions.",
                "position": 2
              },
              {
                "@type": "HowToStep",
                "name": "Select Transaction to Refund",
                "text": "Select the transaction that has been paid and needs to be voided from the transaction list.",
                "position": 3
              },
              {
                "@type": "HowToStep",
                "name": "Tap Refund Button",
                "text": "Tap the Refund button to initiate the refund process.",
                "position": 4
              },
              {
                "@type": "HowToStep",
                "name": "Enter PIN for Approval",
                "text": "Enter the associated PIN for admin approval to authorise the refund.",
                "position": 5
              },
              {
                "@type": "HowToStep",
                "name": "Provide Refund Reason",
                "text": "Enter a refund reason for record-keeping, then click Refund to proceed.",
                "position": 6
              },
              {
                "@type": "HowToStep",
                "name": "Confirm Refund",
                "text": "Click Confirm to finalise the refund. The transaction will be marked as Refunded with the reason displayed. Customer receives instant refund.",
                "position": 7
              }
            ],
            "totalTime": "PT5M"
          },
          {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/payment-terminal/#howto-settlement",
            "name": "How to Access Settlement Reports",
            "description": "Guide to filtering and downloading daily and monthly settlement reports from Antom Dashboard",
            "supply": [{
              "@type": "HowToSupply",
              "name": "Antom Dashboard Login Credentials"
            }],
            "step": [{
                "@type": "HowToStep",
                "name": "Login to Antom Dashboard",
                "text": "Access the Antom Dashboard at https://dashboard.antom.com using your credentials.",
                "position": 1,
                "url": "https://dashboard.antom.com"
              },
              {
                "@type": "HowToStep",
                "name": "Navigate to Settlement Reports",
                "text": "Go to Finance > Settlement Reports from the main navigation menu.",
                "position": 2
              },
              {
                "@type": "HowToStep",
                "name": "Filter by Month or Year",
                "text": "Select a month to view daily reports, or select year to view monthly reports. Settlement reports are generated T+1 (next day after transaction).",
                "position": 3
              },
              {
                "@type": "HowToStep",
                "name": "Download Reports",
                "text": "Hover over a specific day to see Download button appear. Click to download settlement report for that day. Monthly reports available by second day of following month.",
                "position": 4
              }
            ],
            "totalTime": "PT3M"
          },
          {
            "@type": "BreadcrumbList",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/payment-terminal/#breadcrumb",
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
                "name": "Backend",
                "item": "https://www.epos.com.sg/knowledge-base-back-end/"
              },
              {
                "@type": "ListItem",
                "position": 4,
                "name": "Sales",
                "item": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/"
              },
              {
                "@type": "ListItem",
                "position": 5,
                "name": "Payment Terminal"
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
              "contactType": "sales",
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
add_action('wp_head', 'epos_add_knowledge_base_back_end_schema');
function epos_add_knowledge_base_back_end_schema()
{
	if (is_page('knowledge-base-back-end')) {

?>
<script type="application/ld+json" class="epos-schema">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "CollectionPage",
      "@id": "https://www.epos.com.sg/knowledge-base-back-end/#webpage",
      "url": "https://www.epos.com.sg/knowledge-base-back-end/",
      "name": "EPOS Knowledge Base Back End",
      "headline": "Backend Portal Management System User Guide",
      "description": "Comprehensive user guide for EPOS Backend Portal covering sales management, product configuration, customer management, inventory control, reporting, auditing, integrations, EPOS apps, and system setup.",
      "isPartOf": {
        "@id": "https://www.epos.com.sg/#website"
      },
      "about": {
        "@type": "SoftwareApplication",
        "name": "EPOS Backend Portal",
        "applicationCategory": "BusinessApplication",
        "applicationSubCategory": "Management System"
      },
      "breadcrumb": {
        "@id": "https://www.epos.com.sg/knowledge-base-back-end/#breadcrumb"
      },
      "inLanguage": "en-SG",
      "potentialAction": {
        "@type": "SearchAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "https://www.epos.com.sg/knowledge-base-back-end/?s={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      },
      "mainEntity": {
        "@id": "https://www.epos.com.sg/knowledge-base-back-end/#itemlist"
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://www.epos.com.sg/knowledge-base-back-end/#breadcrumb",
      "itemListElement": [
        {
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
          "name": "Backend Portal"
        }
      ]
    },
    {
      "@type": "ItemList",
      "@id": "https://www.epos.com.sg/knowledge-base-back-end/#itemlist",
      "name": "EPOS Backend Portal Knowledge Base Categories",
      "description": "Complete documentation for managing your EPOS system through the backend portal",
      "numberOfItems": 9,
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/",
            "name": "Sales",
            "description": "Manage sales transactions, payment methods, orders, and sales-related operations through the backend portal",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/erp-sales/"
          }
        },
        {
          "@type": "ListItem",
          "position": 2,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/products/",
            "name": "Products",
            "description": "Configure and manage products, pricing, categories, modifiers, and product-related settings",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/products/"
          }
        },
        {
          "@type": "ListItem",
          "position": 3,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/customers/",
            "name": "Customers",
            "description": "Manage customer database, loyalty programmes, customer groups, and customer-related features",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/customers/"
          }
        },
        {
          "@type": "ListItem",
          "position": 4,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/inventory/",
            "name": "Inventory",
            "description": "Control stock levels, manage suppliers, handle stock transfers, and monitor inventory operations",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/inventory/"
          }
        },
        {
          "@type": "ListItem",
          "position": 5,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/reporting/",
            "name": "Reporting",
            "description": "Generate and analyse sales reports, inventory reports, customer insights, and business analytics",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/reporting/"
          }
        },
        {
          "@type": "ListItem",
          "position": 6,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/audit/",
            "name": "Auditing",
            "description": "Track system changes, monitor user activities, and maintain audit trails for compliance",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/audit/"
          }
        },
        {
          "@type": "ListItem",
          "position": 7,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/integrations/",
            "name": "Integrations",
            "description": "Connect third-party services, payment gateways, accounting software, and e-commerce platforms",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/integrations/"
          }
        },
        {
          "@type": "ListItem",
          "position": 8,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/epos-apps/",
            "name": "EPOS Apps",
            "description": "Configure and manage EPOS mobile applications and companion apps",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/epos-apps/"
          }
        },
        {
          "@type": "ListItem",
          "position": 9,
          "item": {
            "@type": "HowTo",
            "@id": "https://www.epos.com.sg/knowledge-base-back-end/set-up/",
            "name": "Set Up",
            "description": "Initial system configuration, user management, outlet setup, and general settings",
            "url": "https://www.epos.com.sg/knowledge-base-back-end/set-up/"
          }
        }
      ]
    },
    {
      "@type": "SoftwareApplication",
      "@id": "https://www.epos.com.sg/knowledge-base-back-end/#software",
      "name": "EPOS Backend Portal",
      "applicationCategory": "BusinessApplication",
      "applicationSubCategory": "Point of Sale Management System",
      "operatingSystem": "Web Browser",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "SGD"
      },
      "featureList": [
        "Sales Management",
        "Product Configuration",
        "Customer Management",
        "Inventory Control",
        "Business Reporting",
        "Audit Tracking",
        "Third-party Integrations",
        "Multi-outlet Management",
        "User Access Control"
      ],
      "screenshot": "https://www.epos.com.sg/wp-content/uploads/backend-portal-screenshot.jpg",
      "provider": {
        "@id": "https://www.epos.com.sg/#organization"
      },
      "availableLanguage": "en-SG"
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
add_action('wp_head', 'epos_add_kitchen_display_system_schema');
function epos_add_kitchen_display_system_schema()
{
	if (is_page('kitchen-display-system')) {

?>
<script type="application/ld+json" class="epos-schema">
  {
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "TechArticle",
      "@id": "https://www.epos.com.sg/kitchen-display-system/#article",
      "url": "https://www.epos.com.sg/kitchen-display-system/",
      "headline": "Kitchen Display System (KDS)",
      "name": "Kitchen Display System (KDS) - Complete User Guide",
      "description": "Comprehensive guide to EPOS Kitchen Display System (KDS). Learn how to view orders, use elapsed timer, complete orders, dismiss items, and access order history. Reduces paper usage and enables direct interaction with kitchen orders.",
      "articleBody": "The Kitchen Display System (KDS) is an interactive screen designed to display kitchen orders efficiently. Compared to a traditional kitchen printer, the KDS offers several advantages: Reduces paper usage, Enables staff to interact directly with kitchen orders, Allows staff to access past order histories.",
      "about": {
        "@id": "https://www.epos.com.sg/kitchen-display-system/#software"
      },
      "author": {
        "@type": "Organization",
        "@id": "https://www.epos.com.sg/#organization"
      },
      "publisher": {
        "@id": "https://www.epos.com.sg/#organization"
      },
      "isPartOf": {
        "@id": "https://www.epos.com.sg/#website"
      },
      "breadcrumb": {
        "@id": "https://www.epos.com.sg/kitchen-display-system/#breadcrumb"
      },
      "inLanguage": "en-SG",
      "articleSection": "EPOS Knowledge Base",
      "keywords": [
        "kitchen display system",
        "KDS",
        "restaurant technology",
        "kitchen order management",
        "digital kitchen display",
        "F&B POS system",
        "kitchen order tracking"
      ],
      "hasPart": [
        {
          "@type": "HowToSection",
          "name": "Overview",
          "description": "Introduction to Kitchen Display System and its advantages over traditional kitchen printers"
        },
        {
          "@type": "HowToSection",
          "name": "View Options",
          "description": "Learn to toggle between Order View and Table View, and use action buttons for sorting and refreshing"
        },
        {
          "@type": "HowToSection",
          "name": "Elapsed Timer",
          "description": "Monitor order waiting times with colour-coded elapsed timer (green, yellow, red) and configure timer settings"
        },
        {
          "@type": "HowToSection",
          "name": "Complete Orders",
          "description": "Check off completed items and remove finished orders from the display"
        },
        {
          "@type": "HowToSection",
          "name": "Dismiss Orders",
          "description": "Handle order cancellations and item dismissals from the KDS"
        },
        {
          "@type": "HowToSection",
          "name": "Order History",
          "description": "Access and review past completed and voided orders"
        }
      ],
      "video": {
        "@type": "VideoObject",
        "name": "KDS Complete Orders Process",
        "description": "Video demonstration of checking items and completing orders in the Kitchen Display System",
        "contentUrl": "https://www.epos.com.sg/wp-content/uploads/2024/11/KDS-check-video.mp4",
        "thumbnailUrl": "https://www.epos.com.sg/wp-content/uploads/kds-video-thumbnail.jpg",
        "uploadDate": "2024-11-01"
      }
    },
    {
      "@type": "SoftwareApplication",
      "@id": "https://www.epos.com.sg/kitchen-display-system/#software",
      "name": "EPOS Kitchen Display System (KDS)",
      "applicationCategory": "BusinessApplication",
      "applicationSubCategory": "Restaurant Kitchen Management System",
      "operatingSystem": "Windows, Android, iOS"
    }
  ]
}
</script>
<?php
	}
}