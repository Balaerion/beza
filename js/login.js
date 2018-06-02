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
          location.href = 'controlador/admin/listaclientes.php';
        } else if (respuesta.tipo == 'usuario') {
          location.href = 'index.php';
        }
      } else {
        $('#bt').html('Log On');
        $('#alerta').append('<div class="alert alert-danger alert-dismissible">' +
          '<a href = "#" class = "close" data - dismiss = "alert" aria-label = "close" > &times; </a>' +
          '<strong> ERROR! </strong> Username or password are incorrect. </div>');
      }
    })
    .fail(function (resp) {
      console.log(resp.responseText);      
    })
    .always(function () {
      console.log("complete");
    });
});