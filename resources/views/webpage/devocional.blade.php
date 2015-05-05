@extends('webpage.layout')

@section('title')
    <title>{{ $title or 'Devocional' }}</title>
@endsection

@section('main')
    <main>
        <figure class="logo_header medium large text_center margin_zero">
            <img src="assets/images/devocional.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
        </figure>
      <span id="boton_oracion" class="boton fixed hide">
        <a href="oracion">
            <figure class="margin_zero">
                <img src="assets/images/or.png" width="54" height="151" border="0" alt="Oración" title="Oración" />
            </figure>
        </a>
      </span>
        <div class="main flexbox column justify_center align_center">
            <section class="post flexbox wrap flex_start" id="blog">
                <article class="article">
                    <div  class="flexbox flex_start align_center post_title">
                        <figure class="margin extra">
                            <img src="assets/images/logo_img_black.jpg" height="46" />
                        </figure>
                        <h3 id="blog_title"></h3>
                    </div>
                    <div id="blog_text"></div>
                </article>
                <section class="article">
                    <h3>POSTS ANTERIORES:</h3>
                    <ul id="post_list"></ul>
                </section>
            </section>
        </div>
    </main>
@endsection