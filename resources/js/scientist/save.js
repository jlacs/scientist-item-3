$(document).ready(function($){
    $('body').on('click', '#save-scientist', function (event) {
        var id = $("#id").val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var theory = $('#theory').val();
        
        $.ajax({
            type:"POST",
            url: "save-scientist",
            data: {
                id: id,
                firstname: firstname,
                lastname: lastname,
                theory: theory
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
                window.location.reload();
                $("#save-scientist").attr("disabled", false);
            }
        });
    });
});