$(document).ready(function () {
    $("#crear-admin").on('submit', function(e) {
        /*
            preventDefault().
            Ejecuta el action del form, pero no queremos que abra el archivo.
            sólo queremos que envíe los datos (através de AJAX).
        */
        e.preventDefault();

        /*
            serializeArray().
            Itera por todos los campos y nos regresa un arreglo de objetos 
            con los datos en cada uno.
        */
        var datos = $(this).serializeArray();
        
        // Recorre los elementos para verificar si algo viene vacío.
        var vacio = 0;
        datos.forEach(element => {
            if (element.value === '') {
                vacio++;
            }
        });

        // Si algo se envió vacío alerta un error, de otro modo hace el llamado a AJAX.
        if (vacio > 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enviaste un campo vacío',
            });
        } else {
            /*
                Llamado a AJAX en JQuery.
            */
            $.ajax({
                type: $(this).attr('method'), // Tipo de request que vamos a hacer.
                url: $(this).attr('action'), // A dónde se van a ir los datos. En este caso es insertar-admin.php
                data: datos, // Datos que quieres enviar a AJAX.
                dataType: "json", // Tipo de dato.
                success: function (data) {
                    var respuesta = data;
                    if (respuesta.respuesta == 'exito') {
                        // Limpia el formulario
                        $("#crear-admin")[0].reset();
                        // Alerta que fue correcto el proceso.
                        Swal.fire({
                            icon: 'success',
                            title: '¡Admin creado!',
                            text: 'El administrador fue creado exitosamente',
                        });
                    } else {
                        if(respuesta.respuesta == 'repetido') {
                            // Alerta que el nombre de usuario se repitió.
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Usuario repetido, intenta otro nombre de usuario.',
                            });
                        } else {
                            // Alerta que hubo un error en el proceso.
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Algo salió mal, intenta de nuevo',
                            });
                        }
                    }
                }
            });
        }


    });

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
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enviaste un campo vacío',
            });
        } else {
            $.ajax({
                type: $(this).attr('method'), // Tipo de request que vamos a hacer.
                url: $(this).attr('action'), // A dónde se van a ir los datos. En este caso es insertar-admin.php
                data: datos, // Datos que quieres enviar a AJAX.
                dataType: "json", // Tipo de dato.
                success: function (data) {
                    var respuesta = data;
                    if (respuesta.respuesta == 'exitoso') {
                        // Limpia el formulario
                        $("#login-admin")[0].reset();
                        // Alerta que fue correcto el proceso.
                        Swal.fire({
                            icon: 'success',
                            title: 'Bienvenido(a), ' + respuesta.usuario + '.',
                            text: 'Has accedido exitosamente a tu cuenta',
                        });
                    } else {
                        // Alerta que hubo un error en el proceso.
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Usuario o contraseña incorrectos :/',
                        });
                    }
                    
                }
            });
        }


    });
});