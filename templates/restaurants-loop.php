<div class="restaurant-content ">
    <a href="<?php the_permalink(); ?>" >
        <div class="res-card text-center">
            <?php the_post_thumbnail('restaurant-card'); ?>
            <div class="restaurant-details">
                <h2 class="text-primary"><?php the_title(); ?></h2>
                <p class="text-primary"><?php the_field('chef_name'); ?></p>
            </div>
        </div>
    </a>
</div>