@extends('vadmin.partials.main')

@section('title', 'Vadmin | Previsualización')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('payments.index')}}">Métodos de envío</a></li>
            <li class="breadcrumb-item active">{{ $item->name }} <b></b></li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                </b><h1>Método de Envío</h1>
            @endslot
            @slot('content')
                <b>Nombre: </b>{!! $item->name !!}</p>
                <b>Descripción: </b>{!! $item->description !!}</p>
                <b>Tiempo de entrega: </b>{!! $item->delivery_time !!}</p>
                <b>Costo: </b>{!! $item->price !!}</p>
				<hr class="softhr">
				<br>
				<a href="{{ url('vadmin/shippings/'.$item->id.'/edit') }}" class="btn btnGreen"><i class="icon-pencil2"></i> Editar método de envío</a> 
        	@endslot
        @endcomponent
    </div>
@endsection

@section('scripts')
@endsection

