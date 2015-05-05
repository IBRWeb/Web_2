@extends('webpage.layout')

@section('title')
    <title>Calendario</title>
@endsection

@section('main')
    <main>
        <figure class="logo_header medium large text_center margin_zero">
            <img src="assets/images/calendario.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
        </figure>
      <span id="boton_oracion" class="boton fixed hide">
        <a href="oracion">
            <figure class="margin_zero">
                <img src="assets/images/or.png" width="54" height="151" border="0" alt="Oración" title="Oración" />
            </figure>
        </a>
      </span>
        <div class="main flexbox justify_center">
            <iframe class="calendar mobile"src="https://www.google.com/calendar/embed?title=Iglesia%20Bautista%20Resurrecci%C3%B3n&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=600&amp;wkst=1&amp;hl=es&amp;bgcolor=%23ffffff&amp;src=info%40ibresurreccion.org.mx&amp;color=%232952A3&amp;src=es.mexican%23holiday%40group.v.calendar.google.com&amp;color=%23853104&amp;ctz=America%2FMexico_City" style=" border:solid 1px #777 " frameborder="0" scrolling="no"></iframe>
            <iframe class="calendar hide" src="https://www.google.com/calendar/embed?title=Iglesia%20Bautista%20Resurrecci%C3%B3n&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;hl=es&amp;bgcolor=%23ffffff&amp;src=info%40ibresurreccion.org.mx&amp;color=%232952A3&amp;src=es.mexican%23holiday%40group.v.calendar.google.com&amp;color=%23853104&amp;ctz=America%2FMexico_City" style=" border:solid 1px #777 " frameborder="0" scrolling="no"></iframe>
        </div>
    </main>
@endsection