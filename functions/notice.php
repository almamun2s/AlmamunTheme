<?php
/**
 * This is Notice file 
 * 
 * It displays Custom Notice to admin  panel 
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



// Check if Elementor is installed and activated
if( !did_action( 'elementor/loaded' )){
    add_action( 'admin_notices', 'almamuntheme_elementor_missing' );
    return;
}
// Display notice if Elementor is missing
function almamuntheme_elementor_missing(){
    $missing_notice = sprintf(
        esc_html__( ' "%1$s" requires "%2$s" to be installed and actived ', 'almamun-theme' ),
        '<strong>Almamun Theme</strong>',
        '<strong>Elementor</strong>',
    );

    printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $missing_notice);
    
}