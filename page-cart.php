<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <h1 class="text-center text-primary cart-title"><?php the_title(); ?></h1>
    <div class="cart-container">
        <?php
            $id = um_profile_id();

            global $wpdb;

            $reservations = $wpdb->get_results(
            "SELECT * FROM wp_reservations
                WHERE user_id=$id
                ");
            ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Options</th>
                    <th scope="col">Changes</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i = 0; $i < sizeof($reservations); $i++ ) {?>
                        <tr class="<?php echo $reservations[$i]->id ?>">
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $reservations[$i]->dish ?></td>
                            <td><?php echo $reservations[$i]->side ?></td>
                            <td><?php echo $reservations[$i]->changes ?></td>
                            <td><?php echo $reservations[$i]->quantity ?></td>
                            <td class="delete-db-item"><span>delete</span></td>
                        </tr>
                  <?php } ?>
            </tbody>
        </table>

        <button data-toggle="modal" data-target="#submitModal"  class="cart-submit btn">SUBMIT</button>
        <div id="submitModal" class="submit-form modal fade" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="mobileMenuModalLabel" aria-hidden="true">
            <?php get_template_part('templates/submit', 'form'); ?>
        </div>

    </div>
<?php endwhile; ?>

<?php get_footer(); ?>