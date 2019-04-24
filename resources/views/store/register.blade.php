@extends('store.partials.main')

@section('styles')
	<style> 
		body {
			background-color: #d0b3a7
		}
	</style>
@endsection

@section('content')
<div class="container padding-bottom-3x">
	<div class="row centered-form">
        <form class="login-box form-simple inner" method="POST" action="{{ route('customer.process-register') }}">
            {{ csrf_field() }}
            <input id="IsResellerCheckbox" type="checkbox" name="isreseller" class="Hidden">
            {{--  Check if reseller --}}
            <div class="NormaClientTitle">
                <h3 class="text-center">Registro de Usuario</h3>
            </div>
            <div class="ResellerTitle text-center" style="display: none">
                <a class="top-right-element cursor-pointer" onClick="closeResellerRegistration();">Volver</a>
                <h3>Registro de Usuario Mayorísta</h3>
                <p>Complete todos los datos</p>
            </div>
            <div class="row">
                {{-- Username --}}
                <div class="col-sm-6 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="reg-fn">Nombre de Usuario (Apodo)</label>
                    <input id="username" type="text" name="username" class="form-control round" 
                    placeholder="Ingrese su nombre de usuario" value="{{ old('username') }}" required>
                    @if ($errors->has('username'))
                        <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                    @endif
                </div> 	
                {{-- E-mail --}}
                <div class="col-sm-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="reg-fn">E-Mail</label>
                    <input type="text" name="email" class="form-control round" 
                    placeholder="Ingrese su email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div> 
            </div>
            <div class="row">
                {{-- Name --}}
                <div class="col-sm-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label>Nombre</label>
                    <input  type="text" name="name" class="form-control round" 
                    placeholder="Ingrese su nombre" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div> 	
                {{-- Surname --}}
                <div class="col-sm-6 form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                    <label for="reg-fn">Apellido</label>
                    <input type="text" name="surname" class="form-control round" 
                    placeholder="Ingrese su apellido" value="{{ old('surname') }}" required>
                    @if ($errors->has('surname'))
                        <span class="help-block"><strong>{{ $errors->first('surname') }}</strong></span>
                    @endif
                </div> 
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label>Tipo de Negocio</label>
                    {!! Form::select('business_type', ['Local' => 'Local', 'ShowRoom' => 'ShowRoom', 'Revendedora' => 'Revendedora'], null,
                    ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required' => '']) !!}
                </div>
                <div class="col-md-6 form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
                    <label>Código Postal</label>
                    <input class="form-control" type="text" value="{{ old('cp') }}" name="cp">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Provincia</label>
                        {!! Form::select('geoprov_id', $geoprovs, null,
                        ['class' => 'GeoProvSelect form-control', 'placeholder' => 'Seleccione una opción']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Localidad</label>
                        <select id='GeoLocsSelect' name="geoloc_id" 
                            data-actualloc="" data-actuallocid="" class="form-control GeoLocsSelect" required>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Phone --}}
                <div class="col-sm-6 form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label>Teléfono</label>
                    <input  type="text" name="phone" class="form-control round" 
                    placeholder="Ingrese su número telefónico" value="{{ old('phone') }}" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div> 
                {{-- CUIT --}}
                <div class="col-sm-6 form-group{{ $errors->has('cuit') ? ' has-error' : '' }}">
                    <label>CUIT</label>
                    <input class="form-control" type="text" name="cuit" placeholder="Ingrese su número de CUIT" value="{{ old('cuit') }}" required />
                </div>
            </div>
            <div class="row">
                {{-- Password --}}
                <div class="col-sm-6 form-group{{ $errors->has('password') ? ' has-error' : '' }} position-relative has-icon-left">
                    <label for="reg-fn">Contraseña</label>
                    <input id="password" type="password"  name="password" class="form-control round" placeholder="Contraseña" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div> 	
                {{-- Password Confirmation --}}
                <div class="col-sm-6 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} position-relative has-icon-left">
                    <label for="reg-fn">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" name="password_confirmation" class="form-control round" placeholder="Confirme Contraseña" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <input type="hidden" value="3" name="group">
            {{-- Submit --}}
            <button type="submit" class="btn btn-primary btn-block"><i class="icon-unlock"></i> Registrarse</button>
            <div class="bottom-text">Ya tiene cuenta? | <a href="{{ route('customer.login') }}">Ingresar</a></div>
        </form>
    </div>
</div>
@endsection
    
@section('scripts')
@include('store.components.bladejs')
    <script>
        // Check for locality
        $(document).ready(function(){
            $('.GeoProvSelect').on('change', function(){
                let prov_id = $(this).val();
                getGeoLocs(prov_id);
            });
        });
    </script>
@endsection
