<?php
/*
  * Template Name: Our Restaurants
  */
get_header(); ?>
    <?php if(have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>

            <?php $filter1 = get_post_field('filter_1', get_post()) ?>
            <?php $filter2 = get_post_field('filter_2', get_post()) ?>
            <?php $filter3 = get_post_field('filter_3', get_post()) ?>
            <?php $filter4 = get_post_field('filter_4', get_post()) ?>


            <div class="controllers text-center">
                <a href="#<?php echo $filter1 ?>">
                    <span id="all" class="text-primary text-center"><?php echo the_field('filter_1'); ?></span>
                </a>
                <a href="#<?php echo $filter2 ?>">
                    <span class="text-primary text-center"><?php echo the_field('filter_2'); ?></span>
                </a>
                <a href="#<?php echo $filter3 ?>">
                    <span class="text-primary text-center"><?php echo the_field('filter_3'); ?></span>
                </a>
                <a href="#<?php echo $filter4 ?>">
                    <span class="text-primary text-center"><?php echo the_field('filter_4'); ?></span>
                </a>
            </div>


        <div class="container-menu container-flex">
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

        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>