@extends('vadmin.partials.main')
@section('title', 'Vadmin | Cupones')

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Cupones</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('coupons.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo cupón</a>
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button>
				{{-- Edit --}}
				<button class="EditBtn btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</button>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="coupons">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				{{-- If Search --}}
				@if(isset($_GET['code']) || isset($_GET['show']))
					<a href="{{ url('vadmin/coupons') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
					<div class="results">{{ $items->total() }} resultados de búsqueda</div>
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.catalog.coupons.searcher')
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
				@slot('title', 'Cupones')
					@if($items->count() == '0')
						@slot('tableTitles', '')
						@slot('tableContent')

					@else
					@slot('tableTitles')
						<th></th>
						<th>Código</th>
						<th>Porcentaje</th>
						<th>Creado el </th>
						<th>Vencimiento</th>
						<th>Aplica Mayorísta</th>
					@endslot
					@slot('tableContent')
						@foreach($items as $item)
							<tr>
								<td class="w-50">
									<label class="custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
								<td class="show-link max-text"><a href="{{ url('vadmin/payments/'.$item->id) }}">{{ $item->code }}</a></td>
								<td class="max-text"><a href="#">% {{ $item->percent }}</a></td>
								<td class="max-text"><a href="#">{{ transDateT($item->init_date) }}</a></td>
								<td class="max-text"><a href="#">{{ transDateT($item->expire_date) }}</a></td>
								<td class="w-200">
								@if($item->reseller == true) Sí @else No @endif</td>
							</tr>						
						@endforeach
					@endif
				@endslot
			@endcomponent
			{{--  Pagination  --}}
			{!! $items->render() !!}
		</div>
		<div id="Error"></div>	
	</div>
@endsection

{{-- SCRIPT INCLUDES --}}
@section('scripts')
	@include('vadmin.components.bladejs')
@endsection

