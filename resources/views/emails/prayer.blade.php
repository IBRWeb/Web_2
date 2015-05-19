@extends('emails.layout')

@section('main')

    <figure class="logo_header index small medium large text_center margin_zero">
        <img src="{{  url('assets/images/logo_head.png') }}" />
    </figure>

    <div class="main flexbox spc_arr align_center">
        <div class="side_bar">
            <h2>Hemos recibido tu información</h2>
            <p>Nombre</p>
            <p>Muchas gracias por compartir con nostros tus motivos de oración, como iglesia estaremos orando por ti<br>
                <strong>Que Dios te bendiga</strong></p>
            <p>Esta es la información que recibimos: <br/> (cualquier duda o aclaración háznoslo saber <a class="text_decoration" href="{{url('contacto')}}">aqui)</a></p>

            <ul>
                <li>Nombre :{{ $name }}</li>

                @if(isset($phone))
                    <li>Telefono: {{  $phone }}</li>
                @endif

                <li>Peticiones: {{ $comments }}</li>

                @if(isset($visit))
                    <li>Direccion: {{ "$street, $town, $state, $country" }}</li>
                @endif

            </ul>
        </div>
        <figure class="margin_zero img_side medium large hide">
            <img src="/assets/images/or_girl.png"/>
        </figure>
    </div>

@endsection


