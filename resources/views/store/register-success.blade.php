@extends('store.partials.main')

@section('content')
<div class="container padding-bottom-3x mb-2 marg-top-25">
	<div class="row centered-form">
		<div class="centered-notification">
			<div class="content">
				<h3>Gracias por registrarte !</h3>
				<p style="font-size: 1rem; font-weight: 300">Ya podés empezar a comprar.</p>
				<a href="{{ url('tienda') }}" class="btn btn-primary btn-sm"> Ir a la tienda </a>
			</div>
			<div class="bottom">
			</div>
		</div>
	</div>
</div>
@endsection
    