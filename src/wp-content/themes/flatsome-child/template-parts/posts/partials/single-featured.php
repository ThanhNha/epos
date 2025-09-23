<?php while (have_posts()) : the_post(); ?>
	<div class="page-title blog-featured-title featured-title no-overflow">

		<div class="page-title-bg fill">
			<?php if (has_post_thumbnail() && get_theme_mod('blog_single_featured_image', 1)) { // check if the post has a Post Thumbnail assigned to it.
			?>
				<div class="title-bg fill bg-fill bg-top" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'large'); ?>');" data-parallax-fade="true" data-parallax="-2" data-parallax-background data-parallax-container=".page-title"></div>
			<?php } ?>
			<div class="title-overlay fill" style="background-color: rgba(0,0,0,.5)"></div>
		</div>

		<div class="page-title-inner container  flex-row  dark is-large" style="min-height: 300px">
			<div class="flex-col flex-center text-center w-50">
				<?php get_template_part('template-parts/posts/partials/entry', 'title');  ?>
			</div>
		</div>

	</div>
	<div class="mobile-banner-wrapper">
		<h1 class="blog-title"><?php the_title(); ?></h1>
		<div class="blog-category-name">
			<?php echo get_the_category_list(__(', ', 'flatsome')) ?>
		</div>
		<div class="mobile-banner">
			<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'large'); ?>" alt="Mobile Banner">
		</div>
		<div class="author-sidebar">
			<p class="name-author">by <span><?php the_author(); ?><span></p>
			<p class="post-date">Posted on <?php echo get_the_date(); ?></p>
		</div>
		<div class="toc-widget">
			<?php echo do_shortcode('[lwptoc hierarchical="1" numeration="none" title="Table of Contents" smoothScrollOffset="120" titleFontSize="150%" itemsFontSize="100%"]'); ?>
		</div>
		<div class="newsletter">
			<?php echo do_shortcode('[block id="newsletter-blog-detail"]'); ?>
		</div>
	</div>
<?php endwhile; ?>