@extends('webpage.layout')

@section('title')
    <title>Peticiones de Oración</title>
@endsection

@section('main')
    <main>
        <figure class="logo_header medium large text_center margin_zero">
            <img src="assets/images/oracion.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
        </figure>
        <div class="main flexbox justify_center align_center">
            <form class="form flexbox column justify center" action="php/contacto2.php" enctype="multipart/form-data" method="post">
                <h2>Peticiones de Oración</h2>
                <p class="description">Puedes mandar tus peticiones de oración por este medio sólo llena la información que se te pide y estaremos orando por este asunto.</p>
                <input size="20" placeholder="Nombre" required name="nombre" type="text" id="nombre" />
                <input size="20" placeholder="Telefono" name="telefono" type="tel" id="correo" />
                <input size="20" placeholder="E-mail" name="correo" type="email" id="correo" />
                <textarea cols="20" rows="5" placeholder="Comentarios" required name="comentarios" type="text" id="comentarios"></textarea>
                <input type="submit" value="Enviar" />
            </form>
            <figure class="margin_zero img_side medium large hide">
                <img src="assets/images/or_girl.png"/>
            </figure>
        </div>
    </main>
@endsection