<?php
/*
  * Template Name: Our Chefs
  */
get_header(); ?>

    <?php while (have_posts()): the_post(); ?>
        <h1 class="chef-title text-center text-primary"><?php the_field('header_title'); ?></h1>
        <div class="chefs-container container-flex">
            <?php
            $args = array(
                'post_type' => 'chefs',
                'post_per_page' => 9,
                'orderby'   => 'title',
                'order'     => 'ASC',
            );

            $chefs = new WP_Query($args);

            while ($chefs->have_posts()): $chefs->the_post() ?>
                <?php get_template_part('templates/chefs', 'loop'); ?>
            <?php endwhile; wp_reset_postdata(); ?>

        </div>
    <?php endwhile; ?>

<?php get_footer(); ?>