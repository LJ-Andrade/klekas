<div id="SearchFilters" class="search-filters">
    {{-- Search --}}
    <div class="row">
        {!! Form::open(['id' => 'SearchForm', 'method' => 'POST', 'route' => 'searchStoredContact', 'class' => 'form-inline col', 'role' => 'search']) !!} 
            <div class="form-group">
                {!! Form::label('searchTerm', 'Nombre o E-Mail') !!} <br>  
                {!! Form::text('searchTerm', null, ['id' => 'SearchInput', 'class' => 'form-control', 'aria-describedby' => 'search']) !!}
            </div>
            <div class="form-group">
                <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen actionBtn">Buscar</button>
            </div>
        {!! Form::close() !!}
        @if(\Request::segment(3) == '*')
            <a href="{{ url('vadmin/mensajes_recibidos/3') }}"><button class="btnSm btnGreen loneBtn">Mostrar finalizados</button></a>	
        @endif
        @if(\Request::segment(3) == '3')
            <a href="{{ url('vadmin/mensajes_recibidos/*') }}"><button class="btnSm btnGreen loneBtn">Mostrar Todos</button></a>	
        @endif
        @if(\Request::segment(2) == "buscar_mensajes_recibidos")
            <a href="{{ url('vadmin/mensajes_recibidos/*') }}"><button class="btnSm btnGreen loneBtn">Mostrar Todos</button></a>	
        @endif
        {{-- /Search --}}
        
    </div>
        <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
