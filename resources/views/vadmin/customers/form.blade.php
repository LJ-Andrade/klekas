<div class="form-body">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    {!! Form::label('username', 'Nombre de Usuario') !!}
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del usuario', 'required' => '']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre', 'required' => '']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('surname', 'Apellido') !!}
                    {!! Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido', 'required' => '']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el e-mail', 'required' => '']) !!}
                </div>
                <div class="form-group">
                    <label>Tipo de Negocio</label>
                    {!! Form::select('business_type', ['Local' => 'Local', 'ShowRoom' => 'ShowRoom', 'Revendedora' => 'Revendedora'], 
                    null ,
                    ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required' => '']) !!}
                </div>
                <div class="form-group">
                    <label>CUIT</label>
                    {!! Form::number('cuit', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el CUIT']) !!}
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                {{-- <div class="form-group"> --}}
                    {{-- Group: 1 Member - 2 Client - 3 ClientBig  --}}
                    {{-- {!! Form::label('group', 'Grupo') !!}
                    {!! Form::select('group', [2 => 'Minorísta', 3 => 'Mayorísta'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion']) !!}
                </div> --}}
                <input type="hidden" name="group" value="3">
                <div class="form-group">
                    <label>WhatsApp</label>
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el WhatsApp', 'required' => '']) !!}
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    {!! Form::text('phone2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el teléfono']) !!}
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección']) !!}
                </div>
                <div class="form-group">
                    <label>Código Postal</label>
                    {!! Form::text('cp', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código postal']) !!}
                </div>
                <div class="form-group">
                    <label>Provincia</label>
                    @if(isset($customer))
                        {!! Form::select('geoprov_id', $geoprovs, $customer->geoprov_id,
                        ['class' => 'GeoProvSelect form-control', 'placeholder' => 'Seleccione una opción']) !!}
                    @else
                        {!! Form::select('geoprov_id', $geoprovs, null,
                        ['class' => 'GeoProvSelect form-control', 'placeholder' => 'Seleccione una opción']) !!}
                    @endif
                </div>
                <div class="form-group">
                    <label>Localidad</label>
                    @if(isset($customer))
                        <select id='GeoLocsSelect' name="geoloc_id" 
                            data-actualloc="{{ $customer->geoloc->name }}" 
                            data-actuallocid="{{ $customer->geoloc->id }}" 
                            class="form-control GeoLocsSelect" required>
                        </select>
                    @else
                        <select id='GeoLocsSelect' name="geoloc_id" 
                            data-actualloc="" 
                            data-actuallocid="" 
                            class="form-control GeoLocsSelect" required>
                        </select>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                @if(!isset($customer))
                    <div class="form-group">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña', 'required' => '']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirme la contraseña') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirme la contraseña', 'required' => '']) !!}
                    </div>
                @endif
                <div class="form-group">
                    <label>Estado</label>
                    {!! Form::select('status', ['1' => 'Activo', '0' => 'Inactivo'], '1', ['class' => 'form-control', 'placeholder' => 'Seleccione una opción']) !!}
                </div>
            </div>
        </div>
    </div>
