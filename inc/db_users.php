<?php

function epicure_save_users() {
    global $wpdb;

    if(isset($_POST['submit-reservation']) && $_POST['hidden'] == '1') {

        $name = $_POST['name'];
        $userID = $_POST['user-id'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $users = $wpdb->get_results(
            "SELECT * FROM wp_epicure_users
                    WHERE user_id='$userID'
                    ", ARRAY_A);

        $reservations = $wpdb->get_results(
            "SELECT * FROM wp_reservations_admin
                    WHERE user_id='$userID'
                    ", ARRAY_A);

        if(sizeof($users) > 0) {
            $wpdb->update('wp_epicure_users', ['name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message], ['user_id' => $userID]);
            foreach($reservations as $reservation):
                if($reservation['submitted'] === '0'):
                    if($userID === 0) {
                        $rand = rand();
                        $wpdb->update('wp_reservations', ['submitted' => 1, 'date' => $date, 'user_id' => $rand], ['user_id' => $userID, 'submitted' => '0']);
                        $wpdb->update('wp_reservations_admin', ['submitted' => 1, 'date' => $date, 'user_id' => $rand], ['user_id' => $userID, 'submitted' => '0']);
                        $wpdb->update('wp_epicure_users', ['user_id' => $rand], ['user_id' => $userID]);
                    } else {
                        $wpdb->update('wp_reservations', ['submitted' => 1, 'date' => $date], ['user_id' => $userID, 'submitted' => '0']);
                        $wpdb->update('wp_reservations_admin', ['submitted' => 1, 'date' => $date], ['user_id' => $userID, 'submitted' => '0']);
                    }
                endif;
            endforeach;
        } else {

            $table = $wpdb->prefix . 'epicure_users';

            $data = array(
                'name' => $name,
                'email' => $email,
                'date' => $date,
                'phone' => $phone,
                'user_id' => $userID,
                'message' => $message
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
            $wpdb->update('wp_reservations', ['submitted' => 1], ['user_id' => $userID]);
            $wpdb->update('wp_reservations_admin', ['submitted' => 1], ['user_id' => $userID]);
        }

        $url = get_page_by_title('Cart');
        wp_redirect(get_permalink($url));
        exit();
    }


}
add_action('init', 'epicure_save_users');

function epicure_delete_user() {

    global $wpdb;

    $table = $wpdb->prefix . 'epicure_users';

    $result = $wpdb->delete($table, array('user_id'=>0));
    if($result == 1) {
        $response = array(
            "response" => 'success',
        );
    } else {
        $response = array(
            'response' => 'error',
            'message' => 'No users with this ID'
        );
    }

    die(json_encode($response));
}
add_action('wp_ajax_epicure_delete_user', 'epicure_delete_user');
