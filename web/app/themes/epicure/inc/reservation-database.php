<?php
    function epicure_database() {
        global $wpdb;

        global $epicure_db_version;
        $epicure_db_version = '1.0';
        $table = $wpdb->prefix . 'reservations';
        $table2 = $wpdb->prefix . 'reservations_admin';

        $charset_collate = $wpdb->get_charset_collate();

        // SQL Statement
        $sql = "CREATE TABLE $table (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                dish varchar(50) NOT NULL,
                side varchar(100) NOT NULL ,
                changes varchar (100) NOT NULL,
                quantity varchar (50) NOT NULL,
                user_name varchar (50),
                submitted BOOL DEFAULT 0,
                date datetime DEFAULT NULL ,
                user_id int,
                PRIMARY KEY (id)
            ) $charset_collate; ";

        $sql2 = "CREATE TABLE $table2 (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                dish varchar(50) NOT NULL,
                side varchar(100) NOT NULL ,
                changes varchar (100) NOT NULL,
                quantity varchar (50) NOT NULL,
                user_name varchar (50),
                submitted BOOL DEFAULT 0,
                date datetime DEFAULT NULL ,
                user_id int,
                PRIMARY KEY (id)
            ) $charset_collate; ";


        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        dbDelta($sql2);
    }
    add_action('after_setup_theme', 'epicure_database');

?>
