@extends('store.partials.main')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row centered-form">
            <form class="login-box inner" style="padding-bottom: 25px" method="POST" action="{{ route('customer.password.email') }}">
                <h3  class="text-center">Recuperación de contraseña</h3>
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Ingrese su dirección E-Mail</label>
                    <input id="email" type="email" class="form-control round" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin: 0">
                        Enviar link de recuperación
                    </button>
                </div>
                <div class="help"><i class="fas fa-info-circle"></i> Se le enviará a la dirección de email con la que está registrad@. Luego deberá seguir los pasos y elegir una nueva contraseña </div>
            </form>
        </div>
    </div>
@endsection
    