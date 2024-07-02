<?php
/**
 * This is Admin Customize Template file 
 * 
 * It displays theme options of customize page of Admin
 * You can find Cusstomize page from  Wordpress Dashboard > Appearance > Customize 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function at_customize_register($wp_customize){
    // ===================== Theme Logo Register, Settings and Control ============================================
    $wp_customize -> add_section('at_header_logo', array(
        'title'         => __( 'Header', 'almamun-theme'),
        'description'   => 'You can change your logo from here'
    ) );
    $wp_customize -> add_setting( 'at_logo', array(
        'default'       => get_template_directory_uri().'/assets/img/logo.png',
    ));
    $wp_customize -> add_control( new WP_Customize_Image_Control( $wp_customize , 'at_logo' , array(
        'label'         => 'Logo Upload',
        'section'       => 'at_header_logo',
        'setting'       => 'at_logo',
        'desctiption'   => 'Upload a logo'
    )));



    // ===================== Theme Footer top text change =========================================================
    $wp_customize -> add_section('at_footer', array(
        'title'         => __( 'Footer', 'almamun-theme' ),
        'desctiption'   => 'You can change your footer content from here'
    ));
    
    // Footer Top Title
    $wp_customize -> add_setting( 'at_footer_top_title', array(
        'default'       => 'Let\'s Discuss'
    ));
    $wp_customize -> add_control( 'at_footer_top_title', array(
        'label'         => 'Footer Top Title',
        'section'       => 'at_footer',
        'setting'       => 'at_footer_top_title',
    ));

    // Footer Top Text
    $wp_customize -> add_setting( 'at_footer_top_text', array(
        'default'       => 'If you have a project or just question, click on the button and feel free by filling up the form and I will reply as soon as I can.'
    ));
    $wp_customize -> add_control( 'at_footer_top_text', array(
        'label'         => 'Footer Top Text',
        'section'       => 'at_footer',
        'setting'       => 'at_footer_top_text',
    ));


    // Footer Copyright
    $wp_customize -> add_setting( 'at_footer_copyright', array(
        'default'       => 'All &copy; right resorved by Abdullah Almamun'
    ));
    $wp_customize -> add_control( 'at_footer_copyright', array(
        'label'         => 'Footer Copyright',
        'section'       => 'at_footer',
        'setting'       => 'at_footer_copyright',
    ));




}
add_action('customize_register', 'at_customize_register' );