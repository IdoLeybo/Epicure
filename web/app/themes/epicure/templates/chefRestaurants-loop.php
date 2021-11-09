<div class="restaurant-content ">
    <a href="<?php the_permalink(); ?>" >
        <div class="res-card text-center">

            <img class="chef-res-img" src="<?php the_field('header_image'); ?>">
            <div class="restaurant-details">
                <h2 class="text-primary"><?php the_title(); ?></h2>
            </div>
        </div>
    </a>
</div>