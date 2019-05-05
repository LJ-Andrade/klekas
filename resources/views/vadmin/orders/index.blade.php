@extends('vadmin.partials.main')
@section('title', 'Vadmin | Pedidos')
{{-- STYLE INCLUDES --}}
@section('styles')
@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Listado de pedidos</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('orders.create') }}" class="btn btnMain">Cargar Pedido</a>
				<button id="SearchFiltersBtn" class="btn btnMain"><i class="icon-ios-search-strong"></i></button>
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="carts">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.orders.searcher')
		@endslot
	@endcomponent
@endsection

{{-- CONTENT --}}
@section('content')
	<div class="list-wrapper">
		{{-- Search --}}
		<div class="row">
			{{-- Active Orders Message --}}
			@if(app('request')->input('show') == 'Active')
			<h1>Pedidos en proceso</h1>
			<p>
				Estos son los pedidos que se están realizando los usuarios en este momento. <br>
				Aún no han sido confirmados.
			</p>	
			@endif
			{{-- List --}}
			@component('vadmin.components.list')
				@slot('actions', '')
				@slot('title', 'Pedidos')
					@if($items->count() == '0')
						@slot('tableTitles')
						<th>No se han encontrado pedidos</th>
						@slot('tableContent', '')
					@else
					@slot('tableTitles')
						<th>
							<label class="custom-control custom-checkbox list-checkbox">
								<input type="checkbox" class="Select-All-To-Delete custom-control-input row-checkbox">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description"></span>
							</label>
						</th>
						<th>N°</th>
						<th>Cliente</th>
						<th>Método de Pago</th>
						<th>Estado de pago</th>
						<th>Estado de pedido</th>
						<th>Items</th>
						<th>Totals</th>
						<th>Fecha</th>
						<th></th>
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
								<td class="w-50 show-link"><a href="{{ url('vadmin/orders/'.$item->id) }}">#{{ $item->id }}</a></td>
								<td class="show-link max-text">
									@if($item->customer)
									<a href="{{ url('vadmin/customers/'.$item->customer_id) }}">
										{{ $item->customer->name }} {{ $item->customer->surname }} ({{ $item->customer->username }})
									</a>
									@else
										@if($item->anon_data)
											{{ json_decode($item->anon_data)->email }}
										@else
											Cliente anónimo
										@endif
									@endif
								</td>
								<td>
									@if($item->payment_method_id != null)
									{{ $item->payment->name }}
									@else
									No seleccionado
									@endif
								</td>
								<td>
									<div class="input-group"> 
										{!! Form::select('group', 
										[ '0' => 'Pendiente', '1' => 'Acreditado', '2' => 'En proceso', '3' => 'Rechazado'], 
										$item->payment_status, ['class' => 'form-control custom-select minWidth150', 
										'onChange' => "updateCartStatus(this, this.dataset.id, this.dataset.field)", 'data-field' => 'payment_status', 'data-id' => $item->id]) !!}
									</div>
								</td>
								<td class="w-200">
									<div class="input-group"> 
										{!! Form::select('group', 
										[ 'Active' => 'Activo', 'Process' => 'Esperando Acción', 'Approved' => 'Aprobado', 'Canceled' => 'Cancelado', 'Finished' => 'Finalizado'], 
										$item->status, ['class' => 'form-control custom-select minWidth150', 'onChange' => 'updateCartStatus(this, this.dataset.id)', 'data-id' => $item->id]) !!}
									</div>
								</td>
								@php
									$count = '0';
									foreach($item->items as $sum)
									$count += $sum->quantity;
									@endphp
								<td>{{ $count }}</td>
								<td>	
									@php
										$totalPrice = '0';
										foreach($item->items as $unit)
											$totalPrice += $unit->final_price * $unit->quantity;
										
										$totalPrice += calcPercent($totalPrice, $item->payment_percent) + $item->shipping_price;
										echo '$ '. $totalPrice;
										unset($totalPrice);
									@endphp
								</td>
								<td class="w-200">{{ transDateT($item->created_at) }}</td>
								{{-- EXPORTS --}}
								<td class="w-50">
									@if($item->status != 'Active')
									<a href="{{ url('vadmin/exportOrderCsv', [$item->id]) }}" class="icon-container green" target="_blank" data-toggle="tooltip" title="Exportar .CSV">
										<i class="fas fa-file-excel"></i>
									</a>
									<a href="{{ url('vadmin/exportOrderXls', [$item->id]) }}" class="icon-container blue" target="_blank" data-toggle="tooltip" title="Exportar .XLS">
										<i class="fas fa-file-excel"></i>
									</a>
									<a href="{{ url('vadmin/descargar-comprobante', [$item->id, 'download']) }}" class="icon-container red" target="_blank" data-toggle="tooltip" title="Exportar .PDF">
										<i class="fas fa-file-pdf"></i>
									</a>
									@endif
									<a href="{{ url('vadmin/orders/'.$item->id) }}" class="icon-container black" data-toggle="tooltip" title="Detalle del pedido">
										<i class="fas fa-eye"></i>
									</a>
								</td>
							</tr>						
						@endforeach
					@endif
				@endslot
				@endcomponent
			</div>
			{{--  Pagination  --}}
		{{-- {!! $items->render() !!} --}}
		<div id="Error"></div>	
	</div>
@endsection

{{-- SCRIPT INCLUDES --}}
@section('scripts')
	@include('vadmin.components.bladejs')
@endsection

