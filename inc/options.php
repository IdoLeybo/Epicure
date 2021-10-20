<?php

function epicure_options() {
    add_menu_page('Epicure Options', 'Epicure Options', 'administrator', 'epicure_options', 'epicure_adjustment', '', 20);
    add_submenu_page('epicure_options', 'Reservations', 'Reservations', 'administrator', 'epicure_reservations', 'lapizzeria_reservations');
}
add_action('admin_menu', 'epicure_options');

function epicure_adjustment() {

}

?>