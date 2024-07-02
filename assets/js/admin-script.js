jQuery(document).ready(function($) {

    $(".at-admin-sms-visible").click(function() {
        // Check to see if there is a toggled question and close it.
        if ($('.at-admin-sms-invisible').is(':visible')) {
            $(".at-admin-sms-invisible").slideUp(300);
            $('.at-admin-sms-visible').removeClass("at-open");
            $('.at-admin-sms-visible').removeClass("at-open");
            console.log('Condition 1');
        }
        if ($(this).next(".at-admin-sms-invisible").is(':visible')) {
            // If user clicks on an at-open question, closed it. Remove css classes.
            $(this).next(".at-admin-sms-invisible").slideUp(300);
            $(this).parent().removeClass("at-open");
            $(this).removeClass("at-open");
            console.log('Condition 2');
        } 
        else { 
            // If user clicks on a question with an hidden answer, slideDown the answer and apply css classes.
            $(this).next(".at-admin-sms-invisible").slideDown(300);
            $(this).parent().addClass('at-open');
            $(this).addClass('at-open');
            console.log('Condition 3');
        }
    });


});