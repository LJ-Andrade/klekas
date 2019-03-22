<div id="SearchFilters" class="search-filters">
    <div class="row">
        {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'catalogo.index', 'class' => 'col-md-2 col-xs-12 pad0', 'role' => 'search']) !!} 
            <div class="form-control">
                {!! Form::label('code', 'Buscar por código') !!}
                <input type="hidden" name="redirect" value="stock">
                <div class="input-group">
                    {!! Form::text('code', null, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnMain appendBtn"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'catalogo.index', 'class' => 'col-md-3 col-xs-12 pad0', 'role' => 'search']) !!} 
            <input type="hidden" name="redirect" value="stock">
            <div class="form-control">
                {!! Form::label('name', 'Buscar por nombre') !!}
                <div class="input-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnMain appendBtn"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'catalogo.index', 'class' => 'col-md-3 col-xs-12 pad0', 'role' => 'search']) !!} 
            <input type="hidden" name="redirect" value="stock">
            <div class="form-control">
                {!! Form::label('category', 'Buscar por categoría') !!}
                <div class="input-group">
                    {!! Form::select('category', $categories, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnMain appendBtn"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
