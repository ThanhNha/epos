function initSlider() {
  const $slider = jQuery(".testimonial-slider .col-inner");

  if (!$slider.length || typeof $slider.slick !== "function") {
    console.warn("Slider element not found or Slick not loaded.");
    return;
  }

  console.log("Initializing testimonial slider...");

  // Strrigger Read more
  testimonialDes();

  $slider.slick({
    dots: true,
    infinite: false,
    autoplay: false,
    arrows: false,
    speed: 500,
    autoplaySpeed: 3500,
    slidesToShow: 3,
    slidesToScroll: 1,
    variableWidth: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
}

function testimonialDes() {
  const $des = jQuery(".testimonial-slider .tes-description");
  const $item = jQuery(".testimonial-slider .tes-item");
  $des.each(function (index) {
    const $desc = jQuery(this);
    const $p = $desc.find("p");

    // Clone for measuring
    const $clone = $p
      .clone()
      .css({
        visibility: "hidden",
        position: "absolute",
        webkitLineClamp: "unset",
        display: "block",
        height: "auto",
      })
      .removeClass()
      .appendTo($item.eq(index));

    if (!jQuery(this).hasClass("skip")) {
      if ($clone.height() > $p.height()) {
        // Append icon
        const $icon = jQuery('<span class="read-more-icon">Read more</span>');
        $desc.append($icon);
      }
    }

    $clone.remove();
  });

  // Modal logic
  jQuery(document).on("click", ".read-more-icon", function () {
    const fullText = jQuery(this).siblings("p").html();
    jQuery("#modalText").empty();
    jQuery("#modalText").append(fullText);
    jQuery("#modal").fadeIn();
  });

  jQuery(".close, #modal").on("click", function (e) {
    if (jQuery(e.target).is(".close") || jQuery(e.target).is("#modal")) {
      jQuery("#modal").fadeOut();
    }
  });
}

jQuery(document).ready(function ($) {
  setTimeout(function () {
    initSlider();
    marqueeInit({
      uniqueid: "gallery-customize",
      style: {},
      type: "class",
      moveatleast: 3,
      savedirection: "1",
      mouse: "cursor driven",
      inc: 3,
      neutral: 200,
      random: false,
    });
  }, 2000);

  setTimeout(function () {
    var head = jQuery("#hs-form-iframe-0").contents().find("head");
    if (head.length > 0) {
      var css = `
        <style type="text/css">
          .hs-form__virality-link { display: none; }
          .actions, .hbspt-form form { margin-bottom: 0px !important; }
          .hs-button:hover { box-shadow: inset 0 0 0 100px rgba(0,0,0,.2); }
          .hs-button { background: #54BD95 !important; border: 0px !important; }
          ${
            isMobile()
              ? "@media (max-width: 768px) { .hs-button { width: 100%; } }"
              : ""
          }
        </style>
      `;
      jQuery(head).append(css);
    }
  }, 5000);

  function isMobile() {
    return /Mobi|Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    );
  }
});
