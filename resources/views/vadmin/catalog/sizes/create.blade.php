@extends('vadmin.partials.main')
@section('title', 'VADmin | Nuevo Talle')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('cat_sizes.index')}}">Listado de talles</a></li>
			<li class="breadcrumb-item active">Nuevo talle</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Nuevo talle</h1>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="row inner-wrapper">
		<div class="col-sm-12 col-md-6">
			{!! Form::open(['route' => 'cat_sizes.store', 'method' => 'POST', 'class' => 'row big-form', 'data-parsley-validate' => '']) !!}	
				@include('vadmin.catalog.sizes.form')
				<div class="form-actions right">
					<a href="{{ route('cat_sizes.index')}}">
						<button type="button" class="btn btnRed mx-1">
							<i class="icon-cross2"></i>
						</button>
					</a>
					<button type="submit" class="btn btnGreen">
						<i class="icon-check2"></i> Guardar
					</button>
				</div>
			{!! Form::close() !!}
		</div>
		<div class="col-sm-12 col-md-6">
			@component('vadmin.components.infoContainer')
				@slot('text')
				Agregue los <b>talles</b> correspondientes. <br>
				Luego estarán disponibles como opción al momento de cargar artículos para el <b>catálogo</b><br>
				Estos atributos permitirán a los usuarios filtrar los artículos desde la tienda y facilitan a los administradores la carga de datos. 
				<br>
				@endslot
			@endcomponent
		</div>
	</div>  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	<script>
		allowEnterOnForms = true;
	</script>
@endsection
