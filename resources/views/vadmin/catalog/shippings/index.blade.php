@extends('vadmin.partials.main')
@section('title', 'Vadmin | Métodos de envío')
{{-- STYLE INCLUDES --}}
@section('styles')
@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Métodos de Envío</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('shippings.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo método de envío</a>
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button>
				{{-- Edit --}}
				<button class="EditBtn btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</button>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="shippings">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				{{-- If Search --}}
				@if(isset($_GET['name']))
					<a href="{{ url('vadmin/shipping') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
					<div class="results">{{ $items->total() }} resultados de búsqueda</div>
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.catalog.shippings.searcher')
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
				@slot('title', 'Métodos de Envío')
					@if($shippings->count() == '0')
						@slot('tableTitles', '')
						@slot('tableContent', '')
					@else
					@slot('tableTitles')
						<th></th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Zona</th>
						<th>Tiempo de entrega</th>
						<th>Costo</th>
						<th>Fecha de Creación</th>
					@endslot

					@slot('tableContent')
						@foreach($shippings as $item)
							<tr>
								<td class="w-50">
									<label class="custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
								<td class="show-link max-text"><a href="{{ url('vadmin/shippings/'.$item->id) }}">{{ $item->name }}</a></td>
								<td class="max-text">{{ $item->description }}</td>
								<td class="max-text">{{ $item->zone }}</td>
								<td class="max-text">{{ $item->delivery_time }}</td>
								<td class="max-text">$ {{ $item->price }}</td>
								<td class="w-200">{{ transDateT($item->created_at) }}</td>
							</tr>						
						@endforeach
					@endif
				@endslot
			@endcomponent
			
			{{--  Pagination  --}}
			{!! $shippings->render() !!}
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

	</script>
@endsection
