<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="$"><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="clearfix">
            <p class="fecha"> <i class="fas fa-calendar-alt"></i> 10-12, Dic</p>
            <p class="ciudad"> <i class="fas fa-map-marker-alt"></i> Puebla, MX</p>
          </div>
          <h1 class="nombre-sitio">PueWebCamp</h1>
          <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
        </div><!--.informacion-evento-->
      </div><!--.contenido-header-->
    </div><!--.hero-->
  </header>

  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.html"><img src="img/logo.svg" alt="logo puewebcamp"></a>
      </div><!--.contenedor-->
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div><!--.menu-movil-->
      <nav class="navegacion-principal clearfix">
        <a href="conferencia.html">Conferencia</a>
        <a href="#">Calendario</a>
        <a href="#">Invitados</a>
        <a href="registro.html">Reservaciones</a>
      </nav><!--.navegacion-principal-->
    </div><!--.contenedor-->
  </div><!--.barra-->

  <section class="seccion contenedor">
    <h2>
      La mejor conferencia de diseño web en español
    </h2>
    <p>
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate ipsum harum explicabo consectetur, id necessitatibus possimus placeat quidem numquam accusamus nesciunt veritatis laboriosam officia quos non qui autem mollitia labore.
    </p>
  </section><!--.seccion contenedor-->

  <section class="programa">
    <div class="contenedor-video">
      <video loop autoplay poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">
      </video>
    </div><!--.contenedor-video-->
    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del evento</h2>
          <nav class="menu-programa">
            <a href="#talleres"><i class="fas fa-code" aria-hidden="true"></i> Talleres </a>
            <a href="#conferencias"><i class="fas fa-comment" aria-hidden="true"></i> Conferencias </a>
            <a href="#seminarios"><i class="fas fa-university" aria-hidden="true"></i> Seminarios</a>
          </nav><!--.menu-programa-->

          <div id="talleres" class="info-curso ocultar clearfix ">
            <div class="detalle-evento">
              <h3>HTML5, CSS3, JavaScript</h3>
              <p><i class="fas fa-clock" aria-hidden="true"></i> 16:00 hrs</p>
              <p><i class="fas fa-calendar" aria-hidden="true"></i> 10 de Dic</p>
              <p><i class="fas fa-user" aria-hidden="true"></i> Fernando López Ramírez</p>
            </div><!--.detalle-evento-->
            <div class="detalle-evento">
              <h3>Responsive Web Design</h3>
              <p><i class="fas fa-clock" aria-hidden="true"></i> 20:00 hrs</p>
              <p><i class="fas fa-calendar" aria-hidden="true"></i> 10 de Dic</p>
              <p><i class="fas fa-user" aria-hidden="true"></i> Fernando López Ramírez</p>
            </div><!--.detalle-evento-->
            <a href="#" class="button float-right">Ver todos</a>
          </div><!--.info-curso-->


            <div id="conferencias" class="info-curso ocultar clearfix ">
              <div class="detalle-evento">
                <h3>Cómo ser FreeLancer</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i> 10:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i> 10 de Dic</p>
                <p><i class="fas fa-user" aria-hidden="true"></i>Gregorio Sánchez</p>
              </div><!--.detalle-evento-->
              <div class="detalle-evento">
                <h3>Tecnologías del Futuro</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i> 17:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i> 10 de Dic</p>
                <p><i class="fas fa-user" aria-hidden="true"></i> Susan Sánchez</p>
              </div><!--.detalle-evento-->
              <a href="#" class="button float-right">Ver todos</a>
            </div><!--.info-curso-->

            <div id="seminarios" class="info-curso ocultar clearfix ">
              <div class="detalle-evento">
                <h3>Diseño UI/UX para móviles</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i> 17:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i> 11 de Dic</p>
                <p><i class="fas fa-user" aria-hidden="true"></i> Harold García</p>
              </div><!--.detalle-evento-->
              <div class="detalle-evento">
                <h3>Aprende a programar en una mañana</h3>
                <p><i class="fas fa-clock" aria-hidden="true"></i> 10:00 hrs</p>
                <p><i class="fas fa-calendar" aria-hidden="true"></i> 11 de Dic</p>
                <p><i class="fas fa-user" aria-hidden="true"></i> Susana Rivera</p>
              </div><!--.detalle-evento-->
              <a href="#" class="button float-right">Ver todos</a>
            </div><!--.info-curso-->
        </div><!--.programa-evento-->
      </div><!--.contenedor-->
    </div><!--.contenido-programa-->
  </section><!--.programa-->

  <section class="invitados contenedor seccion">
    <h2>Nuestros Invitados</h2>
    <ul class="lista-invitados clearfix">
      <li>
        <div class="invitado">
          <img src="img/invitado1.jpg" alt="imagen invitado 1">
          <p>Rafael Bautista</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado2.jpg" alt="imagen invitado 2">
          <p>Shari Herrera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado3.jpg" alt="imagen invitado 3">
          <p>Gregorio Sánchez</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado4.jpg" alt="imagen invitado 4">
          <p>Susana Rivera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado5.jpg" alt="imagen invitado 5">
          <p>Harold García</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado6.jpg" alt="imagen invitado 6">
          <p>Susan Sánchez</p>
        </div>
      </li>
    </ul>
  </section><!--.invitados-->

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero"></p> Invitados</li>
        <li><p class="numero"></p> Talleres</li>
        <li><p class="numero"></p> Días</li>
        <li><p class="numero"></p> Conferencias</li>
      </ul>
    </div>
  </div>

  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por día</h3>
            <p class="numero">$30</p>
            <ul>
              <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
              <li><i class="fas fa-check"></i> Todas las conferencias</li>
              <li><i class="fas fa-check"></i> Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Todos los días</h3>
            <p class="numero">$50</p>
            <ul>
              <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
              <li><i class="fas fa-check"></i> Todas las conferencias</li>
              <li><i class="fas fa-check"></i> Todos los talleres</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 días</h3>
            <p class="numero">$45</p>
            <ul>
              <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
              <li><i class="fas fa-check"></i> Todas las conferencias</li>
              <li><i class="fas fa-check"></i> Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <div id="mapa" class="mapa"></div>

  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, culpa quibusdam placeat aspernatur corporis sit minima laudantium deleniti doloribus.
          </p>
          <footer  class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!--.testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, culpa quibusdam placeat aspernatur corporis sit minima laudantium deleniti doloribus.
          </p>
          <footer  class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!--.testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus, culpa quibusdam placeat aspernatur corporis sit minima laudantium deleniti doloribus.
            </p>
            <footer  class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial">
              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div><!--.testimonial-->
    </div>
  </section>

  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Regístrate en newsletter:</p>
      <h3>Puewebcamp</h3>
      <a href="#" class="button transparente">Registro</a>
    </div><!--.contenido-->
  </div><!--.newsletter-->

  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul class="clearfix">
        <li><p id="dias" class="numero"></p> días</li>
        <li><p id="horas" class="numero"></p> horas</li>
        <li><p id="minutos" class="numero"></p> minutos</li>
        <li><p id="segundos" class="numero"></p> segundos</li>
      </ul>
    </div><!--.contenedor-->
  </section>

  <footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>Sobre <span>puewebcamp</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil iste possimus illum. Consequatur magni odit animi necessitatibus dolorem vero corporis repellendus magnam non maiores. Veritatis odit exercitationem voluptatum minus inventore.</p>
      </div>
      <div class="ultimos-tweets">
          <h3>Últimos <span>tweets</span></h3>
          <ul>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil iste possimus illum.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil iste possimus illum.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil iste possimus illum.</li>
          </ul>
      </div>
      <div class="menu">
          <h3>Redes <span>sociales</span></h3>
          <nav class="redes-sociales">
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="$"><i class="fab fa-instagram"></i></a>
          </nav>
      </div>
    </div>

    <p class="copyright">
      Todos los derechos reservados PUEWEBCAMP 2018.
    </p>

  </footer>


  <!-- Add your site or application content here -->
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
