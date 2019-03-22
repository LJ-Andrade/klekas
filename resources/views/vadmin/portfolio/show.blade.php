@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Previsualización de Artículo')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('portfolio.index')}}">Artículos</a></li>
            <li class="breadcrumb-item active">Previsualización del artículo <b></b></li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                 <h1>{!! $article->title !!}</h1>
            @endslot
            @slot('content')
            	<p>{!! $article->content !!}</p>
				<div class="actual-images  horizontal-list">
					<ul>
					@foreach($article->images as $image)
						<li id="Img{{ $image->id }}">
							<img src="{{ asset('webimages/portfolio/'.$image->name ) }}" class="img-responsive img-article" style="max-width: 200px">
							<div class="overlayItemCenter">
								<i class="Delete-Porfolio-Img icon-ios-trash-outline delete-img" data-imgid="{{ $image->id }}"></i>
							</div>
						</li>
					@endforeach
					</ul>
				</div>
				<hr class="softhr">
				Slug: <span class="badge">{!! $article->slug !!}</span>
				<hr class="softhr">
				Categoría: <span class="badge">{!! $article->category->name !!}</span>
				<hr class="softhr">
				Tags:
				@foreach($article->tags as $tag)
					<span class="badge">{!! $tag->name !!}</span>
				@endforeach
				<br><br>
				<a href="{{ url('vadmin/portfolio/'.$article->id.'/edit') }}" class="btn btnGreen"><i class="icon-pencil2"></i> Editar Artículo</a> 
            @endslot
        @endcomponent
    </div>
@endsection

@section('scripts')
	@include('vadmin.components.bladejs')
@endsection

@section('custom_js')
@endsection

