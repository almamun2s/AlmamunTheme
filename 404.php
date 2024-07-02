<?php
/**
 * This is 404 Template file 
 * 
 * It displays when an error url given
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

    get_header( );
?>

    <div class="at-part404">
        <div class="at-container">
            <h1>
                404
            </h1>
            <h2>
                Sorry, That page can't be found.
            </h2>
            <h3>
                The page you have requested was moved, removed, renamed or never existed.
            </h3>
        </div>
    </div>


<?php
    get_footer( );