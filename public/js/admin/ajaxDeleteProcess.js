$(document).ready(function () {

    let _token = $("input[type='hidden']").val();

    console.log(_token);

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/process/3/delete',
        type: 'POST',
        cache: false,
        data: {
            '_token': _token,
        },
        dataType: 'json',
        // success: function(data)
        // {
        //     console.log(data);
        // },
    });
});
