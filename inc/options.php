<?php

function epicure_options() {
    add_menu_page('Epicure Options', 'Epicure Options', 'administrator', 'epicure_options', 'epicure_adjustment', '', 20);
    add_submenu_page('epicure_options', 'Reservations', 'Reservations', 'administrator', 'epicure_reservations', 'epicure_reservations');
}
add_action('admin_menu', 'epicure_options');

function epicure_settings() {

//    // Leaflet Group
//    register_setting('epicure_option', 'epicure_lmap_latitude');
//    register_setting('epicure_option', 'epicure_lmap_longitude');
//    register_setting('epicure_option', 'epicure_lmap_zoom');
////    register_setting('lapizzeria_option_lmaps', 'lapizzeria_lmap_apikey');
//
//    //Information Group
//    register_setting('epicure_options_info', 'epicure_location');
//    register_setting('epicure_options_info', 'epicure_phonenumber');

}
add_action('init', 'epicure_settings');


function epicure_adjustment() { ?>
        <div class="wrap">
<!--            <h1>Epicure Adjustment</h1>-->
<!--            <form action="options.php" method="post">-->
<!--                --><?php
//                    settings_fields('epicure_option');
//                    do_settings_sections('epicure_option');
//                ?>
<!--                <h2>Leaflet Maps</h2>-->
<!--                <table class="form-table">-->
<!--                    <tr valign="top">-->
<!--                        <th scope="row"> </th>-->
<!--                        <td>-->
<!--                            <input type="text" name="epicure_lmap_latitude" value="--><?php //echo esc_attr(get_option('epicure_lmap_latitude')); ?><!--"/>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr valign="top">-->
<!--                        <th scope="row"> </th>-->
<!--                        <td></td>-->
<!--                    </tr>-->
<!--                    <tr valign="top">-->
<!--                        <th scope="row"> </th>-->
<!--                        <td></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--                --><?php //submit_button(); ?>
<!--            </form>-->
<!--            <form action="options.php" method="post">-->
<!--                --><?php
//                settings_fields('lapizzeria_options_info');
//                do_settings_sections('lapizzeria_options_info');
//                ?>
<!--                <h2>Other Adjustment</h2>-->
<!--                <table class="form-table">-->
<!--                    <tr valign="top">-->
<!--                        <th scope="row">Address: </th>-->
<!--                        <td>-->
<!--                            <input type="text" name="lapizzeria_location" value="--><?php //echo esc_attr(get_option('lapizzeria_location')); ?><!--"/>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr valign="top">-->
<!--                        <th scope="row">Phone Number: </th>-->
<!--                        <td>-->
<!--                            <input type="text" name="lapizzeria_phonenumber" value="--><?php //echo esc_attr(get_option('lapizzeria_phonenumber')); ?><!--"/>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--                --><?php //submit_button(); ?>
<!--            </form>-->
        </div>
    <?php }

function epicure_reservations() { ?>
 <div class="wrap">
        <h1>Reservations</h1>
        <table class="wp-list-table widefat striped">
            <thead>
                <tr>
                    <th class="manage-column">ID</th>
                    <th class="manage-column">Name</th>
                    <th class="manage-column">Date of Reservation</th>
                    <th class="manage-column">Email</th>
                    <th class="manage-column">Phone Number</th>
                    <th class="manage-column">Dish</th>
                    <th class="manage-column">Options</th>
                    <th class="manage-column">Changes</th>
                    <th class="manage-column">Quantity</th>
                </tr>
            </thead>

            <tbody>
            <?php
                global $wpdb;
//
                $reservations = $wpdb->get_results('SELECT * FROM wp_reservations', ARRAY_A);
                foreach ($reservations as $reservation):?>
                <?php
                    $id = $reservation['user_id'];
                    $user = $wpdb->get_results("SELECT * FROM wp_epicure_users WHERE user_id=$id", ARRAY_A);
                    if(sizeof($user) != 0) {?>

                <?php if($reservation['user_id'] != 0 || ($reservation['user_id'] == 0 && $user[0]['phone'] != NULL) || ($reservation['user_id'] == 0 && sizeof($user) > 0)){ ?>

                    <tr>
                        <td><?php echo $reservation['id']?></td>
                        <?php if($reservation['user_name'] == '') {?>
                             <td>user</td>
                      <?php  } else { ?>
                            <td><?php echo $reservation['user_name'] ?></td>
                       <?php } ?>
                        <?php
                            if(sizeof($user) > 0) { ?>
                                <td><?php echo $user[0]['date']?></td>
                                <td><?php echo $user[0]['email']?></td>
                                <td><?php echo $user[0]['phone']?></td>
                           <?php } else { ?>
                                <td></td>
                                <td></td>
                                <td></td>
                           <?php } ?>

                        <td><?php echo $reservation['dish']?></td>
                        <td><?php echo $reservation['side']?></td>
                        <td><?php echo $reservation['changes']?></td>
                        <td><?php echo $reservation['quantity']?></td>
                        <td>
                            <a href="#" class="remove-reservation" data-reservation="<?php echo $reservation['id'];?>">Remove</a>
                        </td>
                    </tr>
                    <?php } }?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

?>