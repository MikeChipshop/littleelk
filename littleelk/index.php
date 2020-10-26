<?php get_header(); ?>
<?php if ( have_posts() ) : ?>	
	<div class="lesp_wrap">
	<header class="lesp_blog-index-header">
		<h2>The Little Elk Blog</h2>
		<div class="lesp_blog-index-intro">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tincidunt justo est, vel feugiat justo porttitor sed. Aliquam dictum enim ac odio pharetra, ac ullamcorper purus suscipit. Fusce posuere leo urna, eleifend semper erat tincidunt eget. Cras a leo purus. Quisque convallis, libero et pretium ornare, mi felis suscipit velit, id elementum justo justo ac tortor. Mauris justo felis, bibendum eu ornare vel, sodales eget urna. Suspendisse potenti.
		</div>
	</header>
	<ul class="lesp_post-list">
		<?php while ( have_posts() ) : the_post(); ?>
			<li>
				<article>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('home-square'); ?>
						<h3><?php the_title(); ?></h3>
					</a>
				</article>
			</li>
		<?php endwhile; ?>
	</div>
<?php else: ?>
	No content
<?php endif; ?>
<?php get_footer(); ?>
