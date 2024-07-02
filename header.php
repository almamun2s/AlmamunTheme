<?php
/**
 * This is Header Template file 
 * 
 * It displays all things whithin <head> tag 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

	<!-- ===============================================================================================================
                                                    Header Part
    ==================================================================================================================-->
    <header>
        <div class="at-container">
            <div class="at-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php print get_theme_mod( 'at_logo' ); ?>" alt="logo">
                </a>
            </div>
            <div class="at-menu">
                <div class="at-mobile_menu_icon">
                    <i class="fas fa-bars" id="at-show_menu" ></i>
                    <i class="fas fa-xmark at-hide" id="at-hide_menu" ></i>
                </div>
                <div class="at-main_menu" id="at-menu">

                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu') ); ?>

                </div>
            </div>
                    
        </div>
    </header>

