<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta', 'id' => 'TitleInput', 
    'required' => '', 'maxlength' => '120', 'minlength' => '4']) !!}
</div>  