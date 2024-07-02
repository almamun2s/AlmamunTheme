<?php
/**
 * This is Page Template file 
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
        <?php get_template_part( 'templates/post_setup' ); ?>
    </div>


<?php
    get_footer( );