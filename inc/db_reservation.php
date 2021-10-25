<?php

    function epicure_save_reservation() {
        global $wpdb;

        if(isset($_POST['reservation']) && $_POST['hidden'] == '1') {

            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $dish = $_POST['dish'];
            $quantity = $_POST['quantity'];

            $table = $wpdb->prefix . 'reservations';

            $data = array(
                'name' => $name,
                'phone' => $phone,
                'dish' => $dish,
                'quantity' => $quantity,
            );

            $format = array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            );
            $wpdb->insert($table, $data, $format);

            $url = get_page_by_title('Thanks for your reservation!');
            wp_redirect(get_permalink($url));
            exit();
        }
    }
    add_action('init', 'epicure_save_reservation');

