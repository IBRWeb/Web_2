@extends('webpage.layout')

@section('title')
<title>Lee Tu Biblia</title>
@endsection

@section('main')
<main>
    <figure class="logo_header medium large text_center margin_zero">
        <img src="assets/images/lee.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
    </figure>
      <span id="boton_oracion" class="boton fixed hide">
        <a href="oracion">
            <figure class="margin_zero">
                <img src="assets/images/or.png" width="54" height="151" border="0" alt="Oración" title="Oración" />
            </figure>
        </a>
      </span>
    <div class="main flexbox justify_center">
        <iframe class="bible_iframe" scrolling="auto" frameborder="0" width="100%" height="700px" allowtransparency="true"  name="youversion" src="https://www.bible.com/es/bible/149/gen.1.rvr1960"></iframe>​
    </div>
</main>
@endsection