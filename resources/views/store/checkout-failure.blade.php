@extends('store.partials.main')

@section('content')

<div class="container padding-bottom-3x mb-2 marg-top-25">
	<div class="back-to-store"><a href="{{ url('tienda') }}"><i class="icon-arrow-left"></i> Volver a la tienda</a></div>
    <div class="row">
        <div class="container padding-bottom-3x mb-2">
            <div class="card text-center">
                <div class="card-block padding-top-2x">
                    <h2 class="card-title">El pago fue rechazado</h2>
                    <h4 class="card-text">Tu compra quedará abierta para que pueda elegir otro medio de pago.</h4>
                    <div class="short-divisor"><div class="inner"></div></div>
                    
                    <div class="padding-top-1x padding-bottom-1x">
                        {{-- <a class="btn btn-outline-primary btn-sm" href="{{ url('tienda/descargar-comprobante', [$cart->id, 'stream']) }}" target="_blank"><i class="icon-eye"></i> Ver Comprobante</a> --}}
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('store.processCheckout') }}" target="_blank"><i class="icon-arrow-left"></i> Volver al Checkout</a>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<div id="Error"></div>
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
