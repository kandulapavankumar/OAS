$(function() {


    $('.subnavbar').find('li').each(function(i) {

        var mod = i % 3;

        if (mod === 2) {
            $(this).addClass('subnavbar-open-right');
        }

    });


});

$(document).ready(function() {
    $("#generate_excel").val("no");
    $(".excel_btn").on("click", function() {
        $("#generate_excel").val("yes");
        $("#driver_location_tracker").submit();
    });
    $(".submit_btn").on("click", function() {
        $("#generate_excel").val("no");
        $("#driver_location_tracker").submit();
    })
   });