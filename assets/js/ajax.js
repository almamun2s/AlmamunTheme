jQuery(document).ready(function($) {

    $('#at-send_sms').click( function(){

        // alert("Hello");

        $('#at-message_response').addClass('at-hide');
        $('#at-sending_data').removeClass('at-hide');
        let client_name = $('#at-name').val();
        let client_mail = $('#at-email').val();
        let message = $('#at-message').val();

        var path = at_ajax_object.ajaxurl ;

        
        
        $.post( path , { action: 'at_send_sms', c_name: client_name, c_mail: client_mail, message: message }, function(data){
            setTimeout( function (){
                $('#at-message_response').removeClass('at-hide');
                $('#at-message_response').html(data);
                $('#at-sending_data').addClass('at-hide');

            }, 500);
        })



        
    });

});
