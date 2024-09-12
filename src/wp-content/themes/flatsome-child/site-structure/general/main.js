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

function customAccordion() {
  const accordion = $(".accordion .accordion-title");
  $.each(accordion, function (indexInArray, valueOfElement) {
    $(this).on("click", function (e) {
      e.preventDefault();
      $(this).parent().toggleClass("shin");
      if ($(this).parent().hasClass("shin")) {
        $(this)
          .addClass("active")
          .next()
          .slideDown(200, function () {
            /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(
              navigator.userAgent
            ) &&
              $.scrollTo($(this).prev(), {
                duration: 300,
                offset: -100,
              });
          }),
          window.requestAnimationFrame(function () {
            $.fn.flickity &&
              $(e)
                .next()
                .find("[data-flickity-options].flickity-enabled")
                .each(function (t, e) {
                  $(e).flickity("resize");
                }),
              $.fn.packery &&
                $(e).next().find("[data-packery-options]").packery("layout");
          });
      } else {
        $(this)
          .removeClass("active")
          .next()
          .slideUp(200);
      }
    });
  });
  // $(".accordion").on("click", ".accordion-title.plain", function () {

  // });
}

$(document).ready(function () {
  customAccordion();
  validation_address_2();
  var val = $("form.checkout input[name^='shipping_method']").val();
  if (val.match("^local_pickup")) {
    hideAddPress();
  }
});
