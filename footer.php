<?php
/**
 * This is Footer Template file 
 *  
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



?>
<div class="at-footer">
    <div class="at-container">
        <div class="at-footer_top">
            <div class="at-footer_left">
                <h2><?php print get_theme_mod('at_footer_top_title'); ?></h2>
                <p><?php print get_theme_mod('at_footer_top_text'); ?></p>
            </div>
            <div class="at-footer_right">
                <button id="at-contact_btn"> Contact With Me </button>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="at-container">
        <h4><?php print get_theme_mod('at_footer_copyright'); ?></h4>
    </div>
</footer>


<div class="at-popup_contact" id="at-popup_contact">
    <div class="at-popup_inner" id="at-popup_inner">
        <div class="at-xmark" id="at-xmark">
            <i class="fas fa-xmark"></i>
        </div>
        <h2>Contact Form</h2>
        <div class="at-form at-contact_form">
            <div class="at-input">
                <input type="text" name="name" id="at-name" autocomplete="off" required>
                <label for="name"><span>Name</span></label>
            </div>
            <div class="at-input">
                <input type="text" name="email" id="at-email" autocomplete="off" required>
                <label for="email"><span>Email</span></label>
            </div>
            <div class="at-textarea">
                <textarea name="message" id="at-message" cols="30" rows="3" required></textarea>
                <label for="message"><span>Message</span></label>
            </div>
            <div class="at-input">
                <input type="submit" value="Send" id="at-send_sms">
            </div>
            <div id="at-message_response" class="at-sending_data at-hide"></div>
            <div id="at-sending_data" class="at-sending_data at-hide">
                Sending.....
            </div>
        </div>

    </div>
</div>

<?php wp_footer(); ?>

<script>
    // alert("Hello");
</script>
</body>

</html>