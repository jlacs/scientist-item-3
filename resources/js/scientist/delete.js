$(document).ready(function($){
    $('body').on('click', '.delete-scientist', function () {
        if (confirm("Delete Record?") == true) {
            var id = $(this).data('id');
        
            $.ajax({
                type:"POST",
                url: "delete-scientist",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    window.location.reload();
                }
            });
        }
    });
});