<?php
/**
 * This is Custom Widget file 
 * 
 * It displays Portfolio Widget of elementor page builder
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class AlmamunTheme_Widget_Portfolio extends Elementor\Widget_Base{

    public function get_name(){
        return 'almamuntheme_widget_portfolio';
    }

    public function get_title(){
        return 'Portfolio';
    }

    public function get_icon(){
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['almamun-theme'];
    }


    // Widget Setting
    protected function register_controls(){
        $this -> start_controls_section(
            'portfolio_item',
            [
                'label'     => 'Portfolio Settings',
            ]
        );

        $this -> add_control(
            'number',
            [
                'label'         => 'Number',
                'type'          => \Elementor\Controls_Manager::NUMBER,
                'default'       => '-1',
                'description'   => 'Number of posts per page (Keep the number -1 to see all)',
            ],
        );

        $this -> add_control(
            'page_nav',
            [
                'label'         => 'Page Navigator',
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => 'Show',
                'label_off'     => 'Hide',
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );


        $this -> add_control(
            'order',
            [
                'label'         => 'Order',
				'type'          => \Elementor\Controls_Manager::SELECT,
                'default'       => 'ASC',
                'options'       => [
                                'ASC'   =>  'ASC' ,
                                'DESC'  => 'DESC',
                            ]

            ]
        );


        $this -> add_control(
            'random_p',
            [
                'label'         => 'Show random Portfolio',
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => 'Show',
                'label_off'     => 'Hide',
                'return_value'  => 'rand',
                'default'       => 'none',
            ]
        );


        $this -> add_control(
            'new_tab',
            [
                'label'         => 'Open Portfolio in new tab',
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => 'Yes',
                'label_off'     => 'No',
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );


        $this->end_controls_section();
        

    }


    protected function render(){
        $settings = $this-> get_settings_for_display();

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type'     => 'my_portfolio',
            'posts_per_page'=> $settings['number'], // Set the number of posts to display (-1 means all)
            'paged'         => $paged,
            'order'         => $settings['order'],
            'orderby'      => $settings['random_p'],
        );
        
        $portfolio_query = new WP_Query($args);
        
        ?>
        <div class="at-container">
            <!-- =============================== Categories ============================= -->
            <?php
            // Query to get all categories associated with the 'my_portfolio' custom post type
            $categories = get_terms([
                'taxonomy' => 'portfolio_category', // Replace 'my_portfolio_category' with the actual taxonomy name for the categories in your setup.
                'hide_empty' => false,
            ]);

            // Check if there are any categories
            if (!empty($categories)) {
                echo '<ul class="at-portfolio_category">';
                foreach ($categories as $category) {
                    // Get the category link
                    $category_link = get_term_link($category);
                    
                    // Output the category name and link
                    echo '<li><a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a></li>';
                }
                echo '</ul>';
            } else {
                echo 'No categories found.';
            }
            ?>





            <!-- =================================== Portfolios ========================== -->
            <div class="at-portfolio_row_home">
                <?php
                if ($portfolio_query->have_posts()) {
                    while ($portfolio_query->have_posts()) {
                        $portfolio_query->the_post();

                ?>





                <div class="at-portfolio_item_parent">
                    <div class='at-portfolio_item_home'>
                        <a href='<?php the_permalink(  ); ?>' 
                            <?php
                                // Condition for opening portfolio on new tab
                                if( 'yes' === $settings['new_tab'] ){
                                    echo "target='_blank'";
                                }
                            ?>
                        >
                            <?php the_post_thumbnail(  ); ?>
                            <p><?php the_title(  ); ?></p>
                        </a>
                    </div>
                </div>

                <?php 
                    }
                }

                    ?>
            </div>
        </div>
        <?php 


            if( 'yes' === $settings['page_nav'] ){
                // Add pagination links
                echo '<div class="wp_pagenav">';
                echo paginate_links(array(
                    'total' => $portfolio_query->max_num_pages,
                    'current' => $paged,
                ));
                echo '</div>';
            }




        
        wp_reset_postdata();
    }


}