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
                <div class="container" style="text-align: center">Gestor de Contenido</div>
                <div class="card-block">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Dirección E-Mail</label>
                            <input id="email" type="email" class="form-control round" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar link de recuperación de contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0">
                    </p>
                    <p class="float-sm-right text-xs-center m-0"> <a href="{{ route('register') }}" class="card-link"><b>Registrarse</b></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
