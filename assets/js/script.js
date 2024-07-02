jQuery(document).ready(function($) {
    // Menu Active JS
    // $("li").click( function(){
    //     $(this).siblings().removeClass("active");
    //     $(this).addClass("active");
    // });

    // Mobile menu
    $("#at-show_menu").click ( function(){
        $(this).addClass("at-hide");
        $("#at-hide_menu").removeClass("at-hide");
        $("#at-menu").slideDown(500);
    });
    $("#at-hide_menu").click ( function(){
        $(this).addClass("at-hide");
        $("#at-show_menu").removeClass("at-hide");
        $("#at-menu").slideUp(500);
    });

    // Contact Form 
    $("#at-contact_btn").click( function(){
        $("#at-popup_contact").addClass("at-popup_contact_show");
        // alert("Hello");
        });
    $("#at-xmark").click( function(){
        $("#at-popup_contact").removeClass("at-popup_contact_show");
    });
});