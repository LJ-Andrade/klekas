@extends('vadmin.partials.main')

@section('title', 'Vadmin | Creación de Cliente')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customers.index')}}">Listado de Clientes</a></li>
            <li class="breadcrumb-item active">Nuevo Cliente</li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
	@component('vadmin.components.container')
		@slot('title', 'Creación de Cliente')
		@slot('content')
		<form class="form" method="POST" action="{{ route('customers.store') }}">
			{{ csrf_field() }}
			@include('vadmin.customers.form')
			<div class="form-actions right">
				<a href="{{ route('customers.index')}}">
					<button type="button" class="btn btnRed">
						<i class="icon-cross2"></i> Cancelar
					</button>
				</a>
				<button type="submit" class="btn btnGreen">
					<i class="icon-check2"></i> Guardar
				</button>
			</div>
		</form>
		@endslot
	@endcomponent
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	@include('vadmin.components.bladejs')
@endsection

@section('custom_js')
    <script>
        // Check for locality
		let prov =  $('.GeoProvSelect');
        $(document).ready(function(){            
            prov.on('change', function(){
                let prov_id = $(this).val();
                getGeoLocs(prov_id);
            });
        });
	</script>
@endsection
