@extends('auth.app')

@section('content')
<section class="login-container">
    <div class="inner">
        <div class="card m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="app-logo">
                        <div class="app-logo"><img src="{{ asset('webimages/web/app-logo.png') }}" alt="Logo"></div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3"><span>Inicio de Sesión</span></h6>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    @include('auth.messages')
                    <form class="form-horizontal form-simple" method="POST" action="{{ route('vadmin.login') }}">
                        {{ csrf_field() }}
                        <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }} position-relative has-icon-left mb-0">
                            <input id="email" type="text" name="email" class="form-control round" placeholder="Ingrese su Email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }} position-relative has-icon-left">
                            <input id="password" type="password" name="password"  class="form-control round" placeholder="Ingrese su contraseña" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="icon-unlock2"></i> Conectar
                            </button>
                        </fieldset>
                        <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                        </div>
                        <div class="col-md-6 col-xs-12 forgot-pasword">
                            <a class="card-link" href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <div class="register">
                        <p class="text-xs-center">No tiene cuenta ? <a href="{{ route('register')}}" class="card-link"><b>Registrarse</b></a></p>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <div class="vadmin-logo">
                    <a href="https://vimana.studio" target="_blank">
                        <img src="{{ asset('vadmin-ui/app-assets/images/logo/app-logo2.png') }}" alt="branding logo"><br>
                        <span class="text">Gestor de Contenido</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
    