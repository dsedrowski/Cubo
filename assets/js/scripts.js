﻿var modal = $("#myModal");

//$(document).on('click', '.img-portfolio img', function () {  
//    var src = $(this).attr("src");

//    $("#img01").attr("src", src);
    
//    modal.show();
//});

//$(document).on('click', '.close', function () {
//    modal.hide();
//});

//$(document).on('click', '#myModal', function () {
//    modal.hide();
//})

$(".gallery").each(function () { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: "a", // the selector for gallery item
        type: "image",
        gallery: {
            enabled: true
        }
    });
});