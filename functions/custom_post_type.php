<?php
/**
 * This is Custom Post type file 
 * 
 * All functions of the theme included to this file
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * =======================================================================================================================================================
 *                                                      Service Custom Post Type
 * =======================================================================================================================================================
 */
function at_cpt_service(){

    register_post_type( 'service_custom', 

        array(
            'labels'                => array(
                                        'name'          => ('Services'),
                                        'singular_name' => ('Service'),
                                        'add_new'       => ('Add New Service'),
                                        'add_new_item'  => ('Add New Service'),
                                        'edit_item'     => ('Edit Service'),
                                        'new_item'      => ('New Service'),
                                        'view_item'     => ('View Service'),
                                        'not_found'     => ('No service item to show. Add service and it will appear here.'),

                                    ),

            'menu_icon'             => 'dashicons-welcome-write-blog',
            'public'                => true ,
            'publicly_queryable'    => true ,
            'exclude_from_search'   => true ,
            'menu_position'         => 5 ,
            'has_archive'           => true,
            'hierarchial'           => true,
            'show_ui'               => true,
            // 'taxonomies'            => array('category', 'custom-tag'),
            'capability_type'       => 'post',
            'rewrite'               => array( 'slag' => 'service_item'),
            'supports'              => array( 'title', 'editor')
        )

    );

}
add_action( 'init', 'at_cpt_service' );


// =============================================== Custom fields for Service Post ==============================================
// Add custom meta box for service custom fields
function service_custom_icon() {
    add_meta_box(
        'service_custom_icon', // Unique ID
        'Service Icon', // Meta box title
        'render_service_custom_icon', // Callback function to render the meta box content
        'service_custom', // The custom post type where the meta box will be displayed
        'normal', // The position of the meta box (normal, side, advanced)
        'high' // The priority of the meta box (high, low)
    );
}
add_action('add_meta_boxes', 'service_custom_icon');

// Callback function to render the meta box content
function render_service_custom_icon($post) {
    // Retrieve the saved values for the custom fields
    $custom_field_value = get_post_meta($post->ID, 'service_custom_icon', true);

    // Add a nonce field for security purposes
    wp_nonce_field('custom_post_type_nonce', 'custom_post_type_nonce');

    // Render the input field for service custom field
    echo '<label for="service_custom_icon">Icon:  </label>';
    echo '<input type="text" id="service_custom_icon" name="service_custom_icon" value="' . esc_attr($custom_field_value) . '" />';
    echo '<p>Type here class name of Font Awesome</p>' ;
}

function save_service_custom_icon($post_id) {
    // Check if the current user has the capability to edit the post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the custom field data
    if (isset($_POST['service_custom_icon'])) {
        $custom_field_value = sanitize_text_field($_POST['service_custom_icon']);
        update_post_meta($post_id, 'service_custom_icon', $custom_field_value);
    }
}
add_action('save_post', 'save_service_custom_icon');







// Add custom meta box for service custom fields
function service_subtitle() {
    add_meta_box(
        'service_subtitle', // Unique ID
        'Service Subtitle', // Meta box title
        'render_service_subtitle', // Callback function to render the meta box content
        'service_custom', // The custom post type where the meta box will be displayed
        'normal', // The position of the meta box (normal, side, advanced)
        'high' // The priority of the meta box (high, low)
    );
}
add_action('add_meta_boxes', 'service_subtitle');

// Callback function to render the meta box content
function render_service_subtitle($post) {
    // Retrieve the saved values for the custom fields
    $custom_field_value = get_post_meta($post->ID, 'service_subtitle', true);

    // Add a nonce field for security purposes
    wp_nonce_field('custom_post_type_nonce', 'custom_post_type_nonce');

    // Render the input field for service custom field
    echo '<label for="service_subtitle">Subtitle:  </label>';
    echo '<textarea id="service_subtitle" name="service_subtitle" style="resize:none;">' . esc_attr($custom_field_value) . '</textarea>' ;
}

function save_service_subtitle($post_id) {
    // Check if the current user has the capability to edit the post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the custom field data
    if (isset($_POST['service_subtitle'])) {
        $custom_field_value = sanitize_text_field($_POST['service_subtitle']);
        update_post_meta($post_id, 'service_subtitle', $custom_field_value);
    }
}
add_action('save_post', 'save_service_subtitle');





















/**
 * =======================================================================================================================================================
 *                                                      Portfolio Custom Post Type
 * =======================================================================================================================================================
 */
function at_cpt_portfolio(){

    register_post_type( 'my_portfolio', 

        array(
            'labels'                => array(
                                        'name'          => ('Portfolios'),
                                        'singular_name' => ('Portfolio'),
                                        'add_new'       => ('Add Portfolio'),
                                        'add_new_item'  => ('Add New Portfolio'),
                                        'edit_item'     => ('Edit Portfolio'),
                                        'new_item'      => ('New Portfolio'),
                                        'view_item'     => ('View Portfolio'),
                                        'not_found'     => ('No portfolio item found. Click Add Portfolio and add an item then it will appear hare.'),

                                    ),

            'menu_icon'             => 'dashicons-portfolio',
            'public'                => true ,
            'publicly_queryable'    => true ,
            'exclude_from_search'   => true ,
            'menu_position'         => 8 ,
            'has_archive'           => true,
            'hierarchial'           => true,
            'show_ui'               => true,
            'capability_type'       => 'post',
            'rewrite'               => array( 'slag' => 'portfolio-item'),
            'supports'              => array( 'title', 'thumbnail', 'editor')
        )

    );

    register_taxonomy(
        'portfolio_category', //  taxonomy name
        'my_portfolio', // custom post type name
        array(
            'label' => __('Categories', 'almamun-theme'),
            'rewrite' => array('slug' => 'portfolio_category'), // slug
            'hierarchical' => true,
        )
    );

}
add_action( 'init', 'at_cpt_portfolio' );


 // Add custom taxonomy column to 'my_portfolio' post type
function custom_portfolio_columns($columns) {
    $taxonomy_column = $columns['taxonomy-portfolio_category'] = 'Categories';
    
    $new_columns = array_slice($columns, 0, 2, true) + array('taxonomy-portfolio_category' => $taxonomy_column) + array_slice($columns, 2, null, true);
    
    return $new_columns;
}
add_filter('manage_my_portfolio_posts_columns', 'custom_portfolio_columns');







// Display taxonomy terms in the custom column for 'my_portfolio' post type
function custom_portfolio_column_content($column, $post_id) {
    if ($column === 'taxonomy-portfolio_category') {
        $terms = get_the_terms($post_id, 'portfolio_category');
        if ($terms && !is_wp_error($terms)) {
            $categories = array();
            foreach ($terms as $term) {
                $categories[] = $term->name;
            }
            echo implode(', ', $categories);
        } else {
            echo 'No category';
        }
    }
}
add_action('manage_my_portfolio_posts_custom_column', 'custom_portfolio_column_content', 10, 2);
