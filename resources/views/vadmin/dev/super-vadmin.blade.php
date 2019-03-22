@extends('vadmin.partials.main')

@section('title', 'Vadmin | Inicio')

@section('header_subtitle')
	Bienvenid@ <b>{{ Auth::user()->name }}</b>
@endsection

@section('styles')
@endsection

@section('content')
	<div class="dashboard">
		<div class="content-body">
			<section id="global-settings" class="card">
				<div class="card-header">
					<h4 class="card-title"><i class="icon-android-hand"></i> Bienvenido Super Admin</h4>
				</div>
				{{-- <div class="card-body collapse in">
					<div class="card-block">
						<div class="card-text">
							Este es un mensaje de los desarrolladores	
						</div>
					</div>
				</div> --}}
			</section>
        </div>
	</div>
	<div id="Error"></div>
@endsection



