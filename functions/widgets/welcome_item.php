<?php
/**
 * This is Custom Widget file 
 * 
 * It displays Welcome item Widget of elementor page builder
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;


class AlmamunTheme_Widget_welcome extends Elementor\Widget_Base{

    public function get_name(){
        return 'almamuntheme_widget_welcome';
    }

    public function get_title(){
        return 'Welcome Item';
    }

    public function get_icon(){
        return 'eicon-welcome';
    }

    public function get_categories() {
        return ['almamun-theme'];
    }




    // Widget Setting
    protected function register_controls(){
        $this -> start_controls_section(
            'welcome_item',
            [
                'label'     => 'Welcome Section',
            ]
        );

        $this -> add_control(
            'heading',
            [
                'label'     => 'Heading',
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'default'   => 'Quality',
            ]
        );

        $this -> add_control(
            'description',
            [
                'label'     => 'Description',
                'type'      => \Elementor\Controls_Manager::WYSIWYG,
                'default'   => 'Friendly coding and design professionally increase website speed. Only experienced person can make sure this.',
            ]
        );

        $this -> add_control(
            'icon',
            [
                'label'         => 'Icon',
                'description'   => 'Write here fontawesome icon class name' ,
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'       => 'fa-solid fa-pen-to-square',
            ]
        );

        $this->end_controls_section();
        
        
        
        
        // // For Style tab
        // $this -> start_controls_section(
        //     'welcome_item_style',
        //     [
        //         'label'     => 'Style',
        //         'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
        //     ]
        // );

        // $this->end_controls_section();

    }

    // Widget Output
    protected function render(){
        $settings = $this-> get_settings();
        ?>
            <div class="at-welcome_item">
                <div class="at-welcome_icon">
                    <i class="<?php echo esc_html($settings['icon']); ?>"></i>
                </div>
                <div class="at-welcome_item_inner">
                    <h2><?php echo esc_html($settings['heading']); ?></h2>
                    <p style="color: #666;"><?php echo $settings['description']; ?></p>
                </div>
            </div>
        <?php
    }

}