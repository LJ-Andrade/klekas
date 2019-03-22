@extends('vadmin.partials.main')
@section('title', 'Vadmin | Creación de Usuario')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Listado de Usuarios</a></li>
            <li class="breadcrumb-item active">Nuevo Usuario</li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
		<div class="row">
		@component('vadmin.components.container')
			@slot('title', 'Creación de Usuario')
			@slot('content')
			<div class="form-body">
				{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => true]) !!}
					{{ csrf_field() }}
					<div class="row">
						@include('vadmin.users.form')
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								{!! Form::label('password', 'Contraseña') !!}
								{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña', 'required' => '']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('password_confirmation', 'Confirme la contraseña') !!}
								{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirme la contraseña', 'required' => '']) !!}
							</div>
						</div>
					</div>
					<div class="form-actions right">
						<a href="{{ route('users.index')}}">
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
			@endslot
		@endcomponent
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	@include('vadmin.components.bladejs')
@endsection