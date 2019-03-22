
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-6">
        {{--  Name  --}}
        <div class="col-xs-12 col-md-6 form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Título del artículo', 'id' => 'TitleInput', 
            'required' => '', 'maxlength' => '120', 'minlength' => '4']) !!}
        </div>
        {{--  Product Code  --}}
        <div class="col-xs-12 col-md-6 form-group">
            {!! Form::label('code', 'Código') !!}
            {!! Form::text('code', null, ['id' => 'CodeInput', 'class' => 'form-control', 'placeholder' => 'Ingrese el código', 'required' => '']) !!}
        </div>
        <div class="col-xs-12 col-md-6 form-group">
        {{--  price Price  --}}
        {!! Form::label('reseller_price', 'Precio') !!}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                {!! Form::number('reseller_price', null, ['class' => 'form-control', 'min' => '0', 'step' => 'any', 'required' => '']) !!}
            </div>
        </div>
        {{-- Reseller Discount --}}
        <div class="col-xs-12 col-md-6 form-group">
            {!! Form::label('reseller_discount', 'Oferta') !!}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">%</span>
                </div>
                {!! Form::number('reseller_discount', null, ['class' => 'form-control',
                'min' => '0', 'max' => '100', 'data-parsley-type' => 'integer', 'required' => '']) !!}
            </div>
        </div>
         {{-- Season --}}
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('brand_id', 'Marca') !!}
                {!! Form::select('brand_id', $brands, null, ['class' => 'Select-Brand form-control']) !!}
            </div>
        </div>
        {{-- Category --}}
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('category_id', 'Categoría') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control Select-Category', 'placeholder' => 'Seleccione una opcion',
                'required' => '']) !!}
            </div>
        </div> 
         {{-- Tags--}}
         <div class="col-xs-12 col-md-6">
            <div class="form-group">
                {!! Form::label('tags', 'Etiquetas') !!}
                {!! Form::select('tags[]', $tags, null, ['class' => ' Select-Tags form-control', 'multiple', 'required' => '']) !!}
            </div>
        </div>
        {{--  Textile  --}}
        <div class="col-xs-12 col-md-6 form-group">
            {!! Form::label('textile', 'Textil') !!}
            {!! Form::text('textile', null, ['class' => 'form-control', 'placeholder' => 'Tipo de tela', 
            'required' => '', 'maxlength' => '50']) !!}
        </div>           
        
        <div class="col-xs-12 variants">
            <div class="variants-selectors">
                {!! Form::label('description', 'Variantes') !!}
                <div class="colors">
                    <span class="sub-title">Colores: </span>
                    @foreach($colors as $color)
                    <label class="items checkbox-inline">
                        <input class="VariantColor" type="checkbox" name="color" 
                        data-name="{{ $color->name }}" value="{{ $color->id }}"> {{ $color->name}}
                    </label>
                    @endforeach
                </div>
                <div class="colors">
                    <span class="sub-title">Talles: </span>
                    @foreach($sizes as $size)
                    <label class="items checkbox-inline">
                        <input class="VariantSize" type="checkbox" name="size" 
                        data-name="{{ $size->name }}" value="{{ $size->id }}"> {{ $size->name}}
                    </label>
                    @endforeach
                </div>
                <button id="MakeVariantsBtn" onclick="makeVariants()" type="button" class="btnSm btnMain">Crear variantes</button>
            </div>
            <div class="inner-table">
                <table class="table table-striped custom-list">
                    <thead id="HeaderVariants" class="@if(!isset($article->variants)) Hidden @endif">
                        <tr>
                            <th scope="col">Variante (Color/Talle)</th>
                            <th scope="col">Stock</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="ExistingVariants">
                        @if(isset($inheritData))
                        @php $article = $inheritData @endphp
                        @endif
                        @if(isset($article))
                        @foreach($article->variants as $variant)
                        <tr id="VariantID{{ $variant->id }}">
                            <td class='Combination' data-combination="{{ $variant->color->name }}/{{ $variant->size->name }}">{{ $variant->color->name }} / {{ $variant->size->name }}</td>
                                <input name="variants[{{ $variant->combination }}][color]" value="{{ $variant->color_id }}" type='hidden' class='form-control'>
                                <input name="variants[{{ $variant->combination }}][size]" value="{{ $variant->size_id }}" type='hidden' class='form-control'>
                                <td class="width-100"><input name="variants[{{ $variant->combination }}][stock]" value='{{ $variant->stock }}' type='number' min='0' class='form-control'></td>
                                <td>
                                    <a class="RemoveVariant delete-icon" 
                                        data-id='{{ $variant->id }}'
                                        data-route="{{ url('vadmin/destroy_cat_variant') }}" 
                                        data-rowid="VariantID{{ $variant->id }}">
                                        <i class='fa fa-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tbody id="ArticleVariants">
                        {{-- <tr>
                            <td style="white-space:nowrap">XS / Rojo</td>
                            <td class="width-100"><input class="form-control" type="text" name="variant[]" value="10"></td>
                            <td><i class="fa fa-trash"></i></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>{{-- End Variants --}}
    </div> {{-- COL IZQ --}}

    <div class="col-xs-12 col-md-12 col-lg-6">
        <div class="col-md-12">
            <div class="row form-group">
                <div class="col-md-12">
                    <h2>Carga de imágenes</h2>
                    <span style="font-size: 12px">Formatos soportados: jpeg, jpg, png, gif | Peso máximo por imágen: 2mb | Peso máximo total: 5mb</span>
                    {{--  Images Input  --}}
                    {{-- {!! Form::file('images[]', array('multiple'=>true, 'id' => 'ImagesUploader')) !!} --}}
                    <input id="ImagesUploader" type="file" name="files[]" multiple="multiple">
                    {{-- @if(isset($article) && count($article->images) > 0 )
                        @foreach($article->images as $image)
                        <li class="fileuploader-item file-has-popup file-type-image file-ext-jpg">
                            <div class="columns"><div class="column-thumbnail">
                                <div class="fileuploader-item-image">
                                    <canvas width="36" height="50"></canvas></div>
                                    <span class="fileuploader-action-popup"></span>
                                </div><div class="column-title">
                                    <div title="44-0.jpg">44-0.jpg</div>
                                    <span>37.4 KB</span></div><div class="column-actions">
                                        <a class="fileuploader-action fileuploader-action-sort" title="Sort">
                                            <i></i></a><a class="fileuploader-action fileuploader-action-remove" title="Remove">
                                                <i></i></a></div></div><div class="progress-bar2">
                                                    <span></span></div></li>
                        @endforeach
                    @endif --}}
                    <div class="ErrorImage"></div>
                </div>
            </div>
        </div>
            @if(isset($inheritData) && count($inheritData->images) > 0)
                {{-- <div class="col-md-12 actual-images horizontal-list">
                    <h3>Imágenes</h3>
                    <ul>
                        @foreach($inheritData->images->sortByDesc('featured') as $image)
                        <li id="Img{{ $image->id }}" class="{{ $image->featured ? 'is-featured' : '' }}">	
                            <img class="CheckImg" src="{{ asset('webimages/catalogo/'.$image->name) }}">
                            <div class="overlayItemCenter">
                                <a><i class="Delete-Product-Img icon-ios-trash-outline delete-img" data-imgid="{{ $image->id }}"></i></a>
                                @if(!$image->featured)
                                    <a href="{{ url('vadmin/article/'.$inheritData->id.'/images/setFeatured/'.$image->id) }}"><i class="icon-star"></i></a>
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                <br>
                </div> --}}
            @else
                @if(isset($article) && count($article->images) > 0 )
                    <div class="col-md-12 actual-images horizontal-list">
                        <h2>Imágenes Publicadas</h2>
                        <ul>
                            @foreach($article->images->sortByDesc('featured') as $image)
                            <li id="Img{{ $image->id }}" class="{{ $image->featured ? 'is-featured' : '' }}">	
                                <img class="CheckImg" src="{{ asset('webimages/catalogo/'.$image->name) }}">
                                <div class="overlayItemCenter">
                                    <a><i class="Delete-Product-Img icon-ios-trash-outline delete-img" data-imgid="{{ $image->id }}"></i></a>
                                    @if(!$image->featured)
                                        <a href="{{ url('vadmin/article/'.$article->id.'/images/setFeatured/'.$image->id) }}"><i class="icon-star"></i></a>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    <br>
                    </div>
                @endif 
            @endif 
                
    </div> {{-- COL DER --}}
</div> {{--  Main Row --}}

{{-- Description --}}
<div class="row">
    <div class="col-md-12">
        {!! Form::label('description', 'Descripción') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control Textarea-Editor']) !!}
    </div>
</div>
<div class="row">
    {{-- Slug --}}
    <div class="col-md-6">
        <div class="form-group">
        {!! Form::label('slug', 'Url Amigable - Dirección web') !!}
        {!! Form::text('slug', null, ['class' => 'SlugInput form-control Display-Input-Modificable display-input-disabled',
        'placeholder' => 'Dirección visible (en explorador)', 'id' => 'SlugInput', 'required' => '']) !!}
        </div>
    </div>
    <div class="col-md-6">
         {{-- Status--}}
         <div class="form-group" style="max-width: 250px">
            {!! Form::label('status', 'Publicación') !!}
            {!! Form::select('status', ['1' => 'Activa','0' => 'Pausada'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>