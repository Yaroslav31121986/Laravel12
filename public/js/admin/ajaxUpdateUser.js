$(document).ready(function () {

    // let u_name = 'Hello frend';
    let _token = $("input[type='hidden']").val();

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/user/40/update',
        type: 'POST',
        cache: false,
        data: {
            'u_name': 'Льоша',
            '_token': _token,
            'u_login': 'Льоша5',
            'u_surname': 'M3',
            'u_email': 'email@email.com',
            'u_phone': '380668187092',
            'password': 'passowrd2',
            'password_confirmation': 'passowrd2',
            'u_group': '1',
            'u_lang': 'en',
            'u_position': '1',
            'u_department': '2',
            'u_active': '0',
            'u_ip_restrict': '0',
            'user_perm': [1, 2, 6],
        },
        dataType: 'json',
        // success: function(data)
        // {
        //     console.log(data);
        // },
    });
});
