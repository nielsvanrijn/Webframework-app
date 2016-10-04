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
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });

    //ON CLICK get & sort year decending
    $('#sortbar').on('click', '.ajax',function(e){
        var what = (e.target.outerText).slice(0,-1);
        var how = e.target.value;
        var genre = (e.target.outerText);
        if(genresave == "" && e.target.nodeName == "LI"){genresave = genre};
        if(genresave == "" && e.target.nodeName == "BUTTON"){genresave = ","};

        if(e.target.nodeName == "BUTTON"){genre = ","};
        if(e.target.nodeName == "LI"){
            what = "title"; how = "ASC"; genresave = genre
            var test = $('li.active')[0]; $(test).removeClass('active');
            $(e.target).addClass('active');
        };
        if(genresave == "All"){genresave = ","}

        console.log(
            "what " + what + "." + '\n' +
            "how " + how + '\n' +
            "genre " + genre + "." + '\n' +
            "genre save " + genresave
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
