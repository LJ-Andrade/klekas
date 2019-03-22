@extends('vadmin.partials.main')
@section('title', 'VADmin | Nueva etiqueta')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('cat_tags.index')}}">Listado de etiquetas</a></li>
			<li class="breadcrumb-item active">Nueva etiqueta</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Nueva Etiqueta</h1>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="row inner-wrapper">
		<div class="col-sm-12 col-md-6">
			{!! Form::open(['route' => 'cat_tags.store', 'method' => 'POST', 'files' => true, 'class' => 'row big-form', 'data-parsley-validate' => '']) !!}	
				@include('vadmin.catalog.tags.form')
				<div class="form-actions right">
					<a href="{{ route('cat_tags.index')}}">
						<button type="button" class="btn btnRed mx-1">
							<i class="icon-cross2"></i> 
						</button>
					</a>
					<button type="submit" class="btn btnGreen">
						<i class="icon-check2"></i> Guardar
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		<div class="col-sm-12 col-md-6">
			@component('vadmin.components.infoContainer')
				@slot('text')
				Las <b>etiquetas</b> (o tags) son palabras claves que permiten agrupar items con una característica particular.
				Estas pueden ser compartidas entre items que pertenezcan a distintas categorías.
				Luego permitirá a los usuarios que filtren los items en los buscadores de la web según sus preferencias. <br><br>
				@endslot
			@endcomponent
		</div>	
	</div>  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
@endsection

@section('custom_js')
	<script>
		$('.CatalogTagsLi').addClass('open');
		$('.CatalogTagsNew').addClass('active');
	</script>
@endsection


