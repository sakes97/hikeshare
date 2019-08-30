$(document).ready(function(){
    /**
     * set the menu item/link to active
     */ 
    $("li a").click(function(){
        $("li a").removeClass("active");
        $(this).addClass("active");
    });

    /**
     * Hide/Show menu's view
     */
    $("#t_home").click(function(){
        $("#display-content div").hide();
        $("#display-content #dash_home").show();
    });
    $("#t_messages").click(function(){
        $("#display-content div").hide();
        $("#display-content #dash_messages").show();
    });
    $("#t_reviews").click(function(){
        $("#display-content div").hide();
        $("#display-content #dash_reviews").show();
    });
    $("#t_ride_history").click(function(){
        $("#display-content div").hide();
        $("#display-content #dash_ride_history").show();
    });
    $("#t_preferences").click(function(){
        $("#display-content div").hide();
        $("#display-content #dash_preferences").show();
    });
    $("#t_account").click(function(){
        $("#display-content div").hide();
        $("#display-content #dash_account").show();
    });
    

    /**
     * edit profile button click
     */
    $("#edit_profile").click(function(){
        $("#display-content div").hide();
        $("li a").removeClass("active");
        $("#t_account").addClass("active");
        $("#display-content #dash_account").show();
    });
    $("#edit_preferences").click(function(){
        $("#display-content div").hide();
        $("li a").removeClass("active");
        $("#t_preferences").addClass("active");
        $("#display-content #dash_preferences").show();
    });
});
