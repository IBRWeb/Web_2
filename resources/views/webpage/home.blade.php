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
    <div id="main" class="main flexbox spc_arr">
        <div class="flexbox spc_arr wrap content">
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

            <section class="events">
              <a href="{{ url('calendario') }}">
                  <div class="flexbox spc_arr">
                      <figure class="icon_med">
                          <img  src="{{ asset('assets/images/events.png') }}" alt="Calendario">
                      </figure>
                      <p><strong>Conoce nuestras novedades aqui</strong></p>
                  </div>
              </a>
            </section>

            <section class="gallery_banner">
                <a href="{{ route('gallery.albums') }}">
                    <div class="banner">
                        <p>Conocenos</p>
                    </div>
                </a>
            </section>

            <div id ="owl_carousel_container" class="owl-carousel margin_top">

                {!! FacebookField::posts('posts', ['filter' => ['type' => 'status'], 'fields' => 'type', 'limit' => 10]) !!}

            </div>
        </div>
    </div>

@endsection
    