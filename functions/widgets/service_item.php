<?php
/**
 * This is Custom Widget file 
 * 
 * It displays Service item Widget of elementor page builder
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;


class AlmamunTheme_Widget_Service extends Elementor\Widget_Base{

    public function get_name(){
        return 'almamuntheme_widget_service';
    }

    public function get_title(){
        return 'Service Item';
    }

    public function get_icon(){
        return 'eicon-page-transition';
    }

    public function get_categories() {
        return ['almamun-theme'];
    }

        
        // there is no control for this Widget





    // Widget Output
    protected function render(){


        $args = array(
            'post_type'     => 'service_custom',
            
        );
        
        $service_query = new WP_Query($args);
        
        ?>
    <div class="at-container">
        <div class="at-services">
        <?php

        // For Service Number
        $service_number = 1;
        if ($service_query->have_posts()) {
            while ($service_query->have_posts()) {
                $service_query->the_post();

        ?>

        <div class="at-service_parent">
            <div class='at-service_item'>
                <a href='<?php the_permalink(  ); ?>'>
                    <div class='at-service_item_left'>
                        <i class='<?php echo  get_post_meta(get_the_ID(), 'service_custom_icon', true); ?>'></i>
                    </div>
                    <div class='at-service_item_right'>
                        <h2><?php the_title(  ); ?></h2>
                        <h3><?php echo  get_post_meta(get_the_ID(), 'service_subtitle', true); ?></h3>
                    </div>
                    <div class='at-service_number'><?php echo $service_number; ?></div>
                </a>
            </div>
        </div>

        <?php 

                $service_number++;
            }
        }

        ?>
        </div>
    </div>

        <?php 

        wp_reset_postdata();
    }

}

