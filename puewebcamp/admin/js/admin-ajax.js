$(document).ready(function () {
    $("#guardar-registro").on('submit', function(e) {
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
        var vacio = false;
        var pagina_actual;
        datos.forEach(element => {
            if (element.value === '') {
                vacio = true;
            }
            if (element.value === 'editar-admin') {
                pagina_actual = element.value;
            }
        });

        // Si algo se envió vacío, pero estoy en editar-admin hace el llamado a AJAX.
        if (pagina_actual == 'editar-admin') {
            // Llamado a AJAX en JQuery.
            ajaxRegistro(this, datos, false);
        } else {
            if (vacio) {
                alert('error', 'vacio');
            } else {
                // Llamado a AJAX en JQuery
                ajaxRegistro(this, datos, true);
            }
        }
    });

    function ajaxRegistro(element_this, datos, adminNuevo) {
        // Llamado a AJAX en JQuery
        $.ajax({
            type: $(element_this).attr('method'), // Tipo de request que vamos a hacer.
            url: $(element_this).attr('action'), // A dónde se van a ir los datos. En este caso es modelo-admin.php
            data: datos, // Datos que quieres enviar a AJAX.
            dataType: "json", // Tipo de dato.
            success: function (data) {
                var respuesta = data;
                if (respuesta.respuesta == 'exito') {
                    // Limpia el formulario
                    $("#guardar-registro")[0].reset();
                    // Alerta que fue correcto el proceso.
                    if (adminNuevo) {
                        alert('success', 'creado');
                    } else {
                        alert('success', 'editado');
                    }
                } else {
                    if(respuesta.respuesta == 'repetido') {
                        // Alerta que el nombre de usuario se repitió.
                        alert('error', 'repetido');
                    } else {
                        // Alerta que hubo un error en el proceso.
                        alert('error', 'generico');
                    }
                }
            }
        });
    }

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
                        })
                        setTimeout(function() {
                            // Redireccionar con JavaScript después de 2 segundos.
                            window.location.href = 'admin-area.php'
                        }, 2000);
                    } else {
                        // Alerta que hubo un error en el proceso.
                        alert('error', 'credenciales');
                    }
                    
                }
            });
        }


    });

    function alert(caso, tipo) {
        var titulo, descripcion;

        if (caso === 'error') {
            switch (tipo) {
                case 'generico':
                    titulo = 'Oops...';
                    descripcion = 'Algo salió mal, intenta de nuevo';           
                    break;
    
                case 'repetido':
                    titulo = 'Error';
                    descripcion = 'Usuario repetido, intenta otro nombre de usuario';
                    break;
    
                case 'vacio':
                    titulo = 'Oops...';
                    descripcion = 'Enviaste un campo vacío';
                    break;
    
                case 'credenciales':
                    titulo = 'Oops...';
                    descripcion = 'Usuario o contraseña incorrectos :/';
                    break;
        
                default:
                    titulo = 'Oops...';
                    descripcion = 'Algo salió mal, intenta de nuevo';
                    break;
            }
        } else if (caso === 'success') {
            switch (tipo) {
                case 'creado':
                    titulo = '¡Admin creado!';
                    descripcion = 'El administrador fue creado exitosamente';
                    break;
    
                case 'editado':
                    titulo = '¡Admin editado!';
                    descripcion = 'El administrador fue modificado exitosamente';
                    break;

                default:
                    titulo = 'Oops...';
                    descripcion = 'Algo salió mal, intenta de nuevo';
                    break;
            }
        }

        Swal.fire({
            icon: caso,
            title: titulo,
            text: descripcion
        });
    }
});