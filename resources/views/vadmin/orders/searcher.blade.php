<div id="SearchFilters" class="search-filters">
    <div class="row">
        {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'orders.index', 'class' => 'col-sm-2 pad0', 'role' => 'search']) !!} 
            <div class="form-control">
                {!! Form::label('id', 'Pedido #') !!}
                <div class="input-group">
                    {!! Form::number('id', null, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen appendBtn"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'orders.index', 'class' => 'col-sm-4 col-md-3 pad0', 'role' => 'search']) !!} 
            <div class="form-control">
                {!! Form::label('customer', 'Cliente') !!}
                <div class="input-group">
                    {!! Form::text('customer', null, ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen appendBtn"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'orders.index', 'class' => 'col-md-3 col-xs-12 pad0', 'role' => 'search']) !!} 
            <div class="form-control">
                {!! Form::label('status', 'Estado') !!}
                <div class="input-group">
                    {!! Form::select('status', 
                        ['Process' => 'Esperando Acción', 'Approved' => 'Aprobado', 'Canceled' => 'Cancelado', 'Finished' => 'Finalizado', 'Active' => 'Activos', 'All' => 'Todos'], 
                        ['class' => 'form-control', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                        <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen appendBtn"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    {{-- /Search --}}
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
