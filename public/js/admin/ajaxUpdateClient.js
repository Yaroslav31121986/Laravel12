$(document).ready(function () {

    let _token = $("input[type='hidden']").val();

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/client/3/update',
        type: 'POST',
        cache: false,
        data: {
            '_token': _token,
            'c_name': 'Yahooo',
        },
        dataType: 'json',
        // success: function(data)
        // {
        //     console.log(data);
        // },
    });
});
