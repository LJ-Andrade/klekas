@extends('store.partials.main')

@section('content')
<div class="container padding-bottom-3x">
	<div class="row centered-form">

		<form class="login-box inner" method="POST" action="{{ route('customer.login') }}">
			{{ csrf_field() }}
			<h3  class="text-center">Ingresar</h3>
			<fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }} position-relative has-icon-left mb-0">
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="icon-lock"></i></span>
					<input id="email" type="text" name="email" class="form-control round" placeholder="Ingrese su Email" value="{{ old('email') }}" required>
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</fieldset>
			<fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }} position-relative has-icon-left mb-0">
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="icon-lock"></i></span>
					<input id="password" type="password" name="password"  class="form-control round" placeholder="Ingrese su contraseña" required>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
				<button type="submit" class="btn btn-primary btn-block">
					<i class="icon-unlock2"></i> Conectar
				</button>
				<div class="row">
					<div class="col-sm-6 col-xs-12 text-xs-left text-md-left rememberme-box">
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
					</div>
					<div class="col-sm-6 col-xs-12 text-sm-right text-md-right">
						<a href="{{ route('customer.password.reset') }}">Olvidé mi contraseña</a>
					</div>
				</div>
			</fieldset>
			<div class="bottom-text">No tiene cuenta? | <a href="{{ route('customer.register') }}">Registrarme</a></div>
		</form>
	</div>
</div>
@endsection
    