<div class="signature-dish">
    <h2 class="name"> <?php the_field('restaurant_name'); ?></h2>
    <div class="dishes-content ">
        <button type="button" data-toggle="modal" data-target="#exampleModalCenter-<?php echo get_post_field('post_name', get_post())?>">

             <div id="<?php echo get_post_field('post_name', get_post()) ?>" class=" dish-card text-center">
                <div class="thumbnail-image">
                    <?php the_post_thumbnail('dish-card'); ?>
                </div>
                <div class="dish-details">
                    <h2 class="text-primary"><?php the_title(); ?></h2>
                    <p class="text-primary details"> <?php the_field('details'); ?></p>

                        <?php $type = get_field('icon_type'); ?>
                        <?php if( $type !== 'none' ) { ?>
                            <?php $lowercase = strtolower($type) ; ?>
                            <img width="39" height="30" src="<?php echo get_template_directory_uri() . '/img/' . $lowercase . '-icon.png' ?>" alt="icon type image" />
                            <p class="text-primary icon-price"><span style="font-size: 14px" >₪</span><?php the_field('price'); ?></p>
                        <?php } else { ?>
                                <div style="width: 39px; height: 30px"></div>
                            <p class="text-primary price"><span style="font-size: 14px" >₪</span><?php the_field('price'); ?></p>
                        <?php } ?>

                </div>
             </div>
        </button>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter-<?php echo get_post_field('post_name', get_post()) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <?php get_template_part('templates/reservation', 'form'); ?>
</div>
