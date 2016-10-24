$(document).ready(function(){
    var url = window.location.href;
    if (window.location.href.indexOf("addmovie") > -1) {
        console.log(url);
        addmovie();
    }
    if (window.location.href.indexOf("detail") > -1) {
        console.log(url);
        detail();
    }
});

function addmovie(){
    //add years to the list and set the default value to todays year
    for (var i = new Date().getFullYear() + 20; i > 1849; i--) {
        $('#year').append($('<option/>').val(i).html(i));
    };
    $('#year').val(new Date().getFullYear());
}

function detail(){
    //Delete movie
    var deletemovie = $('.btn-danger')[0];
    $(deletemovie).on("click", function(){
        return confirm("Do you want to delete this item?");
    });

    //On click show & hide form
    $('#editmovie').on('click', function() {
        $(this).fadeOut();

        $('#info').fadeOut();
        $('#form').fadeIn();
        console.log($('#year').val());
        //add years to the list and set the default value to prevous year
        for (var i = new Date().getFullYear() + 20; i > 1849; i--) {
            $('#year').append($('<option/>').val(i).html(i));
        };
        $('#year').val($('#year').data().year);
    });
    $('#canceledit').on('click', function() {
        $('#editmovie').fadeIn();
        $('#form').fadeOut();
        $('#info').fadeIn();
    });

}
