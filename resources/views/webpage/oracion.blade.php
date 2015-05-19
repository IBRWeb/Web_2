@extends('webpage.layout')

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
        <div class="main flexbox justify_center align_center">
            
            {!! Form::open(["url"=> "/oracion", "method" => "post", "class" => " form flexbox column justify_center"])!!}
                <h2>Peticiones de Oración</h2>
                <p class="description">Puedes mandar tus peticiones de oración por este medio sólo llena la información que se te pide y estaremos orando por este asunto.</p>
                 {!! Form::text("name", "", ["size"=>"20", "placeholder" => "Nombre", "required" => "true", "autocomplete" => "name"])  !!}
                 {!! Form::input("tel", 'phone', "", ["size"=>"20", "placeholder" => "Telefono", "autocomplete" => "tel", "id" => "phone"]); !!}
                 {!! Form::email("email", "", ["size"=>"20", "placeholder" => "E-mail", "required" => "true", "autocomplete" => "email"]); !!}
                 {!! Form::textarea("comments", "", ["cols" => "20", "rows" => "5", "placeholder" => "Peticiones", "required" => "true", "autocomplete" => "off"]) !!}
                <div class="flexbox align_center">
                     {!! Form::checkbox("visit", "true", []) !!}
                     {!! Form::label("visit", "Quiero recibir visitas por parte de la Iglesia")!!}
                </div>
                 {!! Form::text("street", "", ["size"=>"20", "placeholder" => "Calle y número", "autocomplete" => "street-address", "disabled" => "true", "class" => "visit_enable"]) !!}
                 {!! Form::text("town", "", ["size"=>"20", "placeholder" => "Municipio", "autocomplete" => "address-level1", "disabled" => "true", "class" => "visit_enable"]) !!}
                 {!! Form::text("state", "", ["size"=>"20", "placeholder" => "Estado", "autocomplete" => "address-level2", "disabled" => "true", "class" => "visit_enable"]) !!}
                 {!! Form::text("country", "", ["size"=>"20", "placeholder" => "Pais", "value" => "México", "autocomplete" => "country-name", "disabled" => "true", "class" => "visit_enable"]) !!}
                 {!! Form::submit("Enviar") !!}
            {!! Form::close() !!}

            <figure class="margin_zero img_side medium large hide">
                <img src="/assets/images/or_girl.png"/>
            </figure>
        </div>

@endsection