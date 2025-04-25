function initSlider() {
  const $slider = jQuery(".testimonial-slider .col-inner");

  if (!$slider.length || typeof $slider.slick !== "function") {
    console.warn("Slider element not found or Slick not loaded.");
    return;
  }

  console.log("Initializing testimonial slider...");

  $slider.slick({
    dots: true,
    infinite: true,
    autoplay: true,
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

jQuery(document).ready(function ($) {
  initSlider();
  marqueeInit({
    uniqueid: "gallery-customize",
    type: "class",
    style: {},
    moveatleast: 3,
    savedirection: "1",
    mouse: "cursor driven",
    inc: 3,
    neutral: 150,
    random: false,
  });

  setTimeout(function () {
    var head = jQuery("#hs-form-iframe-0").contents().find("head");
    if (head.length > 0) {
      var css =
        '<style type="text/css">' +
        ".hs-form__virality-link{display:none};.actions, .hbspt-form form{margin-bottom:0px !important}.hs-button{background:#54BD95 !important;border-color:#54BD95 !important;} " +
        "</style>";

      jQuery(head).append(css);
    }
  }, 5000);
});
