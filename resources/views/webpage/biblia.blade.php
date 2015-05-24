@extends('layout')

@section('title')
<title>Lee Tu Biblia</title>
@endsection

@section('main')

    <figure class="logo_header medium large text_center margin_zero">
        <img src="assets/images/lee.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
    </figure>
    <div class="main flexbox justify_center">
        <iframe class="bible_iframe" scrolling="auto" frameborder="0" width="100%" height="700px" allowtransparency="true"  name="youversion" src="https://www.bible.com/es/bible/149/gen.1.rvr1960"></iframe>​
    </div>

@endsection