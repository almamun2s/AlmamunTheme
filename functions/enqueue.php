<?php
/**
 * This is Enqueue file 
 * 
 * It includes all CSS and JS file
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function almamuntheme_enqueue(){
    wp_enqueue_style('at_style', get_stylesheet_uri());

    wp_enqueue_style( 'at_font_awesome', get_template_directory_uri().'/assets/icon/css/all.min.css', '6.2.1' );
    wp_enqueue_style( 'at_elementor_widget', get_template_directory_uri().'/assets/css/widget.css', '1.1.1' );
    wp_enqueue_style( 'at_wp_style', get_template_directory_uri().'/assets/css/wp-class.css', '1.1.1' );
    wp_enqueue_style( 'at_custom_style', get_template_directory_uri().'/assets/css/style.css', '1.0.0' );
    wp_enqueue_style( 'at_responsive_style', get_template_directory_uri().'/assets/css/responsive.css', '1.0.0' );


    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'custom_js', get_template_directory_uri(  ).'/assets/js/script.js', array('jquery') , '1.0.0' , true );
    wp_enqueue_script( 'at-ajax-script', get_template_directory_uri(  ).'/assets/js/ajax.js', array('jquery') , '1.0.0' , true );

    // Localize the script with the ajaxurl data
    wp_localize_script('at-ajax-script', 'at_ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));

}
add_action( 'wp_enqueue_scripts', 'almamuntheme_enqueue' );
