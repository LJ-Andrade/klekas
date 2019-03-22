<div class="FilterSidebar filter-sidebar">
    {!! Form::open(['route' => 'store', 'method' => 'GET', 'class' => 'input-group form-group search-input']) !!}
        <span class="input-group-btn">
            <button type="submit"><i class="icon-search"></i></button>
        </span>
        <input class="form-control" name="buscar" type="search" placeholder="BUSCAR...">
    {!! Form::close() !!}
    <div class="featured-text">
        {{-- <div class="text text-1"><a href="{{ route('store.search.tag', 'Edición Limitada') }}">#EDICIÓN LIMITADA</a></div>
        <div class="text text-2"><a href="{{ route('store.search.tag', 'nuevo') }}">#NUEVOS INGRESOS</a></div>
        <div class="text text-1"><a href="{{ route('store', ['filtrar' => 'descuentos']) }}">#CON DESCUENTO</a></div> --}}
    </div>

    <div class="filter-item">
        <a class="collapse-icon" onclick="collapseFilter($(this))">-</a>
        <div class="sub-title">ORDENAR POR</div>
        <ul class="filter-content">
            <li><a href="{{ route('store', ['precio' => 'menor']) }}">Menor precio</a></li>
            <li><a href="{{ route('store', ['precio' => 'mayor']) }}">Mayor precio</a></li>
            {{-- <a><a href="{{ route('store', ['filtrar' => 'ultimos']) }}">Últimos ingresos</a></a> --}}
            {{-- <li><a href="{{ route('store', ['filtrar' => 'descuentos']) }}">Con Descuento</a></li> --}}
            <li><a href="{{ route('store', ['filtrar' => 'populares']) }}">Populares</a></li>
            {{-- <li><a href="{{ route('store.search.tag', 'Last Chance') }}">Last Chance</a></li> --}}
        </ul>
    </div>


    <div class="filter-item">
        <a class="collapse-icon" onclick="collapseFilter($(this))">-</a>
        <div class="sub-title">TIPOS DE PRENDA</div>
        <ul>
            @foreach($categories as $category)
                <li><a onchange="location = this.value;" href="{{ route('store', 'categoria=').$category->id }}"> {{ $category->name }} </a></li>
            @endforeach
        </ul>
    </div>

    <div class="filter-item">
        <a class="collapse-icon" onclick="collapseFilter($(this))">-</a>
        <div class="sub-title">COLORES</div>
        <ul>
            @foreach($colors as $color)
                @if($color->activeArticles->count() > 0)
                <span class="badge"><a href="{{ route('store.search.color', $color->id) }}">    
                    {{ $color->name }} - {{ $color->activeArticles->count() }} 
                    </a>
                </span>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="filter-item">
        <a class="collapse-icon" onclick="collapseFilter($(this))">-</a>
        <div class="sub-title">ETIQUETAS</div>
        <ul>
            @foreach($tags as $tag)
                <span class="badge"><a href="{{ route('store.search.tag', $tag->name) }}"> {{ $tag->name }}</a></span>
            @endforeach
        </ul>
    </div>
</div>