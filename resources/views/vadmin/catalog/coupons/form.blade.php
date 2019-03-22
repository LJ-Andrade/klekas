<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('code', 'Código') !!}
            {!! Form::text('code', null, [ 'id' => 'CouponCode', 'class' => 'form-control', 'placeholder' => 'Ingrese un código', 'required' => '']) !!}
            <button class="btnSm btnBlue my-1" type="button" onclick="generateCatalogCoupon('CouponCode')">Generar Código</button>
        </div>
    </div>
</div>    
<div class="row">
    <div class="col-md-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('init_date', 'Fecha de Inicio') !!}
            {!! Form::date('init_date', null, ['class' => 'form-control', 'required' => '']) !!}
            {{-- <input class="form-control" name="init_date" data-trigger="hover" 
            data-original-title="" title="" type="date" required> --}}
        </div>
    </div>    
    <div class="col-md-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('expire_date', 'Expiración') !!}
            {!! Form::date('expire_date', null, ['class' => 'form-control', 'required' => '']) !!}
            {{-- <input class="form-control" name="expire_date" data-trigger="hover" 
            data-original-title="" title="" type="date" required> --}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xs-12">
        {!! Form::label('percent', 'Porcentaje') !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">%</span>
            </div>
            {!! Form::number('percent', null, ['class' => 'form-control', 'min' => '0', 'max' => '100', 'required' => '']) !!}
        </div>
    </div>  
    <div class="col-md-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('reseller', 'Válido mayorístas') !!}
            <div class="input-group" style="padding-top: 8px">
                <label class="display-inline-block custom-control custom-radio">
                    {!! Form::radio('reseller', 1, false, ['class' => 'custom-control-input']) !!}
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description ml-0">Sí</span>
                </label>
                <label class="display-inline-block custom-control custom-radio">
                    {!! Form::radio('reseller', 0, true, ['class' => 'custom-control-input']) !!}
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description ml-0">No</span>
                </label>
            </div>
        </div>
    </div>  
</div>
<input type="hidden" name="status" value="Active">