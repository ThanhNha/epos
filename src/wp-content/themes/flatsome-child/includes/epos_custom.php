<?php
add_action('wp_enqueue_scripts', 'shin_scripts');

function shin_scripts()
{
  $version = time();

  wp_enqueue_style('main-style-css', THEME_URL . '-child' . '/assets/dist/css/main.min.css', array(), $version, 'all');

  wp_enqueue_script('main-scripts-js', THEME_URL . '-child' . '/assets/dist/js/main.min.js', array('jquery'), $version, true);
}

//Add ACF options page
if (function_exists('acf_add_options_page')) {
  $parent = acf_add_options_page(__('Site Settings', 'Shin'));
}

// Local JSON acf
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
  $theme_dir = get_stylesheet_directory();
  // Create our directory if it doesn't exist.
  if (!is_dir($theme_dir .= '/acf-field')) {
    mkdir($theme_dir, 0755);
  }
  $path = get_stylesheet_directory() . '/acf-field';
  return $path;
}


add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
  // remove original path (optional)
  unset($paths[0]);
  $paths[] = get_stylesheet_directory() . '/acf-field';
  return $paths;
}


add_shortcode('slide_home_banner', 'home_banner');
function home_banner()
{
?>

  <div class="tabbed-content wrapper-tabs">
    <ul class="nav list-tabs" role="tablist">
      <?php if (have_rows('name_tab', 'option')) : ?>
        <?php $i = 0; ?>

        <?php while (have_rows('name_tab', 'option')) : the_row(); ?>

          <?php
          $title = get_sub_field('title');
          ?>

          <li id="tab-tab-<?php echo $i; ?>-title" class="tab has-icon <?php echo ($i == 0 ? 'active' : ''); ?>" role="presentation">
            <a href="#tab_tab-<?php echo $i; ?>-title" role="tab" aria-selected="<?php echo ($i == 0 ? 'true' : 'false') ?>" aria-controls="tab_tab-<?php echo $i; ?>-title">
              <span><?php echo $title; ?></span>
            </a>
          </li>
          <?php $i++; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </ul>

    <div class="tab-panels">
      <?php if (have_rows('tab_slide', 'option')) : ?>

        <?php while (have_rows('tab_slide', 'option')) : the_row(); ?>

          <div id="tab_tab-1-title" class="panel active entry-content" role="tabpanel" aria-labelledby="tab-tab-1-title">
            <div class="related-posts">
              <div class="wrapper-blogs">

                <?php if (have_rows('slider')) : ?>

                  <?php while (have_rows('slider')) : the_row(); ?>

                    <div class="card-blog ">
                      <?php if (have_rows('list_products')) : ?>

                        <?php while (have_rows('list_products')) : the_row(); ?>
                          <?php
                          $id_product =  get_sub_field('id_product');
                          $posision_y =  get_sub_field('posision_y');
                          $posision_x =  get_sub_field('posision_x');
                          $product_item = wc_get_product($id_product);
                          $class = 'product-' . $id_product;

                          $image_product = wp_get_attachment_image_src(get_post_thumbnail_id($id_product), 'single-post-thumbnail')
                          ?>
                          <?php if ($product_item) : ?>
                            <style>
                              <?php echo '.' . $class; ?>.tooltip-product {
                                left: <?php echo $posision_x . '%'; ?>;
                                top: <?php echo $posision_y . '%'; ?>;
                              }
                            </style>
                            <div class="tooltip-point <?php echo $class; ?>"></div>
                            <a href="<?php echo get_permalink($id_product) ?>" class="<?php echo $class; ?> tooltip-product active">
                              <div class="tooltip-icon-bottom"></div>

                              <div class="tooltip-dot"></div>
                              <img src="<?php echo $image_product[0]; ?>" alt="">
                              <div class="info-product">
                                <div class="name-wrapper">
                                  <!-- <span class="lable">New</span> -->
                                  <span class="name"><?php echo $product_item->name ?></span>
                                </div>
                                <div class="price-wrapper">
                                  <span class="price-sale"><?php echo  $product_item->sale_price; ?></span>
                                  <span class="price-rergular"> <?php echo $product_item->regular_price; ?></span>
                                </div>
                              </div>
                              <div class="tooltip-icon"></div>

                            </a>
                          <?php endif; ?>


                        <?php endwhile; ?>

                      <?php endif; ?>
                      <?php $image =  get_sub_field('image'); ?>

                      <div class="tool-carousel-button"></div>
                      <img class="carousel-image" src="<?php echo $image; ?>" alt="Carousel Image 4">
                    </div>

                  <?php endwhile; ?>

                <?php endif; ?>
              </div>
              <div class="w-full h-full">
                <div class="prev-slick-btn">
                </div>
                <div class="next-slick-btn">
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

      <?php endif; ?>


    </div>
  </div>

<?php

}
