@extends('store.partials.main')


@section('content')
	<!-- Page Content-->
	<div class="container">
		<div class="centered-notification">
			<div class="content">
				Su usuario está en proceso de revisión. <br>
				En cuanto sea aprobado será notificado vía e-mail.
			</div>
			<div class="bottom">
				Mientras tanto lo invitamos a <br>
				<a href="{{ url('tienda') }}" class="btn btn-outline-primary btn-sm"> Seguir viendo la tienda </a>
			</div>
		</div>
	</div>
	<div id="Error"></div>
@endsection
