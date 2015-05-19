@extends('webpage.layout')

@section('main')

	<figure class="logo_header medium large text_center margin_zero">
        <img src="/assets/images/devocional.png" alt="Logo IBR Iglesia Bautista Resurrección Calendario">
    </figure>

    <section class="main flexbox justify_center column">

		@foreach ($tag['0']->devotionalPosts as $devotionalPost)

			<article class="article flexbox align_center">
                <figure class="margin extra icon_large hide">
                    <img src="{{  $devotionalPost->image->path_to_file }}" />
                </figure>
                <div class="post_preview">
					

					<a href="{{  route('devotionalPost', [$devotionalPost->slug, $devotionalPost->id]) }} " >
		                <div  class="flexbox flex_start align_center post_title">
		                    <h3 id="blog_title">{{ $devotionalPost->title }}</h3>
		                </div>
			        </a>
	                <div id="blog_text">{!! str_limit($devotionalPost->content, 500, '...') !!} </div>
					<div class="tag_container flexbox wrap">
						
					</div>
	                <div class="author">Autor: {{ $devotionalPost->author }}</div>
                </div>
            </article>

		@endforeach
		
		{!! $tag->render() !!}
	</section>

@overwrite