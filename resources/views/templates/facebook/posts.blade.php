@extends('templates.facebook.base')

@section('content')

    @foreach($data as $id)

    <div class="{{ $class }}" data-href="https://www.facebook.com/{{ $id[0] }}/posts/{{ $id[1] }}" data-width="730"></div>

    @endforeach

@endsection