<div class="dishes-content ">
    <a href="<?php the_permalink(); ?>" >
        <div class="dish-card text-center">
            <?php the_post_thumbnail('dish-card'); ?>
            <div class="dish-details">
                <h2 class="text-primary"><?php the_title(); ?></h2>
                <p class="text-primary details"> <?php the_field('details'); ?></p>
                <p class="text-primary price"><span style="font-size: 14px" >₪</span><?php the_field('price'); ?></p>
            </div>
        </div>
    </a>
</div>