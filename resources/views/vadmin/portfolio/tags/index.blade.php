@extends('layouts.vadmin.main')
@section('title', 'Vadmin | Etiquetas')
{{-- STYLE INCLUDES --}}
@section('styles')
@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Etiquetas del Portfolio</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('tags.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nueva Etiqueta</a>
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button>
				{{-- Edit --}}
				<button class="EditBtn btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</button>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="tags">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				{{-- If Search --}}
				@if(isset($_GET['name']))
				<a href="{{ url('vadmin/tags') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
				<div class="results">{{ $tags->total() }} resultados de búsqueda</div>
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.portfolio.tags.searcher')
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
				@slot('title', 'Etiquetas del Portfolio')
					@if($tags->count() == '0')
						@slot('tableTitles', '')
						@slot('tableContent', '')
					@else
					@slot('tableTitles')
						<th></th>
						<th>Nombre</th>
						<th>Fecha de Creación</th>
					@endslot

					@slot('tableContent')
						@foreach($tags as $item)
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
				{!! $tags->appends(['title' => $_GET['title']])->render() !!}
			@elseif(isset($_GET['category']))
				{!! $tags->appends(['category' => $_GET['category']])->render() !!}
			@else
				{!! $tags->render() !!}
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
		$('.PortfolioTagsLi').addClass('open');
		$('.PortfolioTagsList').addClass('active');
	</script>
@endsection