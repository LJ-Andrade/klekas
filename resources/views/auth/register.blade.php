@extends('auth.app')

@section('content')
<section class="login-container">
    <div class="inner">
        <div class="card m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="app-logo"><img src="{{ asset('webimages/web/app-logo.png') }}" alt="Logo"></div>
                    <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3"><span>Creación de Cuenta</span></h6>
                </div>
            </div>
            <div class="card-body collapse in">	
                <div class="card-block" style="padding: 20px 10px">
                    @include('auth.messages')
                    <form class="form-horizontal form-simple" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            {{-- Name --}}
                            <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }} position-relative has-icon-left mb-1">
                                <input id="name" type="text" name="name" class="form-control round" placeholder="Ingrese su nombre" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <div class="form-control-position">
                                    <i class="icon-head"></i>
                                </div>
                            </fieldset>
                            {{-- Username --}}
                            <fieldset class="form-group{{ $errors->has('username') ? ' has-error' : '' }} position-relative has-icon-left mb-1">
                                <input id="username" type="text" name="username" class="form-control round" placeholder="Ingrese su nombre de usuario" value="{{ old('name') }}" required>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                <div class="form-control-position">
                                    <i class="icon-head"></i>
                                </div>
                            </fieldset>
                            {{-- Email --}}
                            <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }} position-relative has-icon-left mb-1">
                                <input id="email" type="email" name="email" class="form-control round" placeholder="Ingrese su email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="form-control-position">
                                    <i class="icon-head"></i>
                                </div>
                            </fieldset>
                        </div>
                        {{-- Password --}}
                        <div class="col-md-6">
                            <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }} position-relative has-icon-left">
                                <input id="password" type="password"  name="password" class="form-control round" placeholder="Contraseña" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="form-control-position">
                                    <i class="icon-key3"></i>
                                </div>
                            </fieldset>
                        </div>
                        {{-- Password Confirmation --}}
                        <div class="col-md-6">
                            <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }} position-relative has-icon-left">
                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control round" placeholder="Confirme Contraseña" required>
                                <div class="form-control-position">
                                    <i class="icon-key3"></i>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            {{-- Submit --}}
                            <input type="hidden" name="usertype" value="111">
                            <button type="submit" class="btn btn-primary btn-block"><i class="icon-unlock2"></i> Registrarse</button>
                        </div>
                    </form>
                </div>
                <p class="text-xs-center">Ya tiene cuenta ? <a href="{{ route('login')}}" class="card-link"><b>Conectarse</b></a></p>
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