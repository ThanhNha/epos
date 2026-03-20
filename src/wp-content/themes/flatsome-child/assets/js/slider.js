function initSlider() {
  const $slider = jQuery(".testimonial-slider .col-inner");

  if (!$slider.length || typeof $slider.slick !== "function") {
    return;
  }

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
    jQuery("#modal").fadeIn().css("display", "flex");
  });

  jQuery(".close, #modal").on("click", function (e) {
    if (jQuery(e.target).is(".close") || jQuery(e.target).is("#modal")) {
      jQuery("#modal").fadeOut();
    }
  });
}

jQuery(document).ready(function ($) {
  if ($(".category-list").length > 0) {
    $(".category-list").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: true,
      dots: true,
      autoplay: false,
      responsive: [
        { breakpoint: 1024, settings: { slidesToShow: 3 } },
        { breakpoint: 768, settings: { slidesToShow: 2 } },
        { breakpoint: 480, settings: { slidesToShow: 1 } },
      ],
    });
  }
  setTimeout(function () {
    if ($(".testimonial-slider .col-inner").length > 0) {
      initSlider();
    }
  }, 2000);

  setTimeout(function () {
    jQuery("iframe[id^='hs-form-iframe']").each(function () {
      var head = jQuery(this).contents().find("head");
      if (head.length > 0) {
        var css =
          '<style type="text/css">' +
          /* input + textarea + select */
          "input[type='text'], input[type='email'], input[type='tel'], textarea, select { " +
          "border-radius: 8px !important; " +
          "padding: 10px !important; " +
          "font-family: 'Poppins', sans-serif !important;" +
          "} " +
          /* hs input height except checkbox & radio */
          ".hs-input:not([type='checkbox']):not([type='radio']) { " +
          "height: 47px !important; " +
          "box-sizing: border-box;" +
          "} " +
          /* checkbox + radio auto height */
          "input[type='checkbox'], input[type='radio'] { " +
          "height: auto !important;" +
          "} " +
          /* placeholder */
          "::placeholder { font-family: 'Poppins', sans-serif !important; } " +
          /* label spacing */
          "label { display:block; margin-bottom:10px !important; } " +
          /* button */
          ".hs-button { border-radius:8px !important; padding: 17px 24px  !important;} " +
          /* link visited */
          ".hs-form a:visited { color:#ffffff !important; } " +
          /* link hover */
          ".hs-form a:hover { color:#58cc52 !important; } " +
          "</style>";

        head.append(css);
      }
    });
  }, 5000);

  function isMobile() {
    return /Mobi|Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent,
    );
  }

  if ($(".our-portfolio-slider").length) {
    $(".our-portfolio-slider").slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      infinite: true,
      autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }
});
