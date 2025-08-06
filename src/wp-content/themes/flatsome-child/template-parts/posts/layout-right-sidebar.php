<?php
do_action('flatsome_before_blog');
?>

<?php if (!is_single() && flatsome_option('blog_featured') == 'top') {
	get_template_part('template-parts/posts/featured-posts');
} ?>

<div class="row row-large <?php if (flatsome_option('blog_layout_divider')) echo 'row-divided '; ?>">

	<div class="large-9 col">
		<?php if (!is_single() && flatsome_option('blog_featured') == 'content') {
			get_template_part('template-parts/posts/featured-posts');
		} ?>
		<?php
		if (is_single()) {
			get_template_part('template-parts/posts/partials/single-featured', get_theme_mod('blog_post_style'));

			get_template_part('template-parts/posts/single');

			comments_template();
		} elseif (flatsome_option('blog_style_archive') && (is_archive() || is_search())) {
			get_template_part('template-parts/posts/archive', flatsome_option('blog_style_archive'));
		} else {
			get_template_part('template-parts/posts/archive', flatsome_option('blog_style'));
		}
		?>
	</div>
	<div class="custom-post-sidebar large-3 col">
		<?php flatsome_sticky_column_open('blog_sticky_sidebar'); ?>
		<div class="author-sidebar">
			<p class="name-author">by <span><?php the_author(); ?><span></p>
			<p class="post-date">Posted on <?php echo get_the_date(); ?></p>
		</div>
		<div class="toc-widget">
          <?php echo do_shortcode('[lwptoc]'); ?>
        </div>
		<?php flatsome_sticky_column_close('blog_sticky_sidebar'); ?>
	</div>
</div>

<?php
do_action('flatsome_after_blog');
?>