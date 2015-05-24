@extends('templates.facebook.base')


    @foreach($resolvedData as $album)
    <div class="{{ $class }}">
        <div class="cover_photos">

            @foreach($album['coverPhotos'] as $coverPhoto)
                <img src="{{ $coverPhoto }}" class="cover_photo" >
            @endforeach

        </div>

        <div>{{ $album['id'] }}</div>
        <div>{{ $album['name'] }}</div>

    </div>
    @endforeach
