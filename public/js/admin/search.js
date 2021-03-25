$(document).on('keyup', 'input', function (event) {

    let $key = event.key;
    const regex = new RegExp(/[A-Za-zА-яа-я0-9]/, 'gm');

    if ((regex.test($key) && event.key.length < 2) || event.code == 'Backspace') {
        let u_name = $('#u-name').val();
        let u_login = $('#u-login').val();
        let u_phone = $('#u-phone').val();
        let u_group = $('#u-group').val();
        let u_position = $('#u-position').val();
        let u_department = $('#u-department').val();
        let u_ip_restrict = $('#u-ip-restrict').val();

        $.ajax({
            url: 'http://l12.stspecmontag.com.ua/admin/user/search_ajax',
            type: 'GET',
            cache: false,
            data: {'u_name': u_name,
                'u_login': u_login,
                'u_phone': u_phone,
                'u_group': u_group,
                'u_position': u_position,
                'u_department': u_department,
                'u_ip_restrict': u_ip_restrict,
            },
            dataType: 'json',
            success: function(data)
            {
                $('#table-user').html('');
                $('#table-user').html(data[0]);
                $('.pagination').html('');
                $('.pagination').html(data[1]);
            },
        });
    }
});

$(document).on('change', 'select', function (event) {

    let u_name = $('#u-name').val();
    let u_login = $('#u-login').val();
    let u_phone = $('#u-phone').val();
    let u_group = $('#u-group').val();
    let u_position = $('#u-position').val();
    let u_department = $('#u-department').val();
    let u_ip_restrict = $('#u-ip-restrict').val();

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/user/search_ajax',
        type: 'GET',
        cache: false,
        data: {'u_name': u_name,
            'u_login': u_login,
            'u_phone': u_phone,
            'u_group': u_group,
            'u_position': u_position,
            'u_department': u_department,
            'u_ip_restrict': u_ip_restrict,
        },
        dataType: 'json',
        success: function(data)
        {
            $('#table-user').html('');
            $('#table-user').html(data[0]);
            $('.pagination').html('');
            $('.pagination').html(data[1]);
        },
    });
});
