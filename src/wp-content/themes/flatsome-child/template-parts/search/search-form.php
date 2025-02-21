<div class="searchform-wrapper ux-search-box relative is-normal">
  <form role="search" method="get" class="searchform" action="<?php echo home_url();?>">
    <div class="flex-row relative">
      <div class="flex-col flex-grow">
        <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
        <input type="search" id="woocommerce-product-search-field-0" class="search-field mb-0" placeholder="Search…" value="" name="s" autocomplete="off">
        <input type="hidden" name="post_type" value="product">
      </div>
      <div class="flex-col">
        <button type="submit" value="Search" class="ux-search-submit submit-button secondary button icon mb-0" aria-label="Submit">
          <i class="icon-search"></i> </button>
      </div>
    </div>
    <div class="live-search-results text-left z-top">
      <div class="autocomplete-suggestions"></div>
    </div>
  </form>
</div>
