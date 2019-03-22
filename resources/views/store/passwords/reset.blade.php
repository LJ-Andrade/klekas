@extends('store.partials.main')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container padding-bottom-3x">
        <div class="row centered-form">
            <form class="login-box inner form-horizontal" method="POST" action="{{ route('customer.password.reset') }}">
                <h3  class="text-center">Recuperación de contraseña</h3>
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label ">E-Mail</label>
                    <input id="email" type="email" class="form-control round" name="email" value="{{ $email or old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Nueva Contraseña</label>
                    <input id="password" type="password" class="form-control round" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="control-label">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" class="form-control round" name="password_confirmation" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block">
                        Restablecer Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
    
