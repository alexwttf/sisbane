$(document).ready(function(){

$("#register-form").submit(function(e){
    e.preventDefault();
    $.ajax({
        url: "checarfb.php",
        type: "POST",
        data: {dato: $("#idfacebook").val()},
        success: function(response){
            if (response != 1)
                $(this).submit();
            else
                alert("Los datos ingresados ya se encuentran registrados");
        }
    });
});
});