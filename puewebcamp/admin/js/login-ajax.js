$(document).ready(function () {
    $("#login-admin").on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();
        
        var vacio = 0;
        datos.forEach(element => {
            if (element.value === '') {
                vacio++;
            }
        });

        if (vacio > 0) {
            alert('error', 'vacio');
        } else {
            $.ajax({
                type: $(this).attr('method'), // Tipo de request que vamos a hacer.
                url: $(this).attr('action'), // A dónde se van a ir los datos. En este caso es insertar-admin.php
                data: datos, // Datos que quieres enviar a AJAX.
                dataType: "json", // Tipo de dato.
                success: function (data) {
                    var respuesta = data;
                    if (respuesta.respuesta == 'exito') {
                        // Limpia el formulario
                        $("#login-admin")[0].reset();
                        // Alerta que fue correcto el proceso.
                        Swal.fire({
                            icon: 'success',
                            title: 'Bienvenido(a), ' + respuesta.usuario + '.',
                            text: 'Has accedido exitosamente a tu cuenta'
                        });
                        setTimeout(function() {
                            // Redireccionar con JavaScript después de 2 segundos.
                            window.location.href = 'admin-area.php'
                        }, 2000);
                    } else {
                        // Alerta que hubo un error en el proceso.
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Usuario o password incorrectos'
                        });
                    } 
                }
            });
        }
    });
});