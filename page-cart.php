<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>
    <div class="cart-container">
        <?php
            $id = um_profile_id();

            global $wpdb;

            $reservations = $wpdb->get_results(
            "SELECT * FROM wp_reservations
                WHERE user_id=$id
                ");
            ?>

        <table>
            <tr>
                <th>Item Name</th>
                <th>Options</th>
                <th>Changes</th>
                <th>Quantity</th>
            </tr>
            <?php
                for($i = 0; $i < sizeof($reservations); $i++ ) {?>
                    <tr class="<?php echo $reservations[$i]->id ?>">
                        <td><?php echo $reservations[$i]->dish ?></td>
                        <td><?php echo $reservations[$i]->side ?></td>
                        <td><?php echo $reservations[$i]->changes ?></td>
                        <td><?php echo $reservations[$i]->quantity ?></td>
                        <td class="delete-db-item">delete</td>
                    </tr>
              <?php } ?>
        </table>

    </div>
<?php endwhile; ?>

<?php get_footer(); ?>