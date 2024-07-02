<?php
/**
 * This is Widget Template file 
 * 
 * It displays all custom widgets for elementor page builder 
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class AlmamunTheme_Elementor_Widget{
    public function __construct() {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }


    /**
     * Register The Widgets 
     */
    public function register_widgets(){
        // Include Widger files
        require_once("widgets/welcome_item.php");
        require_once("widgets/special_text.php");
        require_once("widgets/process_item.php");
        require_once("widgets/wdgt_portfolio.php");
        require_once("widgets/service_item.php");
        require_once("widgets/about_card.php");


        // Register Widgets
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AlmamunTheme_Widget_welcome());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AlmamunTheme_Widget_SpText());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AlmamunTheme_Widget_Process());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AlmamunTheme_Widget_Portfolio());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AlmamunTheme_Widget_Service());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AlmamunTheme_Widget_About_card());
    }

}


new AlmamunTheme_Elementor_Widget();



// Creating Almamun Theme Category for Widget
function almamuntheme_elementor_widget_category( $elements_manager ) {

	$elements_manager->add_category(
		'almamun-theme',
		[
			'title' => 'Almamun Theme',
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'almamuntheme_elementor_widget_category' );