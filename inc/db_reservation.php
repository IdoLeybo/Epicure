<?php

    function epicure_save_reservation() {
        global $wpdb;

        if(isset($_POST['reservation']) && $_POST['hidden'] == '1') {

            if (in_array("White Bread", $_POST)) {
                $side = $_POST['side'];
            } else if (in_array( "Sticky Rice" , $_POST) ) {
                $side = $_POST['side'];
            }else {
                $side = 'none';
            }

            if(in_array('Without Peanuts', $_POST) || in_array('Less Spicy', $_POST)){
                $change1 = $_POST['change1'];
                $change2 = $_POST['change2'];
                $changes = $change1 . " " . $change2;
            } else {
                $changes = 'none';
            }
            if($_POST['user-name'] == '') {
                $userName = 'guest';
            } else {
                $userName = $_POST['user-name'];
            }
            $dish = $_POST['dish'];
            $userID = $_POST['user-id'];
            $quantity = $_POST['quantity'];

            $table = $wpdb->prefix . 'reservations';

            $data = array(
                'dish' => $dish,
                'side' => $side,
                'changes' => $changes,
                'quantity' => $quantity,
                'user_id' => $userID,
                'user_name' => $userName

            );

            $format = array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            );

            $wpdb->insert($table, $data, $format);

            $url = get_page_by_title("Home");
            wp_redirect(get_permalink($url));
            exit();
        }
    }
    add_action('init', 'epicure_save_reservation');

    function epicure_delete_reservation() {

        global $wpdb;

        $table = $wpdb->prefix . 'reservations';
        $id = $_POST['id'];

        $result = $wpdb->delete($table, array('id'=>$id));
        if($result == 1) {
            $response = array(
                "response" => 'success',
                "id" => $id
            );
        } else {
            $response = array(
                'response' => 'error',
            );
        }

        die(json_encode($response));
    }
    add_action('wp_ajax_epicure_delete_reservation', 'epicure_delete_reservation');
    add_action('wp_ajax_nopriv_epicure_delete_reservation', 'epicure_delete_reservation');

    function epicure_delete_user_reservations() {
            global $wpdb;

            $table = $wpdb->prefix . 'reservations';

            $users = $wpdb->get_results(
                "SELECT * FROM wp_epicure_users
                    WHERE user_id=0
                    ", ARRAY_A);
            $username_from_reservation = $wpdb->get_results(
                "SELECT user_name FROM wp_reservations
                    WHERE user_id=0
                    ", ARRAY_A);

            if(sizeof($users) > 0) {
                for($i = 0; $i < sizeof($users); $i++ ) {

                    if($users[$i]['phone'] == ''){

                        $result = $wpdb->delete($table, array('user_id'=>0));
                        if($result == 1) {
                            $response = array(
                                "response" => 'success',
                                'message' => 'reservations deleted'
                            );
                        } else {
                            $response = array(
                                'response' => 'error',
                            );
                        }

                        die(json_encode($response));
                    }
                }
            } else {
                $result = $wpdb->delete($table, array('user_id'=>0));
                var_dump($result);
                if($result == 1) {
                    $response = array(
                        "response" => 'success',
                        'message' => 'reservations deleted'
                    );
                } else {
                    $response = array(
                        'response' => 'error',
                    );
                }

                die(json_encode($response));
            }
        }
    add_action('wp_ajax_epicure_delete_user_reservations', 'epicure_delete_user_reservations');
    add_action('wp_ajax_nopriv_epicure_delete_user_reservations', 'epicure_delete_user_reservations');