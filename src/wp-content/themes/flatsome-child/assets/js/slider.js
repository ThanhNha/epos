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
  // Font Poppins
  setTimeout(function () {
    jQuery("iframe[id^='hs-form-iframe']").each(function () {
      var iframe = jQuery(this).contents();
      var head = iframe.find("head");

      // check form id
      // var targetForm = iframe.find(
      //   "#hsForm_8cb9dee2-73d0-4646-9ff2-22e0e0bf5035,  #hsForm_702cef7e-0096-4839-b15e-6c45e65932cf",
      // );

      if (head.length > 0) {
        var css =
          '<style type="text/css" class="hs-form-styling">' +
          "input[type='text'], input[type='email'], input[type='tel'], textarea, select { " +
          "border-radius: 8px !important; " +
          "padding: 10px !important; " +
          "font-family: 'Poppins', sans-serif !important;" +
          "} " +
          ".hs-input:not([type='checkbox']):not([type='radio']) { " +
          "height: 47px !important; " +
          "box-sizing: border-box;" +
          "} " +
          "input[type='checkbox'], input[type='radio'] { " +
          "height: auto !important;" +
          "} " +
          "::placeholder { font-family: 'Poppins', sans-serif !important; } " +
          "label { display:block; margin-bottom:10px !important; } " +
          ".hs-button { border-radius:8px !important; padding: 17px 24px  !important;} " +
          ".hs-button:hover { background-color: #20821c !important;color: #fff !important; border-color: #20821c !important; } " +
          ".hs-form a:visited { color:#ffffff !important; } " +
          ".hs-form a:hover { color:#58cc52 !important; } " +
          ".actions { margin-top: 18px; margin-bottom: 0px; padding: 17px 0px 0px;} " +
          "</style>";

        head.append(css);
      }
    });
  }, 5000);
  //font Montserrat
  // setTimeout(function () {
  //   jQuery("iframe[id^='hs-form-iframe']").each(function () {
  //     var iframe = jQuery(this).contents();
  //     var head = iframe.find("head");

  //     // check form id
  //     var targetForm = iframe.find(
  //       "#hsForm_e6f14b90-9cc2-44dc-9547-4097ec030031",
  //     );

  //     if (head.length > 0 && targetForm.length > 0) {
  //       var css =
  //         '<style type="text/css">' +
  //         "input[type='text'], input[type='email'], input[type='tel'], textarea, select { " +
  //         "border-radius: 8px !important; " +
  //         "padding: 10px !important; " +
  //         "font-family: 'Montserrat', sans-serif !important;" +
  //         "} " +
  //         ".hs-input:not([type='checkbox']):not([type='radio']) { " +
  //         "height: 47px !important; " +
  //         "box-sizing: border-box;" +
  //         "} " +
  //         "input[type='checkbox'], input[type='radio'] { " +
  //         "height: auto !important;" +
  //         "} " +
  //         "::placeholder { font-family: 'Montserrat', sans-serif !important; } " +
  //         "label { display:block; margin-bottom:10px !important; } " +
  //         ".hs-button { border-radius:8px !important; padding: 17px 24px  !important;} " +
  //         ".hs-form a:visited { color:#ffffff !important; } " +
  //         ".hs-form a:hover { color:#58cc52 !important; } " +
  //         "</style>";

  //       head.append(css);
  //     }
  //   });
  // }, 5000);

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
