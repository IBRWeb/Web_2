@extends('templates.facebook.base')

@section('head-links')
    <link rel="stylesheet" href="{{ asset('assets/css/facebook.css') }}"/>
    <script src="{{ asset('assets/js/galleryIndex.js') }}"></script>
@endsection



    @foreach($resolvedData as $album)
    <div class="{{ $class }}">
        <a id="photos_container_link" href="{{ route('gallery.albums.photos.index', [ str_slug($album['name']), $album['id']]) }}">
            <div class="album_cover_photos_container" id="photos_container" >
                @foreach($album['coverPhotos'] as $coverPhoto)
                    <div class="album_cover_photo" id="photo">

                        @if($coverPhoto->height < $coverPhoto->width)
                            <img class="imgFitHeight" id="photo" src="{{ $coverPhoto->source }}" class="album_cover_photo" >
                        @else
                            <img class="imgFitWidth" id="photo" src="{{ $coverPhoto->source }}" class="album_cover_photo" >
                        @endif
                    </div>
                @endforeach
            </div>
        </a>

        <h5 class="album_title">{{ $album['name'] }}</h5>

    </div>
    @endforeach
