<?php
/**
 * This is Category Setup Template file 
 * 
 * It displays Blog page 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}





// Get the current taxonomy term
$term = get_queried_object();




// Define the custom query for 'my_portfolio' posts associated with the current taxonomy term
$args = array(
    'post_type'         => 'my_portfolio',
    'posts_per_page'    => -1,
    // 'paged'             => $paged,
    'tax_query' => array(
        array(
            'taxonomy'          => 'portfolio_category',
            'field'             => 'slug',
            'terms'             => $term->slug,
        ),
    ),
);

$custom_query = new WP_Query($args);


// Display the term name and description if available
if ($term) {
    echo '<h1> Category: ' . $term->name . '('.$custom_query->post_count.')</h1>';
    if ($term->description) {
        echo '<p>' . $term->description . '</p>';
    }
}


// Start the loop
if ($custom_query->have_posts()) {
    echo '<div class="at-portfolio_row_home">';
    while ($custom_query->have_posts()) {
        $custom_query->the_post();
        ?>
            <div class="at-portfolio_item_parent">
                <div class="at-portfolio_item_home">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <p><?php the_title(); ?></p>
                    </a>
                </div>
            </div>
        <?php
    }
    echo '</div>';
} else {
    echo '<p>No Portfolios found.</p>';
}

// echo '<div class="wp_pagenav">';
// echo paginate_links(array(
//     'total' => $custom_query->max_num_pages,
//     'current' => $paged,
// ));
// echo '</div>';


// Restore original post data
wp_reset_postdata();
