@extends('layouts.vadmin.main')
@section('title', 'Vadmin | Categorías')
{{-- STYLE INCLUDES --}}
@section('styles')
@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Listado de Categorías</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('categories.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nueva Categoría</a>
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button>
				{{-- Edit --}}
				<button class="EditBtn btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</button>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="categories">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				{{-- If Search --}}
				@if(isset($_GET['name']))
				<a href="{{ url('vadmin/categories') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
				<div class="results">{{ $categories->total() }} resultados de búsqueda</div>
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.portfolio.categories.searcher')
		@endslot
	@endcomponent
@endsection

{{-- CONTENT --}}
@section('content')
	<div class="list-wrapper">
		{{-- Search --}}
		{{-- Test --}}
		<div id="TestBox" class="col-xs-12 test-box Hidden">
		</div>
		<div class="row">
			@component('vadmin.components.list')
				@slot('actions', '')
				@slot('title', 'Listado de Categorías')
					@if($categories->count() == '0')
						@slot('tableTitles', '')
						@slot('tableContent', '')
					@else
					@slot('tableTitles')
						<th></th>
						<th>Nombre</th>
						<th>Fecha de Creación</th>
					@endslot

					@slot('tableContent')
						@foreach($categories as $item)
							<tr>
								<td class="w-50">
									<label class="custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
								<td class="show-link max-text"><a href="#">{{ $item->name }}</a></td>
								<td class="w-200">{{ transDateT($item->created_at) }}</td>
							</tr>						
						@endforeach
					@endif
				@endslot
			@endcomponent
			
			{{--  Pagination  --}}
			@if(isset($_GET['title']))
				{!! $categories->appends(['title' => $_GET['title']])->render() !!}
			@elseif(isset($_GET['category']))
				{!! $categories->appends(['category' => $_GET['category']])->render() !!}
			@else
				{!! $categories->render() !!}
			@endif
		</div>
		<div id="Error"></div>	
	</div>
@endsection

{{-- SCRIPT INCLUDES --}}
@section('scripts')
	@include('vadmin.components.bladejs')
@endsection

{{-- CUSTOM JS SCRIPTS--}}
@section('custom_js')
	<script>
		$('.PortfolioCategoriesLi').addClass('open');
		$('.PortfolioCategoriesList').addClass('active');
	</script>
@endsection