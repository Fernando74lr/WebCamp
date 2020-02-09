// Este script se relaciona a la interfaz del proyecto.

$(function () {
    $('#registros').DataTable({
      "paging": true,
      "pageLength": 10,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "language": {
        paginate: {
          next: 'Siguiente',
          previous: 'Anterior',
          last: 'Último',
          first: 'Primero'
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        emptyTable: 'No hay registros',
        infoEmpty: '0 Registros',
        search: 'Buscar'
      }
    });
});

$('#crear_registro').attr('disabled', true);

$('#repetir_password').on('keyup', function() {
  var password_nuevo = $('#password').val(); // valor del password nuevo
  var campo_password = $('#password');
  var campo_repetir_password = $('#repetir_password');

  campo_password.removeClass('is-valid is-invalid');
  campo_repetir_password.removeClass('is-valid is-invalid');
  $('#resultado_password').removeClass('valid-feedback invalid-feedback');

  // Passwords iguales
  if ($(this).val() == password_nuevo) {
      $('#resultado_password').text('Correcto');
      campo_password.addClass('is-valid');
      campo_repetir_password.addClass('is-valid');
      $('#resultado_password').addClass('valid-feedback');
      $('#crear_registro').attr('disabled', false);

  } else { // Passwords distintos

      $('#resultado_password').text('Las contraseñas no coinciden');
      campo_password.addClass('is-invalid');
      campo_repetir_password.addClass('is-invalid');
      $('#resultado_password').addClass('invalid-feedback');
      $('#crear_registro').attr('disabled', true);
  }

});