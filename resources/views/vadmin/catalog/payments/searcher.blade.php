<div id="SearchFilters" class="search-filters">
    {{-- Search --}}
    <div class="row">
        {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'payments.index', 'class' => 'col-md-4 col-sm-12', 'role' => 'search']) !!} 
            <div class="form-control">
                {!! Form::label('name', 'Buscar por nombre') !!}
                <div class="input-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}<br> 
                    {{-- <input type="text" class="form-control" placeholder="Ingrese código..." aria-label="Buscar por código"> --}}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen appendBtn">Buscar</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    {{-- /Search --}}
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>