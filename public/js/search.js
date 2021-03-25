$(document).on('change', 'input, select', function(event) {
    event.preventDefault();
    $('form')[0].submit();
});
