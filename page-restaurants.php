<?php
/*
  * Template Name: Our Restaurants
  */
get_header(); ?>
    <?php if(have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>

            <h1 class="res-header-title-mobile text-center text-primary" style="display: none">RESTAURANTS</h1>

            <?php $filter1 = get_post_field('filter_1', get_post()) ?>
            <?php $filter2 = get_post_field('filter_2', get_post()) ?>
            <?php $filter3 = get_post_field('filter_3', get_post()) ?>
            <?php $filter4 = get_post_field('filter_4', get_post()) ?>

            <div class="controllers text-center">
                <a href="#" class="myHref">
                    <span id="all" class="text-primary text-center current-filter"><?php echo the_field('filter_1'); ?></span>
                </a>
                <a href="#" class="myHref">
                    <span id="new" class="text-primary text-center"><?php echo the_field('filter_2'); ?></span>
                </a>
                <a href="#" class="myHref">
                    <span id="popular" class="text-primary text-center"><?php echo the_field('filter_3'); ?></span>
                </a>
                <a href="#" class="myHref">
                    <span id="open" class="text-primary text-center"><?php echo the_field('filter_4'); ?></span>
                </a>
            </div>


        <div id="all-Div" class="container-menu container-flex">
            <?php
            $args = array(
                'post_type' => 'restaurants',
                'post_per_page' => 10,
                'orderby'   => 'title',
                'order'     => 'ASC',
                'category_name' => 'restaurant'
            );

            $restaurants = new WP_Query($args);

            while ($restaurants->have_posts()): $restaurants->the_post() ?>
                <?php get_template_part('templates/restaurants', 'loop'); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div id="new-Div" class="container-menu container-flex" style="display: none">
            <?php
            $args = array(
                'post_type' => 'restaurants',
                'post_per_page' => 10,
                'orderby'   => 'title',
                'order'     => 'ASC',
                'category_name' => 'new_restaurant'
            );

            $restaurants = new WP_Query($args);

            while ($restaurants->have_posts()): $restaurants->the_post() ?>
                <?php get_template_part('templates/restaurants', 'loop'); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div id="popular-Div" class="container-menu container-flex" style="display: none">
            <?php
            $args = array(
                'post_type' => 'restaurants',
                'post_per_page' => 10,
                'orderby'   => 'title',
                'order'     => 'ASC',
                'category_name' => 'most_popular'
            );

            $restaurants = new WP_Query($args);

            while ($restaurants->have_posts()): $restaurants->the_post() ?>
                <?php get_template_part('templates/restaurants', 'loop'); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div id="open-Div" class="container-menu container-flex" style="display: none">
            <?php
            $args = array(
                'post_type' => 'restaurants',
                'post_per_page' => 10,
                'orderby'   => 'title',
                'order'     => 'ASC',
                'category_name' => 'open_now'
            );

            $restaurants = new WP_Query($args);

            while ($restaurants->have_posts()): $restaurants->the_post() ?>
                <?php get_template_part('templates/restaurants', 'loop'); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>