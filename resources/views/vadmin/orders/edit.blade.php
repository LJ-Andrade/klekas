@extends('vadmin.partials.main')
@section('title', 'VADmin | Editar Pedido')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('orders.index')}}">Listado de pedidos</a></li>
			<li class="breadcrumb-item active">Editando pedido</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h2>Editando pedido #{{ $order->id }}</h2>
				{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')

	<div class="inner-wrapper">
		{!! Form::model($order, [
				'method' => 'PATCH',
				'url' => ['vadmin/order', $order->id],
				'files' => true,
				'class' => 'row big-form mw450', 
				'data-parsley-validate' => ''
			]) !!}
			@include('vadmin.orders.form')
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
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
@endsection

{{-- CUSTOM JS SCRIPTS--}}
@section('custom_js')
@endsection