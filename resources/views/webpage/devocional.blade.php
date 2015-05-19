@extends('webpage.layout')

@section('title')
	<title>Devocional</title>
@endsection


@section('main')
	
	<figure class="logo_header medium large text_center margin_zero">
        <img src="/assets/images/devocional.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
    </figure>

    <section class="main flexbox justify_center column">
        <div class="search">
            {!! Form::open(['url' => 'devocional', 'method' => 'get'] ) !!}
            {!! Form::text('title', null, ['class' => 'search_box', 'placeholder' => 'Buscar']) !!}
            {!! Form::button('', ['type' => 'submit', 'class' => 'submit_search icon-search']) !!}
            {!! Form::close() !!}
        </div>

		@foreach ($devotionalPosts as $devotionalPost)

			<article class="article flexbox align_center">
                <figure class="margin extra icon_large hide">
                    <img src="{{  $devotionalPost->image->path_to_file }}" />
                </figure>
                <div class="blog_post_preview">
					

					<a href="{{  route('devotionalPost', [$devotionalPost->slug, $devotionalPost->id]) }} " >
		                <div  class="flexbox flex_start align_center blog_post_title">
		                    <h3 id="blog_title">{{ $devotionalPost->title }}</h3>
		                </div>
			        </a>
	                <div id="blog_text">{!! str_limit($devotionalPost->content, 500, '...') !!} </div>
					<div class="tag_container flexbox wrap">
						@foreach($devotionalPost->tags as $tag)
						
						<a href="{{ route('tagPosts', [$tag->name]) }}" title="{{ $tag->name }}">
		                	<div class="tag">{{ $tag->name }}</div>
						</a>

	                	@endforeach
					</div>
	                <div class="author">Autor: {{ $devotionalPost->author }}</div>
                </div>
            </article>

		@endforeach
		
		{!! $devotionalPosts->render() !!}
	</section>

@endsection