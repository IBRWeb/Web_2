@extends('templates.facebook.base')

@section('head-links')
    <link rel="stylesheet" href="{{ asset('assets/css/facebook.css') }}"/>
    <script src="{{ asset('assets/js/galleryIndex.js') }}"></script>
@endsection


@for($index = ($data->currentPage()-1)*$data->perPage(); $index < $data->currentPage()*$data->perPage(); $index++)

        <div class="{{ $class }}">
            <a id="photos_container_link" href="{{ route('gallery.index', [ str_slug($data[$index]['name']), 'id' => $data[$index]['id']]) }}">
                <div class="album_cover_photos_container" id="photos_container" >
                    @foreach($data[$index]['coverPhotos'] as $coverPhoto)
                        <div class="album_cover_photo" id="photo">

                            @if($coverPhoto->height < $coverPhoto->width)
                                <img class="imgFitHeight album_cover_photo" id="photo" src="{{ $coverPhoto->source }}" >
                            @else
                                <img class="imgFitWidth album_cover_photo" id="photo" src="{{ $coverPhoto->source }}" >
                            @endif
                        </div>
                    @endforeach
                </div>
            </a>

            <h5 class="album_title">{{ $data[$index]['name'] }}</h5>

        </div>

@endfor
{!! $data->render() !!}

