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
                        //$("#crear-admin").reset();
                        Swal.fire({
                            icon: 'success',
                            title: '¡Admin creado!',
                            text: 'El administrador fue creado exitosamente',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Algo salió mal, intenta de nuevo',
                        });
                    }
                }
            });
        }


    });
});