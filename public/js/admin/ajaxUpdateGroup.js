$(document).ready(function () {

    let _token = $("input[type='hidden']").val();

    console.log(_token);

    $.ajax({
        url: 'http://l12.stspecmontag.com.ua/admin/group/2/update',
        type: 'POST',
        cache: false,
        data: {
            'ugroups_name': 'Менеджеры покраски',
            '_token': _token,
            'ugroups_description': 'Чото там делают',
            'groups_perm': [1, 2, 3],
        },
        dataType: 'json',
        // success: function(data)
        // {
        //     console.log(data);
        // },
    });
});
