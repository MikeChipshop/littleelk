<?php get_header(); ?>
<?php $i = 0; ?>
<?php if( have_rows('front_page_banner') ): ?>
    <section class="lesp_home-hero">
        <div class="lesp_wrap">
            <div class="lesp_home-hero-container">
                <?php while ( have_rows('front_page_banner') ) : the_row(); ?>
                    <div class="lesp_slider-item">
                        <?php
                            // Desktop Image
                            $attachment_id = get_sub_field('banner_item_image');
                            $size = "slide-d";
                            $image = wp_get_attachment_image_src( $attachment_id, $size );
                            $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);

                            // Mobile Image
                            $attachment_id_mobile = get_sub_field('banner_item_image_mobile');
                            $size_mobile = "slide-m";
                            $image_mobile = wp_get_attachment_image_src( $attachment_id_mobile, $size_mobile );
                            $alt_mobile = get_post_meta($attachment_id_mobile, '_wp_attachment_image_alt', true);
                        ?>                    
                        <style>
                            #lesp_slide-<?php echo $i; ?> {
                                background:url('<?php echo $image[0]; ?>') no-repeat center center;
                                background-size:cover;
                                padding-bottom: 35.4609929078%;
                                display:block;
                            }
                            @media only screen and (max-width : 720px)  { 
                                #lesp_slide-<?php echo $i; ?> {
                                    background:url('<?php echo $image_mobile[0]; ?>') no-repeat center center;
                                    background-size:cover;
                                    padding-bottom:120%;
                                    display:block;
                                }
                            }
                        </style>
                        <a href="<?php the_sub_field('banner_item_link'); ?>" title="<?php the_sub_field('banner_item_title'); ?>" id="lesp_slide-<?php echo $i; ?>">
                            <h2><?php the_sub_field('banner_item_title'); ?></h2>
                        </a>
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

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
