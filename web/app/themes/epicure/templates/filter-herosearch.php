<input type="text"
       class="mySearch"
       name="hero-search"
       placeholder="Search for restaurant cuisine, chef"
       id="myInput"
       onkeyup="filterFunction()">
<div id="myDropdown" class="dropdown-hero-content">

    <?php
    $args = array(
        'post_type' => 'restaurants',
        'post_per_page' => 10,
        'orderby'   => 'title',
        'order'     => 'ASC',
        'category_name' => 'restaurant'
    );

    $restaurants = new WP_Query($args);
    ?>
    <div id="res-span">Restaurants:</div>
    <?php while ($restaurants->have_posts()): $restaurants->the_post() ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php endwhile; wp_reset_postdata();?>

    <?php
    $args = array(
        'post_type' => 'chefs',
        'post_per_page' => 9,
        'orderby'   => 'title',
        'order'     => 'ASC',
    );

    $chefs = new WP_Query($args); ?>
    <div id="chef-span">Chefs:</div>
    <?php while ($chefs->have_posts()): $chefs->the_post() ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php endwhile; wp_reset_postdata(); ?>

</div>

