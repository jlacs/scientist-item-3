$(document).ready(function($){
    $('body').on('click', '.add-theory', function () {
        $('#theory1').val('');
        var id = $(this).data('id');
        var theory = $(this).data('theory');
        
        $.ajax({
            type:"GET",
            url: "get-scientist",
            data: { id: id },
            dataType: 'json',
            success: function(res) {
                $('#id').val(res.id);
                $('#action').val('add');
            }
        });
    });
});