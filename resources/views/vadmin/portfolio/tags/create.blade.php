@extends('layouts.vadmin.main')
@section('title', 'VADmin | Nueva etiqueta')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('categories.index')}}">Etiquetas del Portfolio</a></li>
			<li class="breadcrumb-item active">Nueva Etiqueta</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Nueva Etiqueta de Portfolio</h1>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="inner-wrapper">
		<div class="row">
			<div class="col-md-5">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST', 'files' => true, 'class' => 'row big-form mw450', 'data-parsley-validate' => '']) !!}	
					@include('vadmin.portfolio.tags.form')
					<div class="form-actions right">
						<a href="{{ route('tags.index')}}">
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
			<div class="col-md-7 pad0765">
				@component('vadmin.components.infoContainer')
					@slot('text')
					Las <b>etiquetas</b> (o tags) son palabras claves que permiten agrupar artículos con una característica particular.
					Estas pueden ser compartidas entre artículos que pertenezcan a distintas categorías.
					Luego permitirá a los usuarios que filtren los items en los buscadores de la web según sus preferencias. <br><br>
					<b>Ejemplos de etiquetas:</b> Rojo, Verde, Largo, Corto, Con Costuras, Sin Costuras, En Oferta, Liquidación, etc. 
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

{{-- CUSTOM JS SCRIPTS--}}
@section('custom_js')
	<script>
		$('.PortfolioTagsLi').addClass('open');
		$('.PortfolioTagsNew').addClass('active');
	</script>
@endsection


