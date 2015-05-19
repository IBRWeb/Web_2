<!DOCTYPE html>
<html>
  <head lang="es">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/fonts/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/fonts/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/fonts/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/fonts/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/fonts/favicons/apple-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/fonts/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/fonts/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/fonts/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/fonts/favicons/apple-icon-76x76.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/fonts/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/fonts/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/fonts/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/fonts/favicons/favicon-96x96.png">
    <link rel="manifest" href="/assets/fonts/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/fonts/style.css">
    <meta charset="utf-8">
    <meta name="description" content="Somos una iglesia fundada en 1974, ubicada en el municipio de Tlalnepantla, Estado de México" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script type="text/javascript" src="/assets/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/assets/js/script.js"></script>
    
    
    @yield('scripts')

    @yield('title', '<title>Iglesia Bautista Resurrección</title>')

  </head>
  <body>

    @yield('fb_init')

    <header>
      <nav class="navigation"><div id="navigation_display" class="icon-menu"></div>
        <ul class="navigation_list">
          <a href="/" class="navigation_item"><li>Inicio</li></a>
          <a href="/historia" class="navigation_item"><li>Quienes Somos</li></a>
          <a href="/calendario" class="navigation_item"><li>Calendario</li></a>
          <a href="/devocional" class="navigation_item"><li>Devocional</li></a>
          <a href="/biblia" class="navigation_item"><li>Lee tu Biblia</li></a>
          <a href="/contacto" class="navigation_item"><li>Contacto</li></a>
        </ul>
      </nav>
      <h1 class="title hide">Iglesia Bautista Resurrección</h1>
    </header>

    <main>
   
      <span id="boton_oracion" class="boton fixed hide">
          <a href="/oracion">
              <figure class="margin_zero">
                  <img src="/assets/images/or.png" width="54" height="151" border="0" alt="Oración" title="Oración" />
              </figure>
        </a>
      </span>

    @yield('main')

    </main>

    <footer>
      <section class="flexbox justify_center padding_1.5/0.1">
        <article class="logo_footer hide">
          <figure class="margin_full flexbox">
            <img class="logo_img" src="/assets/images/logo_img_black.jpg" alt="Logo IBR Iglesia Bautista Resurrección">
            <img class="logo_name hide align_self_center" src="/assets/images/logo_name_black.jpg" alt="Logo IBR Iglesia Bautista Resurrección">
          </figure>
        </article>
        <section class="info flexbox column">
          <a href="https://www.google.com/maps/dir//Iglesia+Bautista+Resurrecci%C3%B3n,+A.R.,+Av+Convento+de+Santa+Monica+83,+Habitacional+Jardines+de+Santa+Monica,+54050+Tlalnepantla,+M%C3%A9x.,+Mexico/@19.5350507,-99.2268448,18z/data=!4m8!4m7!1m0!1m5!1m1!1s0x85d21d258129a3a1:0x6cf8b4b4b4f5e78b!2m2!1d-99.226227!2d19.534966">
            <section class="location flexbox justify_center margin_tb align_center">
              <figure class="icon_small margin_right margin_right extra">
                <img src="/assets/images/location.jpg" alt="Localización">
              </figure>
              <address class="margin_right">Convento de Santa Mónica #83 col. Jardines de Santa Mónica. Tlalnepantla, Estado de México. CP 54050</address>
            </section>
          </a>
          <section class="contact flexbox column medium justify_center">
            <article class="phone flexbox justify_center">
              <figure class="icon_small margin_zero">
                <img src="/assets/images/phone.jpg" alt="Teléfono" class="margin_right extra">
              </figure>
              <p class="margin">(55) 5398 8413</p>
            </article>
            <article class="social flexbox justify_center margin_tb align_center">
              <figure class="icon_small flexbox spc-arr margin_zero">
                <a href="http://www.facebook.com/pages/Iglesia-Bautista-Resurrecci%C3%B3n/215181911937130">
                  <img src="/assets/images/facebook.png" alt="Facebook IBR" class="margin_right extra">
                </a>
                <a href="https://twitter.com/ibresurreccion">
                  <img src="/assets/images/twitter.png" alt="Twitter IBR" class="margin_right extra">
                </a>
              </figure>
              <figure class="sponsor margin_zero">
                <img src="/assets/images/firm.png" alt="BeeNet">
              </figure>
            </article>
          </section>
        </section>
      </section>
      <section class="credits flexbox justify_center padding">
        <article class="credits text_center">
          <p>- @2015 Todos los derechos reservados -</p>
          <p>- Iglesia Bautista Resurrección A.R. -</p>
        </article>
      </section>
    </footer>
  </body>
</html>
