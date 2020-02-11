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
        console.log(datos);
        // Recorre los elementos para verificar si algo viene vacío.
        var vacio = false;
        var pagina_actual;
        datos.forEach(element => {
            if (element.value === '') {
                vacio = true;
            }
            if (element.value === 'editar-admin' || element.value === 'crear-admin' || element.value === 'crear-evento' || element.value === 'editar-evento'  || element.value === 'crear-categoria' || element.value === 'editar-categoria') {
                pagina_actual = element.value;
            }
        });
        
        // Si algo se envió vacío, pero estoy en editar-admin hace el llamado a AJAX.
        switch (pagina_actual) {
            case 'crear-admin':
                ajaxRegistro(this, datos, 'crear-admin');
                break;

            case 'editar-admin':
                ajaxRegistro(this, datos, 'editar-admin');
                break;

            case 'crear-evento':
                ajaxRegistro(this, datos, 'crear-evento');
                break;

            case 'editar-evento':
                ajaxRegistro(this, datos, 'editar-evento');
                break;

            case 'crear-categoria':
                ajaxRegistro(this, datos, 'crear-categoria');
                break;

            case 'editar-categoria':
                ajaxRegistro(this, datos, 'editar-categoria');
                break;
                                                
            default:
                alert('success', 'generico')
                break;
        }
    });

    function ajaxRegistro(element_this, datos, pagina_actual) {
        // Llamado a AJAX en JQuery
        $.ajax({
            type: $(element_this).attr('method'), // Tipo de request que vamos a hacer.
            url: $(element_this).attr('action'), // A dónde se van a ir los datos. En este caso es modelo-admin.php
            data: datos, // Datos que quieres enviar a AJAX.
            dataType: "json", // Tipo de dato.
            success: function (data) {
                var respuesta = data;
                console.log(respuesta);
                if (respuesta.respuesta == 'exito') {
                    // Limpia el formulario
                    $("#guardar-registro")[0].reset();

                    // Limpia el feedback anterior del password repetido.
                    var campo_password = $('#password');
                    var campo_repetir_password = $('#repetir_password');            
                    campo_password.removeClass('is-valid is-invalid');
                    campo_repetir_password.removeClass('is-valid is-invalid');
                    $('#resultado_password').removeClass('valid-feedback invalid-feedback');

                    switch (pagina_actual) {
                        case 'crear-admin':
                            alert('success', 'adminCreado')
                            break;
                        case 'editar-admin':
                            alert('success', 'adminEditado');
                            break;
                        case 'crear-evento':
                            alert('success', 'eventoCreado');
                            break;
                        case 'editar-evento':
                            alert('success', 'eventoEditado');
                            break;
                        case 'crear-categoria':
                            alert('success', 'categoriaCreada');
                            break;
                        case 'editar-categoria':
                            alert('success', 'categoriaEditada');
                            break;
                                                            
                        default:
                            alert('success', 'generico')
                            break;
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

    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        
        // Alerta de confirmación
        Swal.fire({
            title: '¿Estás seguro que deseas eliminarlo?',
            text: "No hay forma de recuperarlo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
          }).then(function() {
            $.ajax({
                type: "post",
                url: 'modelo-' + tipo + '.php',
                data: {
                    'id' : id,
                    'registro' : 'eliminar'
                },
                success: function (data) {
                    var resultado = JSON.parse(data); // lo convierte a objeto de JS.
                    console.log(resultado);
                    if (resultado.respuesta == 'exito') {
                        // Elimina registro.
                        Swal.fire(
                            '¡Eliminado!',
                            'El usuario fue eliminado',
                            'success'
                        );

                        // Lo borra del DOM.
                        // data-id  es nuestro propio id.
                        $('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove(); 
                    } else {
                        alert('error', 'generico');
                    }
                }
            });
        });
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
                case 'generico':
                    titulo = 'Listo';
                    descripcion = 'Tarea realizada con éxito';           
                    break;

                case 'adminCreado':
                    titulo = '¡Admin creado!';
                    descripcion = 'El administrador fue creado exitosamente';
                    break;
    
                case 'adminEditado':
                    titulo = '¡Admin editado!';
                    descripcion = 'El administrador fue modificado exitosamente';
                    break;

                case 'eventoCreado':
                    titulo = '¡Evento creado!';
                    descripcion = 'El evento fue creado exitosamente';
                    break;

                case 'eventoEditado':
                    titulo = '¡Evento editado!';
                    descripcion = 'El evento fue editado exitosamente';
                    break;

                case 'categoriaCreada':
                    titulo = 'Categoria creada!';
                    descripcion = 'La categoria fue creada exitosamente';
                    break;

                case 'categoriaEditada':
                    titulo = 'Categoria editada!';
                    descripcion = 'La categoria fue editada exitosamente';
                    break;

                default:
                    titulo = 'Listo';
                    descripcion = 'Tarea realizada con éxito';
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