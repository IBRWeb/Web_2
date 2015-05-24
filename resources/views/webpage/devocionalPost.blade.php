@extends('layout')

@section('title')
    <title>{{ $post->title }}</title>
@endsection

@section('main')
    
        <figure class="logo_header medium large text_center margin_zero">
            <img src="/assets/images/devocional.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
        </figure>
        <div class="main blog">
            <section class="blog_post flexbox wrap flex_start" id="blog">
                <article class="article">
                    <div  class="blog_post_title">
                        <figure class="margin extra">
                            <img src="{{ $post->image->path_to_file }}"/>
                        </figure>
                        <h1 id="blog_title">{{ $post->title }}</h1>
                    </div>
                    <div id="blog_text">{!! $post->content !!}</div>
                </article>
            </section>
            <section>
                <h3 class="blog_post_title">Related Posts:</h3>
                <div class="blog_side_bar">

                    @foreach($relatedPosts as $relatedPost)

                        <article>
                            <figure class="blog_side_bar_image">
                                <img src="{{ $relatedPost -> image -> path_to_file }}">
                            </figure>
                            <a href="{{ route('devotionalPost', [$relatedPost -> slug, $relatedPost -> id]) }}" ><p>{{ $relatedPost -> title }}</p></a>
                        </article>

                    @endforeach

                </div>
            </section>
        </div>
@endsection