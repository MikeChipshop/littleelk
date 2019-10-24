<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="single-title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
