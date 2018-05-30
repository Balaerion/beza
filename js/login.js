jQuery(document).on('submit', '#formLg', function (event) {
  event.preventDefault();
  jQuery.ajax({
    url: 'modelo/login.php',
    type: 'POST',
    dataType: 'json',
    data: $(this).serialize(),
    beforeSend: function () {
      $('#bt').html('Validando....');
    }
  })
    .done(function (respuesta) {
      console.log(respuesta);
      if (!respuesta.error) {
        if (respuesta.tipo == 'Admin') {
          location = 'controlador/admin/listaclientes.php';
        } else if (respuesta.tipo == 'usuario') {
          location = 'index.html';
        }
      } else {
        $('#bt').html('Log In');
      }
    })
    .fail(function (resp) {
      console.log(resp.responseText);
    })
    .always(function () {
      console.log("complete");
    });
});