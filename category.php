<?php
/**
 * This is Category Template file 
 * 
 * It displays all single pages by default 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


    get_header( );

?>

    <div class="at-body-area" >
        <?php get_template_part( 'templates/category_setup' ); ?>
    </div>


<?php
    get_footer( );