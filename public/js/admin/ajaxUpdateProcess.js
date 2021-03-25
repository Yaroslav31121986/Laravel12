$(document).ready(function () {

    // let u_name = 'Hello frend';
    let _token = $("input[type='hidden']").val();

    console.log(_token);

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/process/1/update',
        type: 'POST',
        cache: false,
        data: {
            '_token': _token,
            'pr_name': 'рихтовка',
            'pr_active': '0',
            'pr_type': '111',
            'pr_options': '999',
            'pr_notice': 'чо то там',

        },
        dataType: 'json',
        // success: function(data)
        // {
        //     console.log(data);
        // },
    });
});
