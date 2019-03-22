@extends('layouts.vadmin.main')
@section('title', 'Vadmin | Portfolio')
{{-- STYLE INCLUDES --}}
@section('styles')
@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Listado de Artículos</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('portfolio.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo Artículo</a>
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button>
				{{-- Edit --}}
				<button class="EditBtn btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</button>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="portfolio">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				{{-- If Search --}}
				@if(isset($_GET['title']) || isset($_GET['category']))
				<a href="{{ url('vadmin/portfolio') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
				<div class="results">{{ $articles->total() }} resultados de búsqueda</div>
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.portfolio.searcher')
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
				@slot('title', 'Listado de Usuarios')
					@if($articles->count() == '0')
						@slot('tableTitles', '')
						@slot('tableContent', '')
					@else
					@slot('tableTitles')
						<th></th>
						<th>Imágen</th>
						<th>Título</th>
						<th>Categoría</th>
						<th>Fecha de Creación</th>
						<th>Estado</th>
					@endslot

					@slot('tableContent')
						@foreach($articles as $item)
							<tr>
								<td class="w-50">
									<label class="CheckBoxes custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
								<td class="thumb">
									@if(count($item->images))
										<img src="{{ asset('webimages/portfolio/'. $item->images->first()->name ) }}">
									@else
										<img src="{{ asset('images/gen/default.jpg') }}">
									@endif
								</td>
								<td class="show-link max-text"><a href="{{ url('vadmin/portfolio/'.$item->id) }}">{{ $item->title }}</a></td>
								<td>{{ $item->category->name }}</td>
								<td class="w-200">{{ transDateT($item->created_at) }}</td>
								<td class="w-50 pad0 centered">
									@if($item->status == '1')
										<label class="switch">
											<input class="PauseArticle switch-checkbox" data-id="{{ $item->id }}" type="checkbox" checked>
											<span class="slider round"></span>
										</label>
									@elseif($item->status == '0')
										<label class="switch">
											<input class="ActivateArticle" data-id="{{ $item->id }}" type="checkbox">
											<span class="slider round"></span>
										</label>
									@else 
										Sin estado
									@endif
								</td>
							</tr>						
						@endforeach
						@endif
				@endslot
			@endcomponent
			
			{{--  Pagination  --}}
			@if(isset($_GET['title']))
				{!! $articles->appends(['title' => $_GET['title']])->render() !!}
			@elseif(isset($_GET['category']))
				{!! $articles->appends(['category' => $_GET['category']])->render() !!}
			@else
				{!! $articles->render() !!}
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
	$('.PortfolioLi').addClass('open');
	$('.PortfolioList').addClass('active');

	$(document).ready(function(e) {
		$('.PauseArticle').click(function() {
			var cbx = $(this);
			if (cbx[0].checked) {
				console.log("Error en checkbox");
			} else {
				console.log("Pausar");
				var id     = cbx.data('id');
				var route = "{{ url('/vadmin/updateStatus') }}/"+id+"";
				updateStatus(id, route, '0');
			}
		});

		$('.ActivateArticle').click(function() {
			var cbx = $(this);
			if (cbx[0].checked) {
				var id = cbx.data('id');
				var route = "{{ url('/vadmin/updateStatus') }}/"+id+"";
				updateStatus(id, route, '1');
			} else {
				console.log("Error en checkbox");
			}
		});
	});

	</script>
@endsection