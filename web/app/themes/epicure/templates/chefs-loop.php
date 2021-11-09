<div class="chef-content ">
    <a href="<?php the_permalink(); ?>" >
        <div class="chef-card text-center">

            <?php the_post_thumbnail('chef-card'); ?>
            <div class="restaurant-details">
                <h2 class="text-primary"><?php the_title(); ?></h2>
            </div>
        </div>
    </a>
</div>