$(document).ready(function(){
    var url = window.location.href;
    if($('#search').length){
        console.log(url);
        index();
    }
    if (window.location.href.indexOf("addmovie") > -1) {
        console.log(url);
        addmovie();
    }
    if (window.location.href.indexOf("detail") > -1) {
        console.log(url);
        detail();
    }
    if (window.location.href.indexOf("dashboard") > -1) {
        console.log(url);
        dashboard();
    }
});

function index(){
    var word = []

    $('#search').keyup(function(e) {
        console.log(e)
        var test = $('.ajax active');
        console.log(test);
        if( (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 8 && e.keyCode <= 46) ) {
            //var what = e.key;
            //word.push(what);
            //word.push(String.fromCharCode(e.keyCode));
            //var test = word.join('');
            //console.log(word);

            word = e.target.value;
            if(word == []){
                word = "*";
            }

            $.ajax({
                type: 'GET',
                url: '/search/' + word,
                success: function (data) {
                    console.log('/search/' + word);
                    console.log(data);
                    $('#movie_list').hide().html(data).fadeIn();
                },
                error: function (data) {
                    console.log(data);
                    //var response = $('#response')[0];
                    //response.innerHTML = data.responseText;
                }
            });
        }
    });
}
function addmovie(){
    //add years to the list and set the default value to todays year
    for (var i = new Date().getFullYear() + 20; i > 1849; i--) {
        $('#year').append($('<option/>').val(i).html(i));
    };
    $('#year').val(new Date().getFullYear());
}

function detail(){
    //Check voor postback en laat form zien al true
    $('#form')
    if($('#form').hasClass("postback")){
        $('#info').fadeOut();
        $('#form').fadeIn();
        //add years to the list and set the default value to prevous year
        for (var i = new Date().getFullYear() + 20; i > 1849; i--) {
            $('#year').append($('<option/>').val(i).html(i));
        };
        $('#year').val($('#year').data().year);
    };
    //Delete movie
    $('#deletemovie').on("click", function(){
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
    //Cancel editing the movie
    $('#canceledit').on('click', function() {
        $('#editmovie').fadeIn();
        $('#form').fadeOut();
        $('#info').fadeIn();
    });
    //Show trailer on click
    $('#watchtrailer').on('click', function() {
        $('#ytplayer').fadeIn();
    });
}
function dashboard(){
    //change switch size
    $.fn.bootstrapSwitch.defaults.size = 'mini';
    //install switch
    $("[name='my-checkbox']").bootstrapSwitch();
    //on click
    $("[name='my-checkbox']").on('switchChange.bootstrapSwitch', function(event, state) {
        //console.log(this); // DOM element
        //console.log(state); // true | false
        var moderator   = event.target.parentElement.parentElement.parentElement.parentElement.children[2];
        var email       = event.target.parentElement.parentElement.parentElement.parentElement.children[1].innerHTML;
        var values = {
            'email'       : email,
            'state'        : state,
        }

        $.ajax({
            type:'POST',
            url: '/toggleadmin',
            data: values,
            success: function (data) {
                console.log(data);
                if(moderator.innerHTML == 0){
                    $(moderator).html("1");
                }else{
                    $(moderator).html("0");
                }
            },
            error: function (data) {
                var response = $('#response')[0];
                response.innerHTML = data.responseText;
            }
        });
    });
}
