@extends('webpage.layout')

@section('title')
    <title>Contacto</title>
@endsection


@section('main')

        <figure class="logo_header medium large text_center margin_zero">
            <img src="assets/images/contact.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
        </figure>
        <div class="main flexbox justify_center align_center">
            <form class="form flexbox column justify_center" action="php/contacto.php" enctype="multipart/form-data" method="post">
                <input size="20" placeholder="Nombre" required name="nombre" type="text" id="nombre" />
                <input size="20" placeholder="E-mail" name="correo" type="email" id="correo" />
                <textarea cols="20" rows="5" placeholder="Comentarios" required name="comentarios" type="text" id="comentarios"></textarea>
                <input type="submit" value="Enviar" />
            </form>
            <div class="map">
                <iframe class="hide medium" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3760.1970136503787!2d-99.22692973877287!3d19.53315354671283!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d21d258129a3a1%3A0x6cf8b4b4b4f5e78b!2sIglesia+Bautista+Resurrecci%C3%B3n%2C+A.R.!5e0!3m2!1sen!2smx!4v1429552303031" width="400" height="300" frameborder="0" style="border:0"></iframe>
            </div>
        </div>

@endsection