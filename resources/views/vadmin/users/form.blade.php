<div class="col-md-12 col-lg-4">
    <div class="round-image-card">
        <div class="inner">
            <div class="update-image">
                @if(isset($user))
                     @if($user->avatar != '')
                    <img id="Avatar" class="Image-Container CheckImg" src="{{ asset('images/users/'.$user->avatar) }}" alt="Imágen de Usuario">
                    @endif
                @else
                    <img id="Avatar" class="Image-Container CheckImg" src="{{ asset('images/gen/default.jpg') }}" alt="Imágen de Usuario">
                @endif
                <span class="over-text">Cambiar imágen</span>
                <input id="ImageInput" type="file" name="avatar" class="Hidden">
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4">
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre', 'required' => '']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('username', 'Nombre de Usuario') !!}
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del usuario', 'required' => '']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el e-mail', 'required' => '']) !!}
    </div>
</div>
<div class="col-lg-4 col-md-4">
    <div class="form-group">
        {{-- Roles: 1 Superadmin - 2 Admin - 3 User --}}
        {!! Form::label('role', 'Rol') !!}
        {!! Form::select('role', [2 => 'Administrador', 3 => 'Usuario'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion', 'required' => '']) !!}
    </div>
    <div class="form-group">
        {{-- Group: 1 Member --}}
        {!! Form::label('group', 'Grupo') !!}
        {!! Form::select('group', [1 => 'Miembro'], 1, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion', 'required' => '']) !!}
    </div>
</div>
