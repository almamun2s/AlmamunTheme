<?php 
/**
 * This is Wordpress DataBase table access file 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function create_custom_table_on_theme_activation() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'at_send_sms';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT NOT NULL AUTO_INCREMENT,
        client_name VARCHAR(255),
        client_mail VARCHAR(255),
        client_sms VARCHAR(255),
        client_time VARCHAR(255),
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    
    dbDelta( $sql );
}
add_action( 'after_switch_theme', 'create_custom_table_on_theme_activation' );
 