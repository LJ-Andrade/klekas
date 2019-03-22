<div id="SearchFilters" class="search-filters">
    {{-- Search --}}
    <div class="row">
    {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'cat_atribute1.index', 'class' => 'form-inline col-md-4 col-sm-12', 'role' => 'search']) !!} 
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!} <br>  
            {!! Form::text('name', null, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
        </div>
        <div class="form-group">
            <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen actionBtn">Buscar</button>
        </div>
    {!! Form::close() !!}
    </div>
    {{-- /Search --}}
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
