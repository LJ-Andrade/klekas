@extends('layouts.vadmin.main')
@section('title', 'VADmin | Editar Categoría')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('portfolio.index')}}">Listado de Categorías</a></li>
			<li class="breadcrumb-item active">Edición de Categoría</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h2>Editando categoría: " {{ $category->name }} "</h2>
				{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')

	<div class="inner-wrapper">
		{!! Form::model($category, [
				'method' => 'PATCH',
				'url' => ['vadmin/categories', $category->id],
				'files' => true,
				'class' => 'row big-form mw450', 
				'data-parsley-validate' => ''
			]) !!}
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
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
@endsection

@section('custom_js')
	<script>
		$('.PortfolioLi').addClass('open');
		$('.PortfolioCategoriesLi').addClass('open');
	</script>
@endsection


