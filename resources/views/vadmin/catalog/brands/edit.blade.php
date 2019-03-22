@extends('vadmin.partials.main')
@section('title', 'VADmin | Editar Color')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('cat_brands.index')}}">Listado de temporadas</a></li>
			<li class="breadcrumb-item active">Edición de color</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h2>Editando color: " {{ $item->name }} "</h2>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="row inner-wrapper">
		<div class="col-sm-12 col-md-6">
			{!! Form::model($item, [
					'method' => 'PATCH',
					'url' => ['vadmin/cat_brands', $item->id],
					'files' => true,
					'class' => 'row big-form', 
					'data-parsley-validate' => ''
				]) !!}
				@include('vadmin.catalog.brands.form')
				<div class="form-actions right">
					<a href="{{ route('cat_brands.index')}}">
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
				Las <b>temporadas</b> actuarán como filtros en el catálogo principal de la tienda<br><br>
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


