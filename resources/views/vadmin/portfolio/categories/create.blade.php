@extends('layouts.vadmin.main')
@section('title', 'VADmin | Nueva Categoría')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('categories.index')}}">Listado de Categorías</a></li>
			<li class="breadcrumb-item active">Nueva Categoría</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Creación de Nueva Categoría</h1>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="inner-wrapper">
		<div class="row">
			<div class="col-md-5">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'files' => true, 'class' => 'row big-form mw450', 'data-parsley-validate' => '']) !!}	
					@include('vadmin.portfolio.categories.form')
					<div class="form-actions right">
						<a href="{{ route('categories.index')}}">
							<button type="button" class="btn btnRed">
								<i class="icon-cross2"></i> Cancelar
							</button>
						</a>
						<button type="submit" class="btn btnGreen">
							<i class="icon-check2"></i> Guardar
						</button>
					</div>
				{!! Form::close() !!}
			</div>
			<div class="col-md-7">
				@component('vadmin.components.infoContainer')
					@slot('text')
					Las <b>categorías</b> siven para organizar el contenido del portfolio. Permiten una mejor segmentación del contenido.
					Se utilizan palabras o frases para agrupar artículos de igual temática.
					Esto permitirá luego que los usuarios filtren los items en los buscadores de la web según sus preferencias. <br><br>
					<b>Ejemplos de categorías:</b> Vestidos, Pantalones, Remeras, Medias, Camperas, etc. 
					@endslot
				@endcomponent
			</div>
		</div>
	</div>  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
@endsection

@section('custom_js')
	<script>
		$('.PortfolioCategoriesLi').addClass('open');
		$('.PortfolioCategoriesNew').addClass('active');
	</script>
@endsection


