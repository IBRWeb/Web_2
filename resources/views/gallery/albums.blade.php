@extends('layout')

@section('main')
<div class="main flexbox wrap">
    {!! FacebookField::albums(['limit' => 'null', 'fields' => 'name,photos.limit(5){images}', 'filter' => ['type' => 'normal']]) !!}
</div>

@endsection