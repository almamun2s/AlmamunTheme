<?php
/**
 * This is Single Template file 
 * 
 * It displays all single Posts by default 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


    get_header( );

?>

    <div class="at-body-area" >
        <div class="at-container">
            <?php get_template_part( 'templates/single_portfolio' ); ?>
        </div>
    </div>


<?php
    get_footer( );