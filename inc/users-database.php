<?php
function epicure_users_database() {
    global $wpdb;

    global $epicure_db_version;
    $epicure_db_version = '1.0';
    $table = $wpdb->prefix . 'epicure_users';

    $charset_collate = $wpdb->get_charset_collate();

    // SQL Statement
    $sql = "CREATE TABLE $table (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                name varchar(50) NOT NULL,
                email varchar(50) DEFAULT '' NOT NULL,
                date datetime NOT NULL,
                phone varchar(10) NOT NULL,
                message longtext NOT NULL,
                user_id int,
                PRIMARY KEY (id)
            ) $charset_collate; ";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_setup_theme', 'epicure_users_database')
?>
