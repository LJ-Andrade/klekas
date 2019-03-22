@extends('vadmin.partials.main')
@section('title', 'VADmin | Nuevo Coupon')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('categories.index')}}">Listado de cupones</a></li>
			<li class="breadcrumb-item active">Nuevo cupón</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Nuevo cupón</h1>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="row inner-wrapper">
		<div class="col-sm-12 col-md-6">
			{!! Form::open(['route' => 'coupons.store', 'method' => 'POST', 'class' => 'row big-form', 'data-parsley-validate' => '']) !!}	
				@include('vadmin.catalog.coupons.form')
				<div class="form-actions right">
					<a href="{{ route('coupons.index')}}">
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
					<b>Los cupones</b> sirven para proporcionar ofertas especiales dentro de un período de tiempo. Los mismos llevan un código promocional que
					el cliente podrá ingresar en la instancia del final de compra (Checkout). <br>
					El descuento proporcionado por el cupón es apilable al descuento que tenga el producto.<br><br>
					<b>Generación de código:</b> El código puede ser generado a mano pero tambien el sistema le da la posibilidad de generar uno 
					aleatorio haciendo click en el
					botón "Generar Código". El código que se generará contará de 3 letras y 3 numeros.
				@endslot
			@endcomponent
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	@include('vadmin.components.bladejs')
@endsection

