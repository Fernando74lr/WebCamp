(function() {
    'use strict';

    var regalo = document.querySelector('#regalo');

    document.addEventListener('DOMContentLoaded', function() {

        // Mapa API con Leaflet
            /* Para cambiar la localización, cambia las coordenadas en 
            setView([x, y], zoom) y en marker. */
        var map = L.map('mapa').setView([19.001811, -98.235315], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([19.001811, -98.235315]).addTo(map)
            .bindPopup('PUEWebCamp 2019 <br> Boletos ya disponibles.')
            .openPopup()
            .bindTooltip('Hey, I\'m helping')
            .openTooltip();

        // Campos Datos Usuario
        var nombre = document.querySelector('#nombre');
        var apellido = document.querySelector('#apellido');
        var email = document.querySelector('#email');

        // Campos pases
        var pase_dia = document.querySelector('#pase_dia');
        var pase_dosdias = document.querySelector('#pase_dosdias');
        var pase_completo = document.querySelector('#pase_completo');

        // Botones y divisiones.
        var calcular = document.querySelector('#calcular');
        var errorDiv = document.querySelector('#error');
        var botonRegistro = document.querySelector('#btnRegistro');
        var lista_productos = document.querySelector('#lista-productos');
        var suma = document.querySelector("#suma-total");

        //  Extras
        var camisas = document.querySelector("#camisa_evento");
        var etiquetas = document.querySelector("#etiquetas");

        // Evitando errores comunes de JS con este 'if' para este caso
        if (document.getElementById('calcular')) {

            // Eventos y Funciones
            calcular.addEventListener('click', calcularMontos);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_dosdias.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);

            function validarEmail() {
                if (this.value.indexOf("@") > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid green';
                    errorDiv.innerHTML = '';
                }
                else {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = "Su Email debe contener una @";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                }
            }

            function validarCampos() {
                if (this.value == '') {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = "Este campo es obligatorio";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                }
                else {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid green';
                    errorDiv.innerHTML = '';
                }
            }

            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarEmail);

            function calcularMontos(event) {
                event.preventDefault();
                if (regalo.value === '') {
                    alert("Debes elegir un regalo");
                    regalo.focus();
                }
                else {
                    var boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                        boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                        cantCamisas = parseInt(camisas.value, 10) || 0,
                        cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                    var totalPagar = (boletosDia*30) + (boletos2Dias*45) + (boletoCompleto*50)
                                    + ((cantCamisas*10) * .93) + (cantEtiquetas*2);

                    var listadoProductos = [];

                    if (boletosDia >= 1)
                        listadoProductos.push(boletosDia + (boletosDia === 1 ? ' Pase por 1 día' : ' Pases por 1 día'));
                    if (boletos2Dias >= 1)
                        listadoProductos.push(boletos2Dias +  (boletos2Dias === 1 ? ' Pase por 2 días' : ' Pases por 2 días'));
                    if (boletoCompleto >= 1)
                        listadoProductos.push(boletoCompleto + (boletoCompleto === 1 ? ' Pase Completo' : ' Pases Completos'));
                    if (cantCamisas >= 1)
                        listadoProductos.push(cantCamisas + (cantCamisas === 1 ? ' Camiseta' : ' Camisetas'));
                    if (cantEtiquetas >= 1)
                        listadoProductos.push(cantEtiquetas + (cantEtiquetas === 1 ? ' Etiqueta' : ' Etiquetas'));
                    
                    lista_productos.style.display = "block";

                    lista_productos.innerHTML = '';
                    for (var i = 0; i < listadoProductos.length; i++)
                        lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                    
                    // Redondea a 2 decimales.
                    suma.innerHTML = `$ ${totalPagar.toFixed(2)} MXN`;
                }
            }

            function mostrarDias() {
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
                    boletoCompleto = parseInt(pase_completo.value, 10) || 0;
                
                var diasElegidos = [];
                if (boletosDia > 0) {
                    diasElegidos.push('viernes');
                    console.log(diasElegidos);
                }
                if (boletos2Dias > 0) {
                    diasElegidos.push('viernes', 'sabado');
                    console.log(diasElegidos);
                }
                if (boletoCompleto > 0) {
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                    console.log(diasElegidos);
                }

                for (let i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display = 'block';
                }
            }
        }
    }); // DOM CONTENT LOADED

})();

$(function() {

    // Lettering
    $('.nombre-sitio').lettering();

    // Menu fijo
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({'margin-top':barraAltura+'px'});
        }
        else {
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top':'0px'});
        }
    });
    
    // Menú responsivo
    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });

    // Programa de Conferencias
    $('.ocultar').hide();
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');
    $('.menu-programa a').on('click', function () {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    });

    // Animaciones para los números (pasando los 2300 px de scroll, se hace la animación)
    var stop = 0;
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 2300 && stop == 0) {
            $('.resumen-evento li:nth-child(1) p').animateNumber({number : 6}, 1200);
            $('.resumen-evento li:nth-child(2) p').animateNumber({number : 15}, 1200);
            $('.resumen-evento li:nth-child(3) p').animateNumber({number : 3}, 1250);
            $('.resumen-evento li:nth-child(4) p').animateNumber({number : 9}, 1500);
            stop++;
        }
    });

    // Cuenta regresiva para la fecha del evento
    $('.cuenta-regresiva').countdown('2020/06/18 11:00:00', function (event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

});