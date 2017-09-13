var modal = $("#myModal");

$(document).on('click', '.img-portfolio img', function () {  
    var src = $(this).attr("src");

    $("#img01").attr("src", src);
    
    modal.show();
});

$(document).on('click', '.close', function () {
    modal.hide();
});

$(document).on('click', '#myModal', function () {
    modal.hide();
})