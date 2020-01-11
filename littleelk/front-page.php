<?php get_header(); ?>
<section class="lesp_home-hero">
    <div class="lesp_wrap">
        <div class="lesp_home-hero-container">
            <a href="#">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/img/banner.png">
            </a>
        </div>
    </div>
</section>

<main class="lesp_front-page-main">
    <section>
        <div class="lesp_wrap">
            <?php
                $orderby = 'name';
                $order = 'asc';
                $hide_empty = false ;
                $cat_args = array(
                    'orderby'    => $orderby,
                    'order'      => $order,
                    'hide_empty' => $hide_empty,
                );

                $product_categories = get_terms( 'product_cat', $cat_args );
            ?>
            <?php if( !empty($product_categories) ): ?>
                <ul class="lesp_home-categories">
                    <?php foreach ($product_categories as $key => $category): ?>
                        <li>
                            <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                                <div class="lesp_image-wrap">
                                <?php
                                    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                                    $image = wp_get_attachment_image_src( $thumbnail_id, 'home-square' );
                                ?>
                                <img src="<?php echo $image[0]; ?>">
                                </div>
                                <h2><?php echo $category->name; ?></h2>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </section>

    <!--
<?php

// The query
$args = array(
    'post_type'           => 'product',
    'posts_per_page'      => 3,
    'tax_query'           => array(
        array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured'
        ),
    ),
)
?>
<?php $loop = new WP_Query( $args ); ?>
<?php if ( $loop->have_posts() ): ?>
    <section>
        <div class="lesp_wrap">
            <ul>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <div class="lesp_image-wrap">
                            <?php the_post_thumbnail('home-square'); ?>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <h1 class="lesp_home-section-title">Little Elks Favourites</h1>
        </div>
    </section>
            <?php else: ?>
            No content in loop
<?php endif; ?>
-->
</main>
<?php get_footer(); ?>
