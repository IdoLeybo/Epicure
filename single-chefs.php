<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <div class="chef-page-header">
        <h1><?php the_title(); ?></h1>
        <?php the_post_thumbnail('chef-card'); ?>
    </div>
    <div class="chef-page-content">
        <?php the_content(); ?>
    </div>
    <div class="chef-page-restaurants chef-restaurants-menu slider slides container-flex">
        <?php
        $chef = get_field('chef_name');
        $args = array(
            'post_type' => 'restaurants',
            'post_per_page' => 10,
            'orderby'   => 'title',
            'order'     => 'ASC',
            'category_name' => $chef
        );

        $restaurants = new WP_Query($args);

        while ($restaurants->have_posts()): $restaurants->the_post() ?>
            <?php get_template_part('templates/chefRestaurants', 'loop'); ?>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>