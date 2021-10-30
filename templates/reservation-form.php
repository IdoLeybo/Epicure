<?php $id = um_profile_id(); ?>

<div class="modal-dialog modal-dialog-centered form-modal" role="document">

        <div class="modal-content">

            <form method="post" class="add-reservation">
                <div class="popup-content-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-header form-header">
                        <img class="dish-img-form" src="<?php echo the_post_thumbnail_url(); ?>" />
                        <div class="dish-name-form container-flex">
                            <?php $type = get_field('icon_type'); ?>
                            <?php if( $type !== 'none' ): ?>
                                <?php $lowercase = strtolower($type) ; ?>
                                <img width="39" height="30" src="<?php echo get_template_directory_uri() . '/img/' . $lowercase . '-icon.png' ?>" alt="icon type image" />
                            <?php endif; ?>
                            <h2 class="modal-title" id="exampleModalLongTitle" ><?php the_title(); ?></h2>
                        </div>
                        <p class="text-primary details"> <?php the_field('details'); ?></p>
                        <p class="text-primary price"><span style="font-size: 14px" >₪</span><?php the_field('price'); ?></p>
                    </div>
                </div>

                <div class="modal-body form-body">
                    <div class="choose-side-form">
                        <input type="hidden" name="dish" value="<?php the_title(); ?>" />
                        <input type="hidden" name="user-id" value="<?php echo $id ?>" />
                        <input type="hidden" name="user-name" value="<?php echo um_get_display_name( $id ) ?>" />
                        <h3>Choose a side</h3>
                        <div class="white-bread">
                            <input type="radio" value="White Bread" name="side" id="side">
                            <label for="side">White Bread</label>
                        </div>
                        <div class="stick-rice">
                            <input type="radio" value="Sticky Rice" name="side" id="side">
                            <label for="side">Sticky Rice</label>
                        </div>
                    </div>
                    <div class="changes-form">
                        <h3>Changes</h3>
                        <div class="peanuts">
                            <input type="checkbox" value="Without Peanuts" name="change1" id="side">
                            <label for="changes">Without Peanuts</label>
                        </div>
                        <div class="spicy">
                            <input type="checkbox" value="Less Spicy" name="change2" id="side">
                            <label for="changes">Less Spicy</label>
                        </div>
                    </div>
                    <div class="quantity">
                         <h3>Quantity</h3>
                         <div class="input-group">
                            <input type="button" value="-" class="button-minus" data-field="quantity">
                            <input type="number" step="1" max="" min="1" value="1" name="quantity" class="quantity-field">
                            <input type="button" value="+" class="button-plus" data-field="quantity">
                         </div>
                    </div>
                </div>

                <div class="modal-footer form-footer">
        <!--            <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>-->
                    <input type="hidden" name="hidden" value="1" />
                    <button type="submit" class=" btn add-to-bag" name="reservation">ADD TO BAG</button>
                </div>
            </form>
        </div>

</div>
