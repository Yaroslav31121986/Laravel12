$(document).ready(function () {

    let _token = $("input[type='hidden']").val();

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/stages/4/update',
        type: 'POST',
        cache: false,
        data: {
            '_token': _token,
            'st_abbr': 'Новое название',
            'st_options': 'какая то новая опция',
            'st_notice': 'новое примечание',
        },
        dataType: 'json',
        // success: function(data)
        // {
        //     console.log(data);
        // },
    });
});
