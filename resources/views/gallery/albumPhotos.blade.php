@extends('layout')

@section('main')
    <figure class="logo_header index small medium large text_center margin_zero">
        <img src="{{ asset('assets/images/logo_head.png') }}" alt="Logo IBR Iglesia Bautista Resurrección">
    </figure>

    <div class="main flexbox spc_arr">
        <div class="content flexbox spc_arr wrap">

            {{ FacebookField::albumPhotos($albumId, ['fields' => 'images', 'limit' => '50']) }}

        </div>
    </div>

@endsection