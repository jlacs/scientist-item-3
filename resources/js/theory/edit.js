$(document).ready(function($){
    $('body').on('click', '.edit-theory', function () {
        var id = $(this).data('id');
        var theory = $(this).data('theory');
        
        $.ajax({
            type:"POST",
            url: "edit-theory",
            data: { id: id },
            dataType: 'json',
            success: function(res) {
                $('#id').val(res.id);
                $('#action').val('edit');
                $('#theory1').val(res.theory);
            }
        });
    });
});