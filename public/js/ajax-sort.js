$(document).ready(function(){
    console.log("test");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var url = '/sort';

    console.log("test");

    //delete task and remove it from list
    var test = $('#sortbar').on('click', '.delete-task',function(){
        console.log("click");

        $.ajax({
            url: url,
            success: function (data) {
                console.log(data);
                console.log("success!");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
