@extends('vadmin.partials.main')
@section('title', 'Vadmin | Editar Cliente')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Usuarios</a></li>
            <li class="breadcrumb-item active">Edición de Usuario</li>
		@endslot
		@slot('actions')
			{{-- <h2>Editando cliente: " {{ $customer->name }} "</h2> --}}
		@endslot
	@endcomponent
@endsection

@section('content')
	{{-- {{dd($customer)}} --}}
	<div class="row">
		@component('vadmin.components.container')
			@slot('title', 'Editando a: '. $customer->name)
			@slot('content')
			{!! Form::model($customer, [
				'method' => 'PATCH',
				'url' => ['/vadmin/customers', $customer->id],
				'files' => true
			]) !!}
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
			{!! Form::close() !!}
			@endslot
		@endcomponent
	</div>

@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	@include('store.components.bladejs')
@endsection

@section('custom_js')
    <script>
        // Check for locality
        $(document).ready(function(){
            var actualGeoProv = "{{ $customer->geoprov_id }}";
            
            if(actualGeoProv != ''){
                getGeoLocs(actualGeoProv);
            }
            
            $('.GeoProvSelect').on('change', function(){
                let prov_id = $(this).val();
                getGeoLocs(prov_id);
            });
        });
	</script>
@endsection
