<?php get_header(); ?>

<div class="page-404">
    <div class="inner">
        <div class="oops">Oops!</div>
        <div class="title">404 - PAGE NOT FOUND</div>
        <div class="desc">
            The page you are looking for might have been removed<br>
            had its name changed or is temporarily unavailable.
        </div>
        <a href="<?php echo home_url('/'); ?>" class="btn-home">
            GO TO HOMEPAGE
        </a>
    </div>
</div>

<?php get_footer(); ?>