<div class="dishes-content ">
    <button type="button" data-toggle="modal" data-target="#exampleModalCenter-dinner-<?php echo get_post_field('post_name', get_post())?>">
        <div id="<?php echo get_post_field('post_name', get_post()) ?>" class=" dish-card text-center">
            <?php the_post_thumbnail('dish-card'); ?>
            <div class="dish-details">
                <h2 class="text-primary"><?php the_title(); ?></h2>
                <p class="text-primary details"> <?php the_field('details'); ?></p>
                <?php if( get_field('icon') ) { ?>
                    <img width="39" height="30" src="<?php the_field('icon'); ?>" />
                    <p class="text-primary icon-price"><span style="font-size: 14px" >₪</span><?php the_field('price'); ?></p>
                <?php } else { ?>
                    <p class="text-primary price"><span style="font-size: 14px" >₪</span><?php the_field('price'); ?></p>
                <?php } ?>
            </div>
        </div>
    </button>
</div>

<div class="modal fade" id="exampleModalCenter-dinner-<?php echo get_post_field('post_name', get_post()) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <?php get_template_part('templates/reservation', 'form'); ?>
</div>
