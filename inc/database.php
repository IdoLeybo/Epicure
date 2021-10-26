<?php
    function epicure_database() {
        global $wpdb;

        global $epicure_db_version;
        $epicure_db_version = '1.0';
        $table = $wpdb->prefix . 'reservations';

        $charset_collate = $wpdb->get_charset_collate();

        // SQL Statement
        $sql = "CREATE TABLE $table (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                name varchar(50) NOT NULL,
                phone varchar(10) NOT NULL,
                dish varchar (50) NOT NULL ,
                quantity varchar(20) NOT NULL,
                PRIMARY KEY (id)
            ) $charset_collate; ";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    add_action('after_setup_theme', 'epicure_database')
?>
