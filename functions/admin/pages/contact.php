<?php
/**
 * This is Contact Page 
 * 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<h2>SMS form website</h2>

<section class="at-admin-sms">

    <?php

    global $wpdb;
    $table_name = $wpdb->prefix . 'at_send_sms';
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    if ($results) {
        foreach ($results as $sms) {

            ?>
            <div class="at-admin-sms-parent">
                <div class="at-admin-sms-visible" id="at-admin-sms-21" >
                    <div class="at-admin-sms-id">
                        <p><?php echo $sms->id; ?></p>
                    </div>
                    <div class="at-admin-sms-name">
                        <p><?php echo $sms->client_name; ?></p>
                    </div>
                    <div class="at-admin-sms-time">
                        <p><?php echo $sms->client_time; ?></p>
                    </div>
                </div>
                
                <div class="at-admin-sms-invisible" id="at-admin-sms-invisible-21" >
                    <div class="at-admin-sms-email">
                        <p><?php echo $sms->client_mail; ?></p>
                    </div>
                    <div class="at-admin-sms-message">
                        <p><?php echo $sms->client_sms; ?></p>
                    </div>
                </div>
            </div>

            <?php
        }
    }else{
        echo "No SMS found";
    }
    
    ?>

</section>