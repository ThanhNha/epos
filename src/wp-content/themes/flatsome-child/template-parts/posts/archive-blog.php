<?php

/**
 * Template Name: Custom Blog Archive
 */

get_header(); ?>

<div class="containers">
    <div class="blog-banner out-container">
        <h1 class="page-title">The EPOS Blog</h1>
        <p>Explore the latest insights, trends and business tips for SMEs</p>

        <!-- Categories toggle -->
        <div class="category-toggle">
            <a href="<?php echo get_category_link(get_cat_ID('EPOS Business Tips')); ?>" class="button">Business Tips</a>
            <a href="<?php echo get_category_link(get_cat_ID('POS Guides')); ?>" class="button">POS Guides</a>
            <a href="<?php echo get_category_link(get_cat_ID('EPOS Recommends')); ?>" class="button">EPOS Recommends</a>
        </div>

        <!-- Search form -->
        <div class="search-form">
            <?php get_search_form(); ?>
        </div>
    </div>

    <!-- 4 most recent posts -->
    <div class="recent-posts grid">
        <?php
        $recent = new WP_Query(array(
            'posts_per_page' => 4,
            'post_type' => 'post',
            'ignore_sticky_posts' => 1
        ));
        if ($recent->have_posts()) :
            while ($recent->have_posts()) : $recent->the_post(); ?>
                <div class="feature-article">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
        <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>

    <!-- Newsletter form -->
    <div class="newsletter-signup">
        <?php echo do_shortcode('[block id="newsletter-blog-detail"]'); ?>
    </div>

    <!-- Category sections -->
    <?php
    $cats = array('epos-business-tips', 'pos-guides', 'epos-recommends');

    foreach ($cats as $slug) :
        $cat_obj = get_category_by_slug($slug);
        if (!$cat_obj) continue;
    ?>
        <div class="category-section">
            <h3 class="section-title section-title-center">
                <b></b>
                <span class="section-title-main"><?php echo esc_html($cat_obj->name); ?></span>
                <b></b>
            </h3>

            <?php
            $query = new WP_Query(array(
                'posts_per_page' => 8,
                'post_type'      => 'post',
                'ignore_sticky_posts' => 1,
                'category_name'  => $slug
            ));

            if ($query->have_posts()) : ?>
                <div class="category-block category-list">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="feature-article">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                                <h5 class="post-title is-large"><?php the_title(); ?></h5>
                                <div class="is-divider" bis_skin_checked="1"></div>
                                <p class="from_the_blog_excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php
        wp_reset_postdata();
    endforeach;
    ?>
    <div class="newsletter-signup">
        <?php echo do_shortcode('[block id="newsletter-blog-detail-4"]'); ?>
    </div>
</div>

<?php get_footer(); ?>