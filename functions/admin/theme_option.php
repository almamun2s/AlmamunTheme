<?php
/**
 * This is Theme option file 
 * 
 * Theme options are included from here 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function at_admin_menu_css_js(){
    wp_enqueue_style( 'at-admin-style', get_template_directory_uri(  )."/assets/css/admin-style.css", array(), '1.0.0', 'all' );

    wp_enqueue_script( 'at-admin-js', get_template_directory_uri(  )."/assets/js/admin-script.js", array(), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'at_admin_menu_css_js' );

function at_theme_pages(){
    add_menu_page( 'Almamun Theme Options', 'Almamun Theme', 'manage_options', 'at_options', 'at_main_page', get_template_directory_uri(  )."/assets/img/icon.png", '59' );

    add_submenu_page( 'at_options', 'General Options', 'General', 'manage_options', 'at_options', 'at_general_page', 1 );

    add_submenu_page( 'at_options', 'Contact', 'Contact', 'manage_options', 'contact', 'at_contact_page', 4 );
}
add_action( 'admin_menu', 'at_theme_pages' );


// Main page
function at_main_page(){

}
function at_general_page(){
    require_once("pages/general.php");
}

function at_contact_page(){
    require_once("pages/contact.php");
}