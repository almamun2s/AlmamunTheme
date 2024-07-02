<?php
/**
 * This is Functions file 
 * 
 * All functions of the theme included to this file
 * 
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


//  Theme Setup
function almamuntheme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-formats', ['aside', 'gallery', 'image', 'audio', 'video']);

    add_theme_support('custom-logo');

    register_nav_menu('main_menu', 'Main Menu');


}
add_action('after_setup_theme', 'almamuntheme_setup');


// CSS and JS file Calling
require_once ("functions/enqueue.php");

// WP Customize 
require_once ("functions/customize.php");

// Admin notice
require_once ("functions/notice.php");

// Elementor Custom widgets
require_once ("functions/widgets.php");

// Custom Post Type 
require_once ("functions/custom_post_type.php");

// WP Database 
require_once ("functions/wp_db.php");

// SMS Sending
require_once ("core/send_sms_core.php");

// SMS Sending
require_once ("functions/admin/theme_option.php");

// Other Functionality of Almamun Theme
require_once ("functions/other.php");
