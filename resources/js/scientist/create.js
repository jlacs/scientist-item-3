$(document).ready(function($){
    $('body').on('click', '.add-scientist', function () {
        $('.theory-form').show();
        $('#id').val('');
        $('#firstname').val('');
        $('#lastname').val('');
    });
});