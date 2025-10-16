<?php get_header(); ?>

<div class="blog-banner out-container">
  <h1 class="page-title"><?php single_cat_title(); ?></h1>
  <p><?php echo category_description(); ?></p>

  <div class="category-toggle">
    <a href="<?php echo get_category_link(get_cat_ID('EPOS Business Tips')); ?>" class="button">Business Tips</a>
    <a href="<?php echo get_category_link(get_cat_ID('POS Guides')); ?>" class="button">POS Guides</a>
    <a href="<?php echo get_category_link(get_cat_ID('EPOS Recommends')); ?>" class="button">EPOS Recommends</a>
  </div>

  <div class="search-form">
    <?php get_search_form(); ?>
  </div>
</div>

<div class="category-archive">
  <?php
  $args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 8,
    'cat'                 => get_queried_object_id(),
    'paged'               => 1,
    'ignore_sticky_posts' => 1,
    'orderby'             => 'date',
    'order'               => 'DESC',
  );
  $custom_query = new WP_Query($args);

  if ($custom_query->have_posts()) : ?>
    <div id="post-container" class="category-list grid">
      <?php
      $count = 0;
      while ($custom_query->have_posts()) : $custom_query->the_post();
        $count++; ?>
        <div class="feature-article">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium'); ?>
            <h5 class="post-title is-large"><?php the_title(); ?></h5>
            <div class="is-divider"></div>
            <p class="from_the_blog_excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
          </a>
        </div>
        <?php if ($count == 4) : ?>
          <div class="between-posts newsletter-signup">
            <?php echo do_shortcode('[block id="newsletter-blog-detail"]'); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>

    <div class="load-more">
      <button id="load-more"
        data-offset="8"
        data-cat="<?php echo get_queried_object_id(); ?>">
        Load More
      </button>
    </div>

  <?php endif; wp_reset_postdata(); ?>
</div>

<div class="newsletter-signup">
  <?php echo do_shortcode('[block id="newsletter-blog-detail-4"]'); ?>
</div>

<?php get_footer(); ?>
