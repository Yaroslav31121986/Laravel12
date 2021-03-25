$(document).ready(function () {
    $('#butt').on('click', function(event) {
        let thickness = $('#thickness').val();
        let area = $('#area').val();
        let hero = $('#hero').val();
        let result = (area * thickness) * hero;

        $('#sum').html(result);
    });
});


