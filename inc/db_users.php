<?php

function epicure_save_users() {
    global $wpdb;

    if(isset($_POST['submit-reservation']) && $_POST['hidden'] == '1') {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $phone = $_POST['phone'];
        $userID = $_POST['user-id'];
        $message = $_POST['message'];

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
