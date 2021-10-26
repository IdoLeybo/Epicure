<div id="login" class="reservation-info light-container-1" style="display: none">
    <form class="reservation-form" method="post">
        <img src="<?php echo the_post_thumbnail_url(); ?>" />
        <h2 class="booking-item"><?php the_title(); ?></h2>
        <p class="item-content"><?php the_field('details'); ?></p>
        <p class="item-price"><span style="font-size: 14px" >₪</span><?php the_field('price'); ?></p>

        <label for="choose">Choose a side</label>
        <input type="radio" name="side" required />

        <label for="changes">Changes</label>
        <input type="checkbox" name="side" required />

        <label for="changes">Quantity</label>
        <div class="input-group">
            <input type="button" value="-" class="button-minus" data-field="quantity">
            <input type="number" step="1" max="" min="1" value="1" name="quantity" class="quantity-field">
            <input type="button" value="+" class="button-plus" data-field="quantity">
        </div>

        <input type="submit" name="reservation" class="button" value="ADD TO BAG" />

    </form>
</div>