"use strict";function onload_shipping(){$("#ship-to-different-address input").prop("checked",!1).change().closest("h3").hide()}function hideAddPress(){$("#billing_company_field").hide(),$("#billing_company_field input").val(""),$("#billing_country_field").hide(),$("#billing_country_field input").val(""),$("#billing_address_1_field").hide(),$("#billing_address_1_field input").val(""),$("#billing_address_2_field").hide(),$("#billing_address_2_field input").val(""),$("#billing_state_field").hide(),$("#billing_state_field input").val(""),$("#billing_postcode_field").hide(),$("#billing_postcode_field input").val(""),$("#billing_state_field").hide(),$("#billing_state_field input").val(""),$("#billing_city_field").hide(),$("#billing_city_field input").val(""),$("#billing_city_field").hide(),$("#billing_city_field input").val(""),$(".woocommerce-NoticeGroup").hide()}function showAddPress(){$("#billing_company_field").show(),$("#billing_country_field").show(),$("#billing_address_1_field").show(),$("#billing_address_2_field").show(),$("#billing_city_field").show(),$("#billing_state_field").show(),$("#billing_postcode_field").show(),$("#billing_state_field").show(),$("#billing_state_field").show()}($=jQuery)(document).ready(function(){$("form.checkout input[name^='shipping_method']").val().match("^local_pickup")&&hideAddPress()});
