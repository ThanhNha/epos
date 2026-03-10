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


  function isMobile() {
    return /Mobi|Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent,
    );
  }
});
