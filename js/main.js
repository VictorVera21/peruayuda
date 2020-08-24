$(document).ready(function() {

    $('#buscador').autocomplete({
        source: function(request, response){
            $.ajax({
                url:"buscarauto.php",
                dataType:"json",
                data:{q:request.term},
                success: function(data){
                    response(data);
                }

            });
        },
        minLength: 1,
    });

});