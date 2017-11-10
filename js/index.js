$(document).ready(function(){
  $('#search').focus()

  $('#search').on('keyup', function(){
    var search = $('#search').val()
    $.ajax({
      type: 'POST',
      url: '../busqueda.php',
      data: {'search': search},
      beforeSend: function(){
        $('#result').html('<img src="img/espera.gif" width="240" heigth="240">')
      }
    })
    .done(function(resultado){
      $('#result').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
})