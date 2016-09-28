$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var url = '/sort_';

    // ON LOAD get & sort default
    $.ajax({
        type:'POST',
        url: url + "default",
        success: function (data) {
            $('#movie_list').hide().html(data).fadeIn();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });

    // ON CLICK get & sort title decending
    $('#sortbar').on('click', '.sort-title',function(){
        console.log("click");

        $.ajax({
            type:'POST',
            url: url + "title",
            success: function (data) {
                $('#movie_list').hide().html(data).fadeIn();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //ON CLICK get & sort year decending
    $('#sortbar').on('click', '.sort-year',function(){
        console.log("click");

        $.ajax({
            type:'POST',
            url: url + "year",
            success: function (data) {
                $('#movie_list').hide().html(data).fadeIn();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
