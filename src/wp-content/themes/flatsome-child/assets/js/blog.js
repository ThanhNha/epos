("use strict");
$ = jQuery;

jQuery(document).ready(function ($) {
  const $btn = $("#load-more");
  if (!$btn.length) return;

  $btn.on("click", function () {
    const $container = $("#post-container");
    if (!$container.length) return;

    let offset = parseInt($btn.data("offset")) || 0;
    let cat = $btn.data("cat");

    $btn.prop("disabled", true).text("Loading...");

    $.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "load_more_posts",
        offset: offset,
        cat: cat,
      },
      success: function (res) {
        const trimmed = $.trim(res);
        if (trimmed) {
          $container.append(trimmed);
          $btn.data("offset", offset + 8);
          $btn.prop("disabled", false).text("Load More");
        } else {
          $btn.remove();
        }
      },
      error: function () {
        $btn.prop("disabled", false).text("Error, try again");
      },
    });
  });
});
