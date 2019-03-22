<div id="SearchFilters" class="search-filters">
    {{-- Search --}}
    <div class="row">
        {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'coupons.index', 'class' => 'col-md-4 col-sm-12', 'role' => 'search']) !!} 
            <div class="form-control">
                {!! Form::label('code', 'Buscar por código') !!}
                <div class="input-group">
                    {!! Form::text('code', null, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}<br> 
                    {{-- <input type="text" class="form-control" placeholder="Ingrese código..." aria-label="Buscar por código"> --}}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen appendBtn">Buscar</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        <div class="col-md-4">
            <div class="form-control">
                {!! Form::label('code', 'Buscar por estado') !!}
                <div class="input-group">
                    <a href="{{ route('coupons.index', ['show' => 'Expired']) }}"><button class="btnSm btnRed searchBtn">Expirados</button></a>
                    <a href="{{ route('coupons.index', ['show' => 'Active']) }}"><button class="btnSm btnBlue searchBtn">Activos</button></a>
                </div>
            </div>
        </div>
    </div>
    {{-- /Search --}}
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
    