@extends('vadmin.partials.main')
@section('title', 'VADmin | Nueva Categoría')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('cat_categorias.index')}}">Listado de categorías</a></li>
			<li class="breadcrumb-item active">Nueva categoría</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Nueva categoría</h1>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="row inner-wrapper">
		<div class="col-sm-12 col-md-6">
			{!! Form::open(['route' => 'cat_categorias.store', 'method' => 'POST', 'files' => true, 'class' => 'row big-form', 'data-parsley-validate' => '']) !!}	
				@include('vadmin.portfolio.categories.form')
				<div class="form-actions right">
					<a href="{{ route('cat_categorias.index')}}">
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
				Las <b>categorías</b> siven para organizar el contenido del catálogo. Permiten una mejor segmentación del contenido.
				Se utilizan palabras o frases para agrupar artículos de igual temática.
				Esto permitirá luego que los usuarios filtren los items en los buscadores de la web según sus preferencias. <br><br>
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
		$('.CatalogCategoriesLi').addClass('open');
		$('.CatalogCategoriesNew').addClass('active');
	</script>
@endsection


