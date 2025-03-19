"use strict";
$ = jQuery;
function onload_shipping() {
  $("#ship-to-different-address input")
    .prop("checked", false)
    .change()
    .closest("h3")
    .hide();
}

function hideAddPress() {
  $("#billing_company_field").addClass("hidden");
  $("#billing_company_field input").val("");

  $("#billing_country_field").addClass("hidden");

  $("#billing_address_1_field").addClass("hidden");
  $("#billing_address_1_field input").val("");

  $("#billing_address_2_field").addClass("hidden");
  $("#billing_address_2_field input").val("");

  $("#billing_state_field").addClass("hidden");
  $("#billing_state_field input").val("");

  $("#billing_postcode_field").addClass("hidden");
  $("#billing_postcode_field input").val("");

  $("#billing_state_field").addClass("hidden");
  $("#billing_state_field input").val("");

  $("#billing_city_field").addClass("hidden");
  $("#billing_city_field input").val("");

  $(".woocommerce-NoticeGroup").addClass("hidden");
}

function showAddPress() {
  $("#billing_company_field").removeClass("hidden hide");
  $("#billing_country_field").removeClass("hidden hide");
  $("#billing_address_1_field").removeClass("hidden hide");
  $("#billing_address_2_field").removeClass("hidden hide");
  $("#billing_city_field").removeClass("hidden hide");
  $("#billing_state_field").removeClass("hidden hide");
  $("#billing_postcode_field").removeClass("hidden hide");
  $("#billing_state_field").removeClass("hidden hide");
  $("#billing_state_field").removeClass("hidden hide");
}

function validation_address_2() {
  $("body").on("blur change", "#billing_address_2", function () {
    const wrapper = $(this).closest(".form-row");
    if ($(this).val().replace(/\s/g, "") == "") {
      wrapper.addClass("woocommerce-invalid"); // error
    } else {
      wrapper.addClass("woocommerce-validated"); // success
    }
  });
}

function toogle_shipping_popup() {
  $("body").on("click", "#shipping_tool", function (e) {
    e.preventDefault();
    $(".toogle_shipping_popup").click();
  });
}

function customAccordion() {
  const accordion = $(".accordion .accordion-title");

  accordion.each(function () {
    $(this).on("click", function (e) {
      e.preventDefault();

      const $parent = $(this).parent();
      const $content = $(this).next();

      $parent.toggleClass("shin");

      if ($parent.hasClass("shin")) {
        $(this).addClass("active");
        $content.slideDown(200, function () {
          if (
            /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(
              navigator.userAgent
            ) &&
            $.fn.scrollTo
          ) {
            $.scrollTo($(this).prev(), {
              duration: 300,
              offset: -100,
            });
          }
        });

        window.requestAnimationFrame(() => {
          if ($.fn.flickity) {
            $content
              .find("[data-flickity-options].flickity-enabled")
              .each(function () {
                $(this).flickity("resize");
              });
          }
          if ($.fn.packery) {
            $content.find("[data-packery-options]").packery("layout");
          }
        });
      } else {
        $(this).removeClass("active");
        $content.slideUp(200);
      }
    });
  });
}

$(document).ready(function () {
  customAccordion();
  toogle_shipping_popup();
  validation_address_2();
  var val = $("form.checkout input[name^='shipping_method']").val();
  if (val.match("^local_pickup")) {
    hideAddPress();
  }
});

setTimeout(function () {
  var head = jQuery("#hs-form-iframe-0").contents().find("head");
  if (head.length > 0) {
    var css =
      '<style type="text/css">' +
      ".hs-form__virality-link{display:none};.actions,form{margin-bottom:0px !important} " +
      "</style>";

    jQuery(head).append(css);
  }
}, 5000);
