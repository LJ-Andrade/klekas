@extends('vadmin.partials.main')
@section('title', 'Vadmin | Editar Usuario')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Usuarios</a></li>
            <li class="breadcrumb-item active">Edición de Usuario</li>
		@endslot
		@slot('actions')
			<h2>Editando usuario: " {{ $user->name }} "</h2>
		@endslot
	@endcomponent
@endsection

@section('content')

	<div class="row">
		@component('vadmin.components.container')
			@slot('title', $user->name)
			@slot('content')
				<div class="form-body">
					{!! Form::model($user, ['method' => 'PATCH', 'url' => ['/vadmin/users', $user->id], 'files' => true]) !!}
						{{ csrf_field() }}
						<div class="row">
							@include('vadmin.users.form')
						</div>
						<div class="row">
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