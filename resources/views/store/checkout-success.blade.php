@extends('store.partials.main')

@section('content')

<div class="container padding-bottom-3x mb-2 marg-top-25">
	<div class="back-to-store"><a href="{{ url('tienda') }}"><i class="icon-arrow-left"></i> Volver a la tienda</a></div>
    <div class="row">
        <div class="content-container text-center">
            
            <div class=""></div>
            <h2> <i class="far fa-check-circle check-icon-big"></i> Compra finalizada!</h2>
            {{-- <h4>Tu pedido ya está en proceso.</h4> --}}
            <p>Código de pedido: <b>#{{ $cart->id }}</b></p>
                
            <p>Podés revisar el estado del pedido <br> en la <b><a href="{{ route('store.customer-orders') }}">"Lista de Pedidos"</a></b> desde tu perfil<br>
            
            <div class="padding-bottom-1x">
                <a class="btn btn-outline-primary btn-sm" href="{{ url('tienda/descargar-comprobante', [$cart->id, 'stream']) }}" target="_blank"><i class="icon-eye"></i> Ver Comprobante</a>
                <a class="btn btn-outline-primary btn-sm" href="{{ url('tienda/descargar-comprobante', [$cart->id, 'download']) }}" target="_blank"><i class="icon-download"></i> Descargar Comprobante</a>
            </div>
        </div>
    </div>
</div>
{{-- <div id="Error"></div> --}}
@endsection

@section('scripts')
	@include('store.components.bladejs')
    <script>
        // Prevent backbtn
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>
@endsection