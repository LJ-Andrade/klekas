
@extends('auth.app')
@section('content')
<section class="login-container">
    <div class="inner">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1"><img src="{{ asset('vadmin-ui/app-assets/images/logo/app-logo2.png') }}" alt="branding logo"></div>
                </div>
                {{--  <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2" style="margin-top: 0"><span>Ingreso al Sistema</span></h6>  --}}
            </div>
            <div class="card-body collapse in">
                <div class="container" style="text-align: center">Tienda</div>
                    <div class="card-block">
                        <form class="form-horizontal" method="POST" action="{{ route('customer.password.request') }}">
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Restablecer Contraseña
                            </button>
                        </div>
                    </form>


                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0">
                    </p>
                    <p class="float-sm-right text-xs-center m-0"> <a href="{{ route('customer.register') }}" class="card-link"><b>Registrarse</b></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
