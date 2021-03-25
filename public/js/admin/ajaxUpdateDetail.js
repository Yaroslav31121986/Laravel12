$(document).ready(function () {

    let _token = $("input[type='hidden']").val();

    console.log(_token);

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/detail/25/update',
        type: 'POST',
        cache: false,
        data: {
            '_token': _token,
            'd_abbr': 'Тестовая деталь (2)',
            'd_notice': 'бла бла бла',
            'pr_id': [
                2,
                4,
            ],
            'dpr_options': [
                'тестовая',
                'тестовая при новая',
            ],
            'dpr_notice': [
                'тестовая',
            ],
            'dpa_abbr': [
                'test',
                'test2',
            ],
            'dpa_type': [
                0,
                1,
            ],
            'dpa_notice': [
                'test',
                'test2',
            ],
            'dm_material_id': [
                1,
                3,
            ],
            'dm_qty': [
                125,
                121,
            ],
            'dm_calc': [
                125/8,
            ],
        },
        dataType: 'json',
    });
});