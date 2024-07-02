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
        <div class="at-container">
            <div class="at-portfolio_details">
                <?php get_template_part( 'templates/category_setup' ); ?>
            </div>
        </div>
    </div>


<?php
    get_footer( );