<?php get_header(); ?>
<div class="lesp_page-wrap">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php woocommerce_content(); ?>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
