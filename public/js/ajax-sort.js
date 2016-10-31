$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var url = '/sort/';
    var genresave = "";

    // ON LOAD get & sort default
    $.ajax({
        type:'GET',
        url: url + "default",
        success: function (data) {
            $('#movie_list').hide().html(data).fadeIn();
            var all = $('#genrelist')[0];
            $(all.children["0"]).addClass('active');
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });

    //ON CLICK get & sort year decending
    $('#sortbar').on('click', '.ajax',function(e){
        var what = (e.target.outerText).slice(0,-1).toLowerCase();
        var how = e.target.value;
        var $genre_id = (e.target.dataset.id);
        if(genresave == "" && e.target.nodeName == "LI"){genresave = $genre_id};
        if(genresave == "" && e.target.nodeName == "BUTTON"){genresave = 1};

        if(e.target.nodeName == "BUTTON"){$genre_id = 1};
        if(e.target.nodeName == "LI"){
            what = "title"; how = "ASC"; genresave = $genre_id
            var test = $('li.active')[0]; $(test).removeClass('active');
            $(e.target).addClass('active');
        };
        if(genresave == "All"){genresave = 1}

        console.log(
            "what " + what + "." + '\n' +
            "how " + how + '\n' +
            "genre " + $genre_id + "." + '\n' +
            "genre save " + genresave + "." + '\n' +
            url + what + "/" + how + "/" + genresave
        );

        $.ajax({
            type:'GET',
            url: url + what + "/" + how + "/" + genresave,
            success: function (data) {
                $('#movie_list').hide().html(data).fadeIn();
                $('.loading').hide();
                if(how == "DESC"){
                    e.target.value = "ASC";
                    var ASCicon = $(e.target.children)[0];var DESCicon = $(e.target.children)[1];
                    $(ASCicon).addClass('hide');$(DESCicon).removeClass('hide');
                }else{
                    e.target.value = "DESC";
                    var ASCicon = $(e.target.children)[0];var DESCicon = $(e.target.children)[1];
                    $(ASCicon).removeClass('hide');$(DESCicon).addClass('hide');
                };
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
