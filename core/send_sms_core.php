<?php 
/**
 * This is SMS sending file 
 * 
 * This file sends SMS from user to Aamin and shows responses 
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Including PHPMailer Autoload 
require('phpmailerautoload/PHPMailerAutoload.php');


 // Hook into the AJAX action, 'my_ajax_action' in this example
 add_action('wp_ajax_at_send_sms', 'at_ajax_handler');
 add_action('wp_ajax_nopriv_at_send_sms', 'at_ajax_handler'); // For non-logged-in users
 
 function at_ajax_handler() {
 
 
    if((isset($_POST["c_name"])) && (isset($_POST["c_mail"])) && (isset($_POST["message"]))){

        
        $client_name = htmlentities($_POST["c_name"]);
        $client_mail = htmlentities($_POST["c_mail"]);
        $message = htmlentities($_POST["message"]);
        // $page = htmlentities($_REQUEST["page"]);

        if($client_name == "" || $client_mail == "" || $message == ""){
            echo "Please fill out all Fields.";
        } else {
            if (filter_var($client_mail, FILTER_VALIDATE_EMAIL)) {

                global $wpdb;

                $table_name = $wpdb->prefix . 'at_send_sms';

                // Time of sending sms 
                date_default_timezone_set("Asia/Dhaka");
                $time = date("Y-M-d h:i:sa");
                
                $query = array(
                    'client_name'   => $client_name,
                    'client_mail'   => $client_mail,
                    'client_sms'    => $message,
                    'client_time'   => $time,
                );

                $runsend = $wpdb->insert( $table_name, $query );
            
                if($runsend == true){

                    $mail = new PHPMailer();

                    $mail->setFrom( $client_mail , $client_name );
                    $mail->addAddress('mamun2dhost@gmail.com', 'Abdullah Almamun');
                    $mail->Subject = 'Your Subject'; 
                    $mail->Body = "Hello, this is the content of the email! $message"; 
    
                    // Send the email
                    if ($mail->send()) {
                        echo 'Thank you for contacting me';
                    } else {
                        echo 'Data inserted but Email sending failed. Error: ' . $mail->ErrorInfo;
                    }

                }else{
                    echo "Failed to insert data";
                }

                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                dbDelta( $runsend );


            } else {
                echo("$client_mail is not a valid email address");
            }
        }
    }

     wp_die();
 }
 