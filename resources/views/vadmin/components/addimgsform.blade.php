<div class="row form-group">
    <div class="col-md-12">
        <h2>Carga de imágenes</h2>
        <span style="font-size: 12px">Formatos soportados: jpeg, jpg, png, gif | Peso máximo por imágen: 2mb | Peso máximo total: 5mb</span>
        {{--  Images Input  --}}
        {!! Form::file('images[]', array('multiple'=>true, 'id' => 'Multi_Images')) !!}
        <div class="ErrorImage"></div>
    </div>
</div>