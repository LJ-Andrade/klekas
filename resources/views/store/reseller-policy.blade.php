@extends('store.partials.main')

@section('header-image')
	<div class="index-header">
		
	</div>
@endsection

@section('content')
{{-- @if(Auth::guard('customer')->check())
<div class="CheckoutCart checkout-cart checkout-cart-floating">
    @include('store.partials.checkout-cart')
</div>
@endif --}}
<div class="container info-container">
		<div class="row">
            <div class="deco-title">
                <span>
                    <div class="deco deco-left"><img src="{{ asset('images/gral/icons/icon-deco-left.png') }}" alt="Deco"></div>
                    Política de Exclusividad
                    <div class="deco deco-right"><img src="{{ asset('images/gral/icons/icon-deco-right.png') }}" alt="Deco"></div>
                </span>
            </div>
        </div>
        <div class="row centered-text">
            <p>
                Se dará la exclusividad en la localidad o zona comercial a los clientes que realicen compras frecuentes. <br>
                Los requisitos para acceder son:
            </p>
        </div>
        <div class="row text-center">
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                <img src="{{ asset('images/gral/icons/icon-cart.png') }} " alt="Compras">
                <p>Compra inicial de <br><b>$15000</b></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                <img src="{{ asset('images/gral/icons/icon-truck.png') }} " alt="Compras">
                <p>Reposiciones mensuales por <br> <b>$10000</b></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                <img src="{{ asset('images/gral/icons/icon-shield.png') }} " alt="Compras">
                <p>Se perderá la exclusividad el mes que no se cumplan los requisitos de reposición, pudiendo recuperarla con una nueva compra inicial.</p>
            </div>
        </div>
    </div>
@endsection


