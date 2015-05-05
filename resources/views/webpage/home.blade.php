@extends('webpage.layout')

@section('scripts')
<link rel="stylesheet" href="assets/js/owl.carousel/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/js/owl.carousel/owl-carousel/owl.theme.css">
<script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
<script src="assets/js/owl.carousel/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/owlCarouselLauncher.js"></script>
@endsection

@section('fb_init')
  <div id="fb-root"></div>
  <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '{{ getenv('FB_APP_ID') }}',
          xfbml      : true,
          version    : 'v2.3'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/es_LA/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection

@section('main')
  <main>
    <figure class="logo_header index small medium large text_center margin_zero">
      <img src="assets/images/logo_head.jpg" alt="Logo IBR Iglesia Bautista Resurrección">
    </figure>
    <span id="boton_oracion" class="boton fixed">
      <a href="oracion.html">
        <figure class="margin_zero">
          <img src="assets/images/or.png" width="54" height="151" border="0" alt="Oración" title="Oración" />
        </figure>
      </a>
    </span>
    <article id="main" class="flexbox justify_center wrap main">
      <section class="schedule flexbox column justify_center margin_zero">
        <div class="list_title">Horario</div>
        <ul class="list">
          <li class="list_item">10:00 - 10:30 Devocional</li>
          <li class="list_item">10:30 - 12:00 Escuela Dominical</li>
          <li class="list_item">12:00 - 14:00 Culto de Medio Día</li>
          <li class="list_item">18:00 - 19:00 Culto Vespertino</li>
          <li class="list_item">Mi 19:00 - 20:00 Culto de Oración</li>
        </ul>
      </section>
      <a href="calendario.html">
        <section class="events flexbox spc-arr">
          <figure class="icon_med">
            <img  src="assets/images/events.png" alt="Calendario">
          </figure>
          <p><strong>Conoce nuestras <br> novedades aqui</strong></p>
        </section>
      </a>
    <div id ="owl_carousel_container" class="owl-carousel margin_top">

      @foreach($posts_id as $post)
          <div class="fb-post" data-href="https://www.facebook.com/{{ $post[0] }}/posts/{{ $post[1] }}"></div>
      @endforeach

    </div>
    </article>
  </main>
@endsection
    