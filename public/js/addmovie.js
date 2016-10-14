$(document).ready(function(){

//select
    for (var i = new Date().getFullYear() + 20; i > 1849; i--) {
        $('#year').append($('<option/>').val(i).html(i));
    };
    $('#year').val(new Date().getFullYear());
});
