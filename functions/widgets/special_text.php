<?php
/**
 * This is Custom Widget file 
 * 
 * It displays Special Text Widget of elementor page builder
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class AlmamunTheme_Widget_SpText extends Elementor\Widget_Base{
    public function get_name(){
        return 'almamuntheme_widget_sp_text';
    }

    public function get_title(){
        return 'Special Text';
    }

    public function get_icon(){
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['almamun-theme'];
    }


    // Widget Setting
    protected function register_controls(){
        $this-> start_controls_section(
            'special_text',
            [
                'label' => 'Special Text'
            ] 
        );


        $this -> add_control(
            'sp_down',
            [
                'label'     => 'Heading Text',
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Services',
            ]
        );
        
        $this -> add_control(
            'sp_upper',
            [
                'label'     => 'Short Description',
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'default'   => 'Which things I do',
            ]
        );

    }





    protected function render(){
        $settings = $this -> get_settings();
        ?>
            <h1 class="at-special_under"><?php echo esc_html($settings['sp_down']); ?></h1>
            <h2 class="at-special_upper"><?php echo esc_html($settings['sp_upper']); ?></h2>
        <?php 
    }

}