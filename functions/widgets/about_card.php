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


class AlmamunTheme_Widget_About_card extends Elementor\Widget_Base{

    public function get_name(){
        return 'almamuntheme_widget_about_card';
    }

    public function get_title(){
        return 'About Card';
    }

    public function get_icon(){
        return 'eicon-menu-card';
    }

    public function get_categories() {
        return ['almamun-theme'];
    }




    // Widget Setting
    protected function register_controls(){
        $this -> start_controls_section(
            'about_card',
            [
                'label'     => 'About Card',
            ]
        );

        $this -> add_control(
            'image',
            [
                'label'     => 'Image',
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
            ]
        );

        $this -> add_control(
            'name',
            [
                'label'     => 'Name',
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Your Name',
            ]
        );

        $this -> add_control(
            'title',
            [
                'label'         => 'Title',
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'       => 'Your Title',
            ]
        );


        $this->add_control(
			'list',
			[
				'label' => 'Social Icon',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => 'Title', 
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'List Title' , 
						'label_block' => true,
					],
					[
						'name' => 'list_icon',
						'label' => 'Icon',
						'type' => \Elementor\Controls_Manager::ICONS,
						'show_label' => false,
					],
                    [
                        'name'  => 'link',
                        'label' => 'Icon Link',
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => [ 'url', 'is_external', 'nofollow' ],
                        'default' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                        'label_block' => true,
                    ],

				],
				'default' => [
					[
						'list_title' => 'Facebook',
						'link'       => 'www.facebook.com', 
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);





        $this -> add_control(
            'description',
            [
                'label'         => 'Description',
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'default'       => 'Your Description',
            ]
        );

        $this->add_control(
			'notice',
			[
				'label' => 'Some Notice',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => 'Title', 
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'Title' , 
						'label_block' => true,
					],
					[
						'name' => 'list_description',
						'label' => 'Description', 
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'Description' , 
						'label_block' => true,
					],

				],
                'default' => [
					[
						'list_title'        => 'Title',
						'list_description'  => 'Description', 
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

        $this->end_controls_section();
        
        

    }

    // Widget Output
    protected function render(){
        $settings = $this-> get_settings();
        ?>
            <div class="at-about">
                <div class="at-about_top">
                    <div class="at-about_left">
                        <img src="<?php echo $settings['image']['url']; ?>" alt="myphoto">
                    </div>
                    <div class="at-about_right">
                        <h1><?php echo $settings['name']; ?></h1>
                        <h2><?php echo $settings['title']; ?></h2>

                        <div class="at-social_icon">
                            <?php 
                                if ( $settings['list'] ) {
                                    foreach (  $settings['list'] as $item ) {
                                        ?>
                                            <a href="<?php
                                                echo $item['link']['url'];
                                                ?>"
                                                <?php 
                                                if($item['link']['is_external'] == true ){ echo 'target="_blank"'; }
                                                if($item['link']['nofollow'] == true ){ echo 'rel="nofollow"'; }
                                                ?> > 
                                                <?php \Elementor\Icons_Manager::render_icon( $item['list_icon'] ); ?>
                                            </a>
                                        <?php 

                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="at-about_bottom">
                    <div class="at-about_bottom_left">
                        <h2>About me</h2>
                        <p><?php echo $settings['description']; ?></p>
                    </div>
                    <div class="at-about_bottom_right">
                        <table>

                            <?php 
                                if( $settings['notice'] ){
                                    foreach( $settings['notice'] as $item ){
                                        ?>
                                            <tr>
                                                <td><b><?php echo $item['list_title'] ?></b></td>
                                                <td><?php echo $item['list_description'] ?></td>
                                            </tr>
                                        <?php 
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php
    }

}
