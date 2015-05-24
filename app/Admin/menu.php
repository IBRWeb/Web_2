<?php

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');

Admin::menu('\App\User')->label('Usuarios')->icon('fa-user');
Admin::menu('\App\Pray')->label('Oraciones')->icon('fa-tasks');
Admin::menu('\App\DevotionalPost')->label('Devocionales')->icon('fa-file-text');
Admin::menu('\App\Tag')->label('Tags')->icon('fa-tag');
Admin::menu('\App\Image')->label('Imagenes')->icon('fa-image');

Admin::menu()->label('Opciones Avanzadas')->icon('fa-cogs')->items(function()
{
    Admin::menu('\App\Administrator')->label('Administradores')->icon('fa-users');
    Admin::menu()->url('artisan')->label('Comandos Artisan')->icon('fa-terminal');

});

