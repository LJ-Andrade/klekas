@extends('store.partials.main')


@section('content')
<div class="container padding-bottom-3x">
	<div class="row centered-form">
        <form id="RegisterForm" class="login-box form-simple inner" method="POST" action="{{ route('customer.register') }}">
            {{--  Check if reseller --}}
            <input id="IsResellerCheckbox" type="checkbox" name="isreseller" class="Hidden">
            {{ csrf_field() }}
            <div class="NormaClientTitle">
                <h3 class="text-center">Registro de Usuario Mayorísta</h3>
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
                        <input id="username" type="text" name="username" class="form-control round" placeholder="Ingrese su nombre de usuario" value="{{ old('name') }}" required>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div> 	
                    {{-- E-mail --}}
                    <div class="col-sm-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="reg-fn">E-Mail</label>
                        <input type="text" name="email" class="form-control round" placeholder="Ingrese su email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div> 
                </div>
                <div class="row">
                    {{-- Name --}}
                    <div class="col-sm-6 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="reg-fn">Nombre</label>
                        <input type="text" name="name" class="form-control round" placeholder="Nombre de Usuario" value="{{ old('username') }}" required>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div> 	
                    {{-- Surname --}}
                    <div class="col-sm-6 form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
                        <label for="reg-fn">Apellido</label>
                        <input type="text" name="surname" class="form-control round" placeholder="Ingrese su nombre" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
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
                    <div class="col-sm-6 form-group{{ $errors->has('password') ? ' has-error' : '' }} position-relative has-icon-left">
                        <label for="reg-fn">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control round" placeholder="Confirme Contraseña" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- RESELLER BOX required --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Provincia</label>
                            {!! Form::select('geoprov_id', $geoprovs, null,
                            ['class' => 'GeoProvSelect IfResellerEnable form-control', 'placeholder' => 'Seleccione una opción', 'required' => '']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Localidad</label>
                            <select id='GeoLocsSelect' name="geoloc_id" 
                                data-actualloc="" 
                                data-actuallocid="" 
                                class="GeoLocsSelect IfResellerEnable form-control" required>
                            </select>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div id="UseCuitContainer" class="">
                        <label>Seleccione CUIT o DNI</label>
                        <input id="CuitInput" type="number" name="cuit" class="IfResellerEnable form-control round" min="0" placeholder="Ingrese número de CUIT">
                    </div>
                    <div id="UseDniContainer" class="Hidden">
                        <label>Seleccione CUIT o DNI</label>
                        <input id="DniInput" type="number" name="dni" class="IfResellerEnable form-control round" min="0" placeholder="Ingrese número de DNI">
                    </div>
                </div>
                {{-- <div class="col-md-6 form-group">
                    <label>Teléfono</label>
                    <input type="text" name="phone" class="IfResellerEnable form-control round" placeholder="Ingrese teléfono" required>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="radio-inline"><input id="UseCuit" type="radio" name="CuitOrDni" value="Cuit" checked> CUIT</label>
                    <label class="radio-inline"><input id="UseDni"  type="radio" name="CuitOrDni" value="Dni"> DNI</label>
                    {{-- <div class="form-group">
                        <label for="">Seleccione CUIT o DNI</label>
                        <select class="form-control" name="CuitOrDni" id="SelectCuitOrDni">
                        <option value="Cuit">Cuit</option>
                        <option value="Dni">Dni</option>
                    </select> --}}
                </div>
            </div>
            <div id="FormErrors"></div>
            {{-- Submit --}}
            <input type="hidden" value="3" name="group">
            <button type="submit" id="SubmitFormBtn" class="btn btn-primary btn-block"><i class="icon-unlock"></i> Registrarse</button>
            {{-- <button type="button" id="SubmitFormBtn" class="btn btn-primary btn-block"><i class="icon-unlock"></i> Registrarse</button> --}}
            <div class="bottom-text">Ya tiene cuenta? | <a href="{{ route('customer.login') }}">Ingresar</a></div>
        </form>
    </div>
</div>

@endsection
    
@section('scripts')
    @include('store.components.bladejs')
    <script>
        $('.GeoProvSelect').val('');

        $('#UseCuit').click(function(){
            $('#UseCuitContainer').removeClass('Hidden');
            $('#UseDniContainer').addClass('Hidden');
            $('#UseCuit').prop('checked', true);
            $('#UseDni').prop('checked', false);
        });

        $('#UseDni').click(function(){
            $('#UseCuitContainer').addClass('Hidden');
            $('#UseDniContainer').removeClass('Hidden');
            $('#UseCuit').prop('checked', false);
            $('#UseDni').prop('checked', true);
        });

        


        
        // $('#SubmitFormBtn').on('click', function(e){
        //     e.preventDefault();

        //     let cuit = $('#CuitInput').val();
        //     let dni = $('#DniInput').val();
        //     let error = $('#FormErrors');

        //     if(cuit == '' && dni == '')
        //     {
        //         error.html("Debe ingresar o un Cuit o un Dni");
        //         error.addClass('error-active');
        //     }
        //     else
        //     {
        //         if(cuit == undefined){
        //             error.html("Debe ingresar un Cuit");
        //             error.addClass('error-active');
        //         }
        //         else if(cuit != '' && cuit.length != 11){
        //             error.html("El cuit debe tener 11 números");
        //             error.addClass('error-active');
        //         }
        //         else if(dni != '' && dni.length != 8)
        //         {
        //             error.html("El Dni debe tener 8 números");
        //             error.addClass('error-active');
        //         }
        //         else
        //         {
        //             $("#RegisterForm").submit();
        //             error.removeClass('error-active');
        //             error.html("");
        //         }
        //     }
            

        // });


    </script>
@endsection
