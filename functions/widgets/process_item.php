<?php
/**
 * This is Custom Widget file 
 * 
 * It displays Process item Widget of elementor page builder
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;


class AlmamunTheme_Widget_Process extends Elementor\Widget_Base{

    public function get_name(){
        return 'almamuntheme_widget_process';
    }

    public function get_title(){
        return 'Process Item';
    }

    public function get_icon(){
        return 'eicon-post-list';
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
                'default'   => 'Conversation',
            ]
        );

        $this -> add_control(
            'description',
            [
                'label'     => 'Description',
                'type'      => \Elementor\Controls_Manager::WYSIWYG,
                'default'   => 'First, I make a conversation with my clients. It is very important for me. Because, it is nedded to understand the project requirements of them. Sometimes, I make audio or video call to communicate with clients faster',
            ]
        );

        $this -> add_control(
            'icon',
            [
                'label'         => 'Icon',
                'description'   => 'Write here fontawesome icon class name' ,
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'       => 'fa-regular fa-comment',
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
                <div class="at-process_item">
                    <div class="at-process_item_inner">
                        <div class="at-process_icon">
                            <i class="<?php echo esc_html( $settings['icon'] ); ?>"></i>
                        </div>
                        <h2><?php echo esc_html( $settings['heading'] ); ?></h2>
                        <p><?php echo esc_attr( $settings['description'] ); ?></p>
                    </div>
                </div>
        <?php
    }

}
