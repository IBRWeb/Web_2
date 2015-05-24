@extends('layout')

@section('head-links')
    <link rel="stylesheet" href="{{ asset('assets/js/owl.carousel/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/owl.carousel/owl-carousel/owl.theme.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/owlCarouselLauncher.js') }}"></script>
@endsection

@section('main')

    <figure class="logo_header index small medium large text_center margin_zero">
        <img src="{{ asset('assets/images/logo_head.png') }}" alt="Logo IBR Iglesia Bautista Resurrección">
    </figure>
    <div id="main" class="flexbox justify_center wrap main">
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
        <a href="{{ url('calendario') }}">
          <section class="events flexbox spc-arr">
            <figure class="icon_med">
              <img  src="{{ asset('assets/images/events.png') }}" alt="Calendario">
          </figure>
            <p><strong>Conoce nuestras novedades aqui</strong></p>
        </section>
      </a>
        <div id ="owl_carousel_container" class="owl-carousel margin_top">

            {!! FacebookField::posts() !!}

        </div>
    </div>

@endsection
    