@extends('store.partials.main')

@section('content')
<div class="container padding-bottom-3x mb-2 marg-top-25">
	<div class="row centered-form">
		<div class="centered-notification">
			<div class="content">
				<h3>Gracias por registrarse !</h3>
				Como ha solicitado ser cliente mayorísta su usuario ha quedado en proceso de revisión. <br>
				En cuanto sea aprobado se lo notificaremos vía e-mail.
			</div>
			<div class="bottom">
				Mientras tanto lo invitamos a <br>
				<a href="{{ url('tienda') }}" class="btn btn-outline-primary btn-sm"> Seguir viendo la tienda </a>
			</div>
		</div>
	</div>
</div>
@endsection
    