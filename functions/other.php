<?php 
/**
 * This is Extra Functions file 
 * 
 * Some functions of the theme included to this file
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function at_page_nav(){
    global $wp_query, $wp_rewrite;
    $page = '';
    $max = $wp_query -> max_num_pages ;
    if( !$current = get_query_var( 'paged' )) $current = 1;
    $args['base'] = str_replace(99999, '%#%', get_pagenum_link( 99999 ) );
    $args['total'] = $max;
    $args['current'] = $current;
    $total = 1;
    $args['prev_text'] = 'Prev';
    $args['next_text'] = 'Next';

    if($max > 1 ) echo '</pre> 
            <div class="wp_pagenav">';
            if($total == 1 && $max > 1) $page = '<p class="pages"> Page ' .$current.' <span> of </span>'. $max .'</p>';
            echo $page . paginate_links( $args );
            if($max > 1 ) echo '</div><pre>';
}
