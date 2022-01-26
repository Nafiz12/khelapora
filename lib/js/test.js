$(document).ready(function() {
    setTimeout(popup, 1000);
    function popup() {
        $("#logindiv").css("display", "block");
    }
    $("#login #cancel").click(function() {
        $(this).parent().parent().hide();
    });
    $("#onclick").click(function() {
        $("#contactdiv").css("display", "block");
    });
    $("#contact #cancel").click(function() {
        $(this).parent().parent().hide();
    });


});