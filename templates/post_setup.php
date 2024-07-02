<?php
/**
 * This is Post Setup Template file 
 * 
 * It displays content of all single pages 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

    while(have_posts()){

        the_post();
?>
<div class="blog_area">
    <div class="post_details">
        <?php
            // Check if the content exists
            if(get_the_content()){

                // Display the content
                the_content();

            }else{
                // Display the title 
        ?>
            <div class="at-part404">
                <h1><?php the_title(); ?> Page</h1>
            </div>
        <?php 
				 //There is no content But it is adding for new contents
                the_content();
            }
        ?>
    </div>
</div>

<?php
    }
?>