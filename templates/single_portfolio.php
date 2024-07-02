<?php
/**
 * This is Single Portfolio Template file 
 * 
 * It displays Portfolos at single page 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

    while(have_posts()){

        the_post();
?>
    <div class="at-portfolio_details">
        <h1><?php the_title(); ?></h1>
        <h2>Category: <?php 
        
        // the_category(); 

        // Assuming you are inside the loop for 'my_portfolio' custom post type
        $terms = get_the_terms(get_the_ID(), 'portfolio_category');

            echo "<ul class='at-portfolio_category'>";
                if ($terms && !is_wp_error($terms)) {
                    $categories = array();
                    foreach ($terms as $term) {
                        $categories[] = '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
                    }
                    echo implode('', $categories);
                }
            echo "</ul>";

        
        
        
        
        ?></h2>
        <?php
                // Display the content
                the_content();

        ?>
    </div>

<?php
    }
?>