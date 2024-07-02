<?php
/**
 * This is Blog Setup Template file 
 * 
 * It displays Blog page 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<div class="at-portfolio_row_home">

    <?php 
        if(have_posts(  ) ):
            while(have_posts()){

                the_post();
    ?>

            <div class='at-portfolio_item_home'>
                <a href='<?php the_permalink(  ); ?>'>
                    <?php the_post_thumbnail(  ); ?>
                    <?php the_excerpt(  ); ?>
                </a>
            </div>

    <?php
            }
        else:
            _e( "No posts found", 'almamun-theme' );
        endif;
    ?>
</div>

<!-- <h2>This is from Blog Setup</h2> -->
<div id="page_nav">
    <?php
        if('at_page_nav'){
            at_page_nav();
        }else{
            next_post_link();
            previous_post_link();
        }
    ?>
</div>