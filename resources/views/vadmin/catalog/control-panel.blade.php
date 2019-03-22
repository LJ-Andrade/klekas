@extends('vadmin.partials.main')
@section('title', 'VADmin | Nuevo Artículo')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a>Tienda</a></li>
			<li class="breadcrumb-item active">Panel de Control</li>
		@endslot
		@slot('actions')
			<h1>Panel de Control de Tienda</h1>
			@endslot
		@endcomponent
@endsection
			
@section('content')
	<div class="inner-wrapper">
		<div class="row">
			<div class="col-md-4 card green-back">
				<div class="card-body">
					<div class="card-block">
						<div class="media">
							<div class="media-body white text-xs-left">
								<h3>{{ $activeCarts }}</h3>
								<span>Carros de Compra Activos</span>
							</div>
							<div class="media-right media-middle">
								<i class="icon-cart4 white font-large-2 float-xs-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  
@endsection

@section('scripts')
	@include('store.components.bladejs')
@endsection

@section('custom_js')
	<script>

	</script>
@endsection


