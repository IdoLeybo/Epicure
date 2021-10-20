<?php get_header(); ?>

    <?php while (have_posts()): the_post(); ?>

        <div class="restaurant-details text-center">
            <img class="restaurant-image" src="<?php echo get_field('header_image') ?>">
            <h1 class="text-primary"><?php the_title(); ?></h1>
            <p class="text-primary chef-name"><?php the_field('chef_name'); ?></p>
            <p class="time"><img src="<?php echo get_template_directory_uri() . '/img/clock-icon.png' ;?>"> <span class="text-primary"> Open now</span></p>
        </div>

        <?php $slug = get_post_field('post_name', get_post()) ?>
        <?php $filter1 = get_post_field('filter_1', get_post()) ?>
        <?php $filter2 = get_post_field('filter_2', get_post()) ?>
        <?php $filter3 = get_post_field('filter_3', get_post()) ?>

        <div class="dish-controllers text-center">
            <a href="#<?php echo $filter1 ?>">
                <span class="text-primary text-center"><?php echo the_field('filter_1'); ?></span>
            </a>
            <a href="#<?php echo $filter2 ?>">
                <span class="text-primary text-center"><?php echo the_field('filter_2'); ?></span>
            </a>
            <a href="#<?php echo $filter3 ?>">
                <span class="text-primary text-center"><?php echo the_field('filter_3'); ?></span>
            </a>
        </div>

        <div class="container-menu container-flex">
            <?php
            $args = array(
                'post_type' => 'dishes',
                'post_per_page' => 10,
                'orderby'   => 'title',
                'order'     => 'ASC',
                'category_name' => $slug
            );

            $dishes = new WP_Query($args);

            while ($dishes->have_posts()): $dishes->the_post() ?>
                <?php get_template_part('templates/dishes', 'loop'); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
<?php endwhile; ?>

<?php get_footer(); ?>