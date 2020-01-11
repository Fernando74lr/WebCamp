<?php include_once 'includes/templates/header.php'; ?>

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

<?php include_once 'includes/templates/footer.php'; ?>