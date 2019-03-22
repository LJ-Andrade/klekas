@extends('vadmin.partials.main')

@section('title', 'Vadmin | Previsualización de Item')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('catalogo.index')}}">Listado de artículos</a></li>
            <li class="breadcrumb-item active">Previsualización del artículo<b></b></li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                </b><h1>{!! $article->name !!}</h1>
				<p class="text-muted">Código: #{!! $article->code !!} </p>
            @endslot
            @slot('content')
				<div class="row">
	
					<div class="col-md-12">
					@if(count($article->images) != 0 )
					<div class="actual-images horizontal-list">
						<h2>Imágenes del artículo</h2>
						<ul>
							@foreach($article->images->sortByDesc('featured') as $image)
							<li id="Img{{ $image->id }}" class="{{ $image->featured ? 'is-featured' : '' }}">	
								<img src="{{ asset('webimages/catalogo/thumbs/'.$image->name) }}">
								<div class="overlayItemCenter">
									<a> <i class="Delete-Product-Img icon-ios-trash-outline delete-img" data-imgid="{{ $image->id }}"></i></a>
									@if(!$image->featured)
									<a href="{{ url('vadmin/article/'.$article->id.'/images/setFeatured/'.$image->id) }}"><i class="icon-star"></i></a>
									@endif
								</div>
							</li>
							@endforeach
						</ul>
					</div>
					@else
						No hay imágenes cargadas
					@endif
					</div>
				</div>
				<hr class="softhr">
				<div class="row">
					<div class="col-md-3">
						<b>Descripción:</b> <p>{!! $article->description !!}</p>
					</div>
				</div>
				<hr class="softhr">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<h5>Minorístas</h5>
						<b>Precio:</b> <span class="custom-badge btnBlue"> $ {!! $article->price !!}</span> <br>
						<b>Descuento: </b>
						<span class="custom-badge btnRed">
							@if($article->discount == null || $article->discount == '0')
							Sin descuento						
							@else %  {{ $article->discount }}
							@endif
						</span><br>
						<b> Precio c/ Desc.: </b> <span class="custom-badge btnGreen"> $ {{ calcValuePercentNeg($article->price, $article->discount)}}</span>
					</div>
					<div class="col-md-3 col-sm-6">
						<h5>Mayorístas</h5>
						<b>Precio:</b> <span class="custom-badge btnBlue"> $ {!! $article->reseller_price !!}</span> <br>
						<b>Descuento: </b>
						<span class="custom-badge btnRed">
							@if($article->reseller_discount == null || $article->reseller_discount == '0')
							Sin descuento						
							@else %  {{ $article->reseller_discount }}
							@endif
						</span><br>
						<b> Precio c/ Desc.: </b> <span class="custom-badge btnGreen"> $ {{ calcValuePercentNeg($article->reseller_price, $article->reseller_discount)}}</span>
					</div>
					<div class="col-md-3 col-sm-6">
						<b>Stock:</b> {{ $article->stock }} <br>
						Stock mínimo: {{ $article->stockmin}}
					</div>
				</div>
				<hr class="softhr">
				<div class="row">
					<div class="col-md-3">
						<b>Color: </b> <span class="custom-badge btnBlue">{{ $article->color }}</span> |
						<b>Textil: </b> <span class="custom-badge btnBlue">{{ $article->textile }}</span> |	
						<b>Talles:</b>
						@foreach($article->atribute1 as $atribute1)
						<span class="custom-badge btnBlue">{!! $atribute1->name !!}</span>
						@endforeach <br>
					</div>
				</div>
				<hr class="softhr">
				<div class="row">
					<div class="col-md-12">
						<b>Categoría:</b> <span class="custom-badge btnBlue">@if($article->category){{ $article->category->name }}@else Sin Categoría @endif</span> |
						<b>Etiquetas:</b>
						@foreach($article->tags as $tag)
						<span class="custom-badge btnRed">{!! $tag->name !!}</span>
						@endforeach
					</div>
				</div>
				<hr class="softhr">
				<b>Url - Dirección web amigable (Slug):</b> <span class="badge">{!! $article->slug !!}</span>
				<hr class="softhr">
				<a href="{{ url('vadmin/catalogo/'.$article->id.'/edit') }}" class="btn btnGreen"><i class="icon-pencil2"></i> Editar Artículo</a> 
        	@endslot
        @endcomponent
    </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/jqueryFileUploader/jquery.fileuploader.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/vadmin-forms.js') }}" ></script>
	@include('vadmin.components.bladejs')
@endsection

@section('custom_js')
@endsection

