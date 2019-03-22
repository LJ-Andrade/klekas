<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del método de pago', 'required' => '']) !!}
</div>  
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'size' => '30x5', 'placeholder' => 'Describa el método de pago', 'required' => '']) !!}
</div>
{!! Form::label('percent', 'Porcentaje') !!}
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">%</span>
    </div>
    {!! Form::number('percent', null, ['class' => 'form-control', 'min' => '0', 'step' => 'any', 'placeholder' => 'Ingrese porcentaje si corresponde', 'required' => '']) !!}
</div>