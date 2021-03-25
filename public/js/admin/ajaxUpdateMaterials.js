$(document).ready(function () {

    // let u_name = 'Hello frend';
    let _token = $("input[type='hidden']").val();

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/materials/3/update',
        type: 'POST',
        cache: false,
        data: {
            '_token': _token,
            'm_name': 'пластмасса',
            'm_units': 'кг',
            'm_units_type': 'кг',
            'm_price': '1528.56',
            'm_critical_limit': '120',
            'm_minimal_limit': '12',
            'm_notice': 'бла бля бла',
        },
        dataType: 'json',
        // success: function(data)
        // {
        //     console.log(data);
        // },
    });
});
