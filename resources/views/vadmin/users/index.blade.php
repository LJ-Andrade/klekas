@extends('vadmin.partials.main')
@section('title', 'Vadmin | Usuarios')

{{-- CONTENT --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Listado de Usuarios</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('users.create') }}" class="btn btnMain"><i class="icon-plus-round"></i>  Nuevo Usuario</a>
				{{-- <button id="SearchFiltersBtn" class="btn btnMain"><i class="icon-ios-search-strong"></i></button> --}}
				@if(Auth::guard('user')->user()->role <= 2)
				{{-- Edit --}}
				<button class="EditBtn btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</button>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="users">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				@endif
				{{-- If Search --}}
				@if(isset($_GET['name']) || isset($_GET['group']) || isset($_GET['role']))
					<a href="{{ url('vadmin/users') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
					{{--  <div class="results">{{ $items->total() }} resultados de búsqueda: </div>  --}}
				@endif
			</div>
		@endslot
		@slot('searcher')
			{{-- @include('vadmin.users.searcher') --}}
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="list-wrapper">
		{{-- Test --}}
		<div id="TestBox" class="col-xs-12 test-box Hidden">
		</div>
		<div class="row">
			@component('vadmin.components.list')
				@slot('actions')
					@if(isset($_GET['name']) || isset($_GET['role']) || isset($_GET['group']))
						<a href="{{ route('vadmin.exportUsersListPdf', ['params' => http_build_query($_GET)]) }}" data-toggle="tooltip" title="Exportar a PDF"><i class="icon-file-pdf"></i></a>
						<a href="{{ route('vadmin.exportUsersListXls', ['params' => http_build_query($_GET)]) }}" data-toggle="tooltip" title="Exportar a XLS"><i class="icon-file-excel"></i></a>
					@else
						<a href="{{ route('vadmin.exportUsersListPdf', ['params' => 'all']) }}" data-toggle="tooltip" title="Exportar a PDF"><i class="icon-file-pdf"></i></a>
						<a href="{{ route('vadmin.exportUsersListXls', ['params' => 'all']) }}" data-toggle="tooltip" title="Exportar a XLS"><i class="icon-file-excel"></i></a>
					@endif
				@endslot	
				@slot('title', 'Usuarios del Sistema')
				@slot('tableTitles')
					@if(!$items->isEmpty())
						@if(Auth::guard('user')->user()->role <= 2)
						<th></th>
						@endif
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Grupo</th>
						<td>Estado</td>
					@else
						<th></th>
					@endif
				@endslot

				@slot('tableContent')
					@if(!$items->isEmpty())
						@foreach($items as $item)
							<tr> 
								@if(Auth::guard('user')->user()->role <= 2)
									<td>
										<label class="custom-control custom-checkbox list-checkbox">
											<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description"></span>
										</label>
									</td>
								@endif
								<td class="show-link"><a href="{{ url('vadmin/users/'.$item->id) }}">{{ $item->username }}</a></td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->email }}</td>
								<td>{{ roleTrd($item->role) }}</td>
								<td>{{ groupTrd($item->group) }}</td>
								<td class="w-50 pad0 centered">
									@if($item->role != '1')
									<label class="switch">
										<input class="UpdateStatus switch-checkbox" type="checkbox" 
										data-model="User" data-id="{{ $item->id }}"
										@if($item->status == '1') checked @endif>
										<span class="slider round"></span>
									</label>
									@endif
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>No se han encontrado resultados</td>
						</tr>
					@endif
				@endslot
			@endcomponent
			
			@if(isset($_GET['name']))
				{!! $items->appends(['name' => $name])->render(); !!}
			@elseif(isset($_GET['role']) || isset($_GET['group']))
				{!! $items->appends(['group' => $group])->appends(['role' => $role])->render(); !!}
			@else
				{!! $items->render(); !!}
			@endif
		</div>
		<div id="Error"></div>	
	</div>
@endsection

{{-- SCRIPT INCLUDES --}}
@section('scripts')
	@include('vadmin.components.bladejs')
@endsection
