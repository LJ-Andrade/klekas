@extends('vadmin.partials.main')
@section('title', 'Vadmin | Mensajes')
{{-- STYLE INCLUDES --}}
@section('styles')
@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Mensajes Recibidos</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button> 
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="stored_contacts">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				{{-- If Search --}}
				
				{{--  @if(isset($_GET['title']) || isset($_GET['category']))
				<a href="{{ url('vadmin/portfolio') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
				<div class="results">{{ $articles->total() }} resultados de búsqueda</div>
				@endif  --}}
			</div>
		@endslot
		@slot('searcher')
			 @include('vadmin.contact.searcher') 
		@endslot
	@endcomponent
@endsection


{{-- CONTENT --}}
@section('content')
	<div class="list-wrapper">
		{{-- Test --}}
		<div id="TestBox" class="col-xs-12 test-box Hidden">
		</div>
		<div class="row">
			@component('vadmin.components.list')
				@slot('actions', '')
				@slot('title', 'Mensajes Recibidos')
				@if(count($items) > '0')
					@slot('tableTitles')
						<th class="w-20"></th>
						<th>Nombre</th>
						<th>E-Mail</th>
						<th>Teléfono</th>
						<th>Mensaje</th>
						<th style="min-width: 160px">Estado</th>
						<th></th>
						<th>Fecha</th>
					@endslot

					@slot('tableContent')
						@foreach($items as $item)
							<tr>
								<td class="w-20">
									<label class="custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
								<td class="show-link max-text"><a href="{{ url('vadmin/mensajes_recibidos/'.$item->id) }}"> {{ $item->name }} </a></td>
								<td>{{ $item->email }}</td>
								<td>{{ $item->phone }}</td>
								<td class="max-text">{{ $item->message }}</td>
								<td>
									{!! Form::select('category_id', ['0' => 'No Leído', '1' => 'Leído', '2' => 'En proceso', '3' => 'Finalizado'],
									 $item->status, ['class' => 'form-control Select-Chosen updateStatusMultiple', 'data-id' => $item->id]) !!}
								</td>
								<td>{{ $item->user }}</td>
								<td>{{ transDateAndTime($item->created_at) }}</td>
							</tr>						
						@endforeach
					@endslot
				@else
					@slot('tableTitles')
						<th></th>
					@endslot
					@slot('tableContent')
						<tr>
							<td class="w-20">No hay mensajes</td>
						<tr>
					@endslot
				@endif
			@endcomponent
			
			{{--  @if(isset($_GET['name']))
				{!! $items->appends(['name' => $name])->render(); !!}
			@elseif(isset($_GET['role']) || isset($_GET['group']))
				{!! $items->appends(['group' => $group])->appends(['role' => $role])->render(); !!}
			@else
			@endif  --}}
			{!! $items->render(); !!}
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
		$(document).on('change', '.updateStatusMultiple', function(e) {
			var id = $(this).data('id');
			var status = $(this).val();
			var action = function(){
				location.reload();
			}
			
			var model = 'Contact';
			updateStatusMultiple(id, model, status, action);

		});

	</script>
@endsection