<?php 
function ajax_load_more_posts() {

  $offset = isset($_POST['offset']) ? max(0, intval($_POST['offset'])) : 0;
  $cat_id = isset($_POST['cat']) ? intval($_POST['cat']) : 0;

  $args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 8,
    'offset'              => $offset,
    'cat'                 => $cat_id,
    'ignore_sticky_posts' => 1,
    'orderby'             => 'date',
    'order'               => 'DESC',
  );

  $q = new WP_Query($args);

  ob_start();
  if ($q->have_posts()) :
    while ($q->have_posts()) : $q->the_post(); ?>
      <div class="feature-article">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('medium'); ?>
          <h5 class="post-title is-large"><?php the_title(); ?></h5>
          <div class="is-divider"></div>
          <p class="from_the_blog_excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
        </a>
      </div>
    <?php endwhile;
  endif;
  wp_reset_postdata();

  $html = ob_get_clean();

  echo $html;
  wp_die();
}
add_action('wp_ajax_load_more_posts', 'ajax_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'ajax_load_more_posts');
