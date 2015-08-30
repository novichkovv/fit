/**
 * Created by asus1 on 29.08.2015.
 */
$ = jQuery.noConflict();
$(document).ready(function()
{
    $('body').css("background-color", "#B4D9E5;");
    $('body').fadeIn(200);
    $("#logout_button").click(function(e)
    {
        e.preventDefault();
        $("#log_out").submit();
    });
    $("#log-button").click(function()
    {
        $("#log").slideToggle();
    });
    $("#log").dblclick(function()
    {
        $(this).slideUp();
    });
    $(".sidebar-menu .expand").click(function()
    {
        $(this).parent().children('.sub-menu').slideToggle(100);
    });
});
