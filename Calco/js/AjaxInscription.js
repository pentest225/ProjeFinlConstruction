$(document).ready(function() {
    $("#client").unbind('submit').bind('submit', function() {
        alert('formulaire soumis');
        var form = $(this);
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            success:function(response) {
                if(response.success == true) {
                    $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  response.messages + 
                '</div>');

                    $('input[type="text"]').val('');
                    $(".fileinput-remove-button").click();
                }
                else {
                    $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  response.messages + 
                '</div>');
                }
            }
        });

        return false;
    });
});