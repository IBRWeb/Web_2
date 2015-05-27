@extends('layout')

@section('main')
    <figure class="logo_header index small medium large text_center margin_zero">
        <img src="{{ asset('assets/images/logo_head.png') }}" alt="Logo IBR Iglesia Bautista Resurrección">
    </figure>

    <div class="main flexbox spc_arr">
        <div class="content flexbox wrap spc_arr">

            {!! FacebookField::albums('albums', ['fields' => ['name', 'photos' => ['limit' => 5, 'images']], 'filter' => ['type' => 'normal']]) !!}

        </div>
    </div>

@endsection