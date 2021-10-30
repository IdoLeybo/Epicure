<?php get_header(); ?>

    <?php while (have_posts()): the_post(); ?>
        <section class="hero-section">
            <div class="hero-header">
                <h1 class="text-primary text-center"><?php the_field('hero_title'); ?></h1>
<!--                --><?php //echo do_shortcode("[search-in-place-form]"); ?>
                <?php get_template_part('templates/filter', 'herosearch'); ?>
            </div>

        </section>
        <div class="hero-menu">
            <div class="header-menu">
                <?php
                $args = array(
                    'theme_location' => 'header-menu',
                    'container'      => 'nav',
                    'container_class' => 'hero-nav text-primary'
                );
                wp_nav_menu($args);
                ?>
            </div><!--.menu-->
        </div>

        <section class="popular-section">
            <h1 class="text-primary text-center"><?php the_field('popular_title'); ?></h1>
            <div class="container-menu container-flex slider slides">
                <?php
                $args = array(
                    'post_type' => 'restaurants',
                    'post_per_page' => 3,
                    'orderby'   => 'title',
                    'order'     => 'ASC',
                    'category_name' => 'most_popular'
                );

                $dishes = new WP_Query($args);

                while ($dishes->have_posts()): $dishes->the_post() ?>
                    <?php get_template_part('templates/restaurants', 'loop'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div
            <div>
                <a href="http://bedrock-local.co.il/allrestaurants/">
                    <span class="text-primary">All Restaurants >></span>
                </a>
            </div>
        </section>

        <section class="signature-section">
            <h1 class="text-primary text-center"><?php the_field('signature_title'); ?></h1>
            <div class="container-menu container-flex  slider slides">
                <?php
                $args = array(
                    'post_type' => 'dishes',
                    'post_per_page' => 3,
                    'orderby'   => 'title',
                    'order'     => 'ASC',
                    'category_name' => 'signature'
                );

                $dishes = new WP_Query($args);

                while ($dishes->have_posts()): $dishes->the_post() ?>
                    <?php get_template_part('templates/frontpage', 'dish'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </section>

        <section class="icon-section">
            <h1 class="text-primary text-center"><?php the_field('icons_title'); ?></h1>
            <div class="icons-container container-flex">
                <div class="icon-item">
                    <img width="79" height="59" src="<?php the_field('iconimg_1'); ?>" />
                    <p><?php the_field('icon_name_1'); ?></p>
                </div>
                <div class="icon-item">
                    <img width="61" height="61" src="<?php the_field('iconimg_2'); ?>" />
                    <p><?php the_field('icon_name_2'); ?></p>
                </div>
                <div class="icon-item">
                    <img width="69" height="68" src="<?php the_field('iconimg_3'); ?>" />
                    <p><?php the_field('icon_name_3'); ?></p>
                </div>
            </div>
        </section>

        <section class="chef-section">
            <h1 class="text-primary text-center"><?php the_field('chef_title'); ?></h1>
            <div class="chef-div container-flex">
                <img src="<?php the_field('chef_image'); ?>">
                <p class="chef-details"><?php the_field('chef_details'); ?></p>
            </div>

            <div class="chef-restaurants-container">
                <div class="subtitle">
                    <h2 class="text-primary text-center"><?php the_field('chef_subtitle'); ?></h2>
                </div>
                <div class="container-flex chef-restaurants-menu slider slides">
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
            </div>
        </section>

        <section class="about-us-section">
            <div class="about-us-container container-flex">
                <div class="about-content">
                    <h1 class="text-primary text-center"><?php the_field('about_us_titile'); ?></h1>
                    <p class="about-us-content"><?php the_field('about_us_content'); ?></p>
                </div>
                <div class="about-icon">
                    <img src="<?php echo get_template_directory_uri() . '/img/about-logo.png' ?>" alt="about-logo">
                </div>
                <div class="links container-flex">
                    <div class="app-store-link">
                        <img src="<?php echo get_template_directory_uri() . '/img/apple.svg' ?>" alt="apple-logo">
                        <p>
                            Download on the
                            <a href="#">App Store</a>
                        </p>
                    </div>
                    <div class="google-play-link ">
                        <img src="<?php echo get_template_directory_uri() . '/img/google-play.svg' ?>" alt="google-logo">
                        <p>
                            Get it on
                            <a href="#">Google Play</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile; ?>

<?php get_footer(); ?>