<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'id' => 'TitleInput', 'required' => '']) !!}
</div>  
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Descripción sobre el envío']) !!}
</div>  
<div class="form-group">
    {!! Form::label('zone', 'Zona') !!}
    {!! Form::text('zone', null, ['class' => 'form-control', 'placeholder' => 'Zonas o Límites']) !!}
</div>  
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('delivery_time', 'Tiempo de entrega') !!}
            {!! Form::text('delivery_time', null, ['class' => 'form-control', 'placeholder' => 'Tiempo estimado']) !!}
        </div>
    </div>
    <div class="col-md-6">
            {!! Form::label('price', 'Costo de envío') !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0', 'step' => 'any', 'placeholder' => 'Ingrese valor', 'required' => '']) !!}
        </div>
    </div>
</div>