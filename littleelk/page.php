<?php get_header(); ?>
<div class="lesp_page-wrap">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <header>
        <h1 class="lesp_page-title"><?php the_title(); ?></h1>
    </header>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
