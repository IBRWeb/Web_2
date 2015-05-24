@extends('layout')

@section('title')
    <title>Peticiones de Oración</title>
@endsection

@section('scripts')
    <script type="text/javascript" src="/assets/js/form.js"></script>
@endsection

@section('main')

        <figure class="logo_header medium large text_center margin_zero">
            <img src="/assets/images/oracion.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
        </figure>
        <div class="main">
            <h2 class="subtitle">Peticiones de Oración</h2>
            <p class="form_description">Puedes mandar tus peticiones de oración por este medio sólo llena la información que se te pide y estaremos orando por este asunto.</p>
            <div class="flexbox spc_arr">
                {!! Form::open(["url"=> "/oracion", "method" => "post", "class" => "form", 'novalidate' => 'true'])!!}

                    {!! FormField::text('name') !!}
                    {!! FormField::input('tel', 'phone') !!}
                    {!! FormField::email('email') !!}
                    {!! FormField::textarea('petitions') !!}
                    {!! FormField::checkbox('visit', true) !!}
                    {!! FormField::text('street', null, ['class' => 'visit_enable', 'disabled']) !!}
                    {!! FormField::text('town', null, ['class' => 'visit_enable', 'disabled']) !!}
                    {!! FormField::select('state', null, ['class' => 'visit_enable', 'disabled'],['Estado de Mexico' => 'México', 'Distrito Federal' => 'D.F.'] ) !!}

                    {!! Form::submit('Enviar', ['class' => 'form_input']) !!}

                    {!! Form::close() !!}

                <figure class="margin_zero img_side medium large hide">
                    <img src="/assets/images/or_girl.png"/>
                </figure>
            </div>
        </div>

@endsection