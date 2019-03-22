@extends('vadmin.partials.main')
@section('title', 'Vadmin | Listados de artículos del catálogo')

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Listado de artículos</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('catalogo.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo artículo</a>
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button>
				{{-- Update Live Data --}}
				<button id="UpdateList" data-route="{{ route('vadmin.update_catalog_fields') }}" class="fixed-if-scroll false btn btnGreen Hidden">
				<i class="icon-pencil2"></i> Actualizar</button>
				{{-- Edit --}}
				<button class="EditBtn btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</button>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{-- THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER --}}
				<input id="ModelName" type="hidden" value="catalogo">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.catalog.stockSearcher')
		@endslot
	@endcomponent
@endsection

{{-- CONTENT --}}
@section('content')
{{-- {{dd($articles)}} --}}
	<div class="list-wrapper">
		{{-- Search --}}
		<div class="row inline-links">
			<b>Órden:</b> 
			<a href="{{ route('catalogo.index', ['orden_af' => 'ASC', 'redirect' => 'stock']) }}" >A-Z</a>
			<a href="{{ route('catalogo.index', ['orden_af' => 'DESC', 'redirect' => 'stock']) }}" >Z-A</a>
			<a href="{{ route('catalogo.index', ['orden' => 'DESC', 'redirect' => 'stock']) }}">Stock Alto</a>
			<a href="{{ route('catalogo.index', ['orden' => 'ASC', 'redirect' => 'stock']) }}">Stock Bajo</a> 
			<a href="{{ route('catalogo.index', ['orden' => 'limitados', 'redirect' => 'stock']) }}" >Stock Limitado</a>
			@if(isset($_GET['code']) || isset($_GET['title']) || isset($_GET['category']) || isset($_GET['orden']))
			<a href="{{ route('catalogo.index', ['redirect' => 'stock']) }}" >Todos</a>
			@endif
		</div>
		<div class="row">
			@component('vadmin.components.list')
				@slot('actions')
                @if(isset($_GET['name']) || isset($_GET['code']) || isset($_GET['title']) || isset($_GET['category']) || isset($_GET['orden']))
                <a href="{{ route('vadmin.exportCatalogListSheet', ['params' => http_build_query($_GET), 'format' => 'xls']) }}" data-toggle="tooltip" title="Exportar a .XLS"  class="icon-container green" target="_blank">
                    <i class="fas fa-file-excel"></i>
                </a>
                <a href="{{ route('vadmin.exportCatalogListSheet', ['params' => http_build_query($_GET), 'format' => 'csv']) }}" data-toggle="tooltip" title="Exportar a .CSV"  class="icon-container blue" target="_blank">
                    <i class="fas fa-file-excel"></i>
                </a>
                <a href="{{ route('vadmin.exportCatalogListPdf', ['params' => http_build_query($_GET), 'action' => 'download']) }}" data-toggle="tooltip" title="Exportar a .PDF" class="icon-container red" target="_blank">
                    <i class="fas fa-file-pdf"></i>
                </a>
                <a href="{{ route('vadmin.exportCatalogListPdf', ['params' => http_build_query($_GET), 'action' => 'stream']) }}" data-toggle="tooltip" title="Exportar a .PDF" class="icon-container red" target="_blank">
                    <i class="fas fa-eye"></i>
                </a>
            @else
                <a href="{{ route('vadmin.exportCatalogListSheet', ['params' => 'all', 'format' => 'xls']) }}" data-toggle="tooltip" title="Exportar a XLS"  class="icon-container green" target="_blank">
                    <i class="fas fa-file-excel"></i>
                </a>
                <a href="{{ route('vadmin.exportCatalogListSheet', ['params' => 'all', 'format' => 'csv']) }}" data-toggle="tooltip" title="Exportar a .CSV"  class="icon-container blue" target="_blank">
                    <i class="fas fa-file-excel"></i>
                </a>
                <a href="{{ route('vadmin.exportCatalogListPdf', ['params' => 'all', 'action' => 'download']) }}" data-toggle="tooltip" title="Exportar a .PDF" class="icon-container black" target="_blank">
                    <i class="fas fa-file-pdf"></i>
                </a>
                <a href="{{ route('vadmin.exportCatalogListPdf', ['params' => 'all', 'action' => 'stream']) }}" data-toggle="tooltip" title="Exportar a .PDF" class="icon-container black" target="_blank">
                    <i class="fas fa-eye"></i>
                </a>
            @endif
				@endslot
				@slot('title', 'Listado de artículos de la tienda')
				@slot('tableTitles')
                    @if(!$articles->count() == '0')
                        <th class="w-50"></th>
						<th>Cód.</th>
						<th>Título</th>
						<th>Stock</th>
						<th>Stock Min.</th>
						<th>Estado</th>
					@endslot
					@slot('tableContent')
						@foreach($articles as $item)
							<tr id="ItemId{{$item->id}}" 
								class="SerializableItem"
								data-id="{{ $item->id }}"
								data-controller="ArticlesController"
								data-model="CatalogArticle">
								<td class="mw-50">
									<label class="CheckBoxes custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
							<td>#{{ $item->code }}</td>
								{{-- NAME --}}
								<td class="show-link max-text">
									<a href="{{ url('vadmin/catalogo/'.$item->id) }}">{{ $item->name }}</a>
								</td>
								{{--  STOCK --}}
								<td class="StockField with-notification mw-50">
									<input class="invisible-input mw-50" type="number" min="0"
									onchange="setData();" onfocus="event.target.select();"
									data-field="stock" value="{{ $item->stock }}">
									@if($item->stock < $item->stockmin) <div class="cell-notification"><i class="icon-notification"></i></div> @endif
								</td>	
								<td class="StockMinField mw-50">
									<input class="invisible-input mw-50" type="number" min="0"
									onchange="setData();" onfocus="event.target.select()" 
									data-field="stockmin" value="{{ $item->stockmin }}">
								</td>
								
								{{-- Direct Update - Old --}}
								{{-- <td class="with-notification mw-50">
									<input class="editable-input mw-50" onfocus="event.target.select()" type="number" value="{{ $item->stock }}" min="0">
									<div class="editable-input-data " data-id="{{ $item->id }}" 
											data-route="update_catalog_field" data-field="stock" data-type="int" data-action="reload" data-value=""></div>
											@if($item->stock < $item->stockmin) <div class="cell-notification"><i class="icon-notification"></i></div> @endif
									</div>
								</td>	
								<td class="mw-50">
									<input class="editable-input mw-50" onfocus="event.target.select()" type="number" value="{{ $item->stockmin }}" min="0">
									<div class="editable-input-data " data-id="{{ $item->id }}" 
										data-route="update_catalog_field" data-field="stockmin" data-type="int" data-action="reload" data-value=""></div>	
									</div>
								</td>  --}}
						
								<td class="w-50 pad0 centered">
									<label class="switch">
										<input class="UpdateStatus switch-checkbox" type="checkbox" 
										data-model="CatalogArticle" data-id="{{ $item->id }}"
										@if($item->status == '1') checked @endif>
										<span class="slider round"></span>
									</label>
								</td>
							</tr>					
						@endforeach
						@else 
							@slot('tableTitles')
								<th></th>
							@endslot
							@slot('tableContent')
								<tr>
									<td class="w-200">No se han encontrado items</td>
								</tr>
							@endslot
						@endif
				@endslot
			@endcomponent
			{{--  Pagination  --}}
			<div class="inline-links">
				<b>Resultados por página:</b>
				<a href="{{ route('catalogo.index', ['orden' => 'ASC', 'redirect' => 'stock', 'results' => '50']) }}">50</a>
				<a href="{{ route('catalogo.index', ['orden' => 'ASC', 'redirect' => 'stock', 'results' => '100']) }}">100</a>
			</div>
			{!! $articles->appends(request()->query())->render()!!}
		</div>
		
		<div id="Error"></div>
	</div>
@endsection

{{-- SCRIPT INCLUDES --}}
@section('scripts')
	@include('vadmin.components.bladejs')
	<script src="{{ asset('js/vadmin-dynamic-forms.js') }}" type="text/javascript"></script>
	<script>
		// Init Serializable list updater
		function setData(){
			dataSetter([".StockField", ".StockMinField"]);
			$('#UpdateList').removeClass('Hidden');
		}
		setData();
	</script>
@endsection
