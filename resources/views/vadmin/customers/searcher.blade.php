<div id="SearchFilters" class="search-filters">
    <div class="row">
         {!! Form::open(['method' => 'GET', 'route' => 'customers.index', 'class' => 'col-sm-4 col-md-3 pad0', 'role' => 'search']) !!} 
            <div class="form-control">
                {!! Form::label('name', 'Buscar') !!}
                <div class="input-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnMain appendBtn"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        {!! Form::open(['method' => 'GET', 'route' => 'customers.index', 'class' => 'col-md-3 col-xs-12 pad0', 'role' => 'search']) !!} 
            <div class="form-control">
                {!! Form::label('group', 'Tipo de cliente') !!}
                <div class="input-group">
                    {!! Form::select('group', ['Todos', 'Nuevos', 'Minorístas', 'Mayorístas'], ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnMain appendBtn"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    {{-- /Search --}}
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
