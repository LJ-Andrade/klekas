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
                    {{-- <div class="deco deco-left"><img src="{{ asset('images/gral/icons/icon-deco-left.png') }}" alt="Deco"></div> --}}
                    Cómo comprar <i class="fas fa-question"></i>
                    {{-- <div class="deco deco-right"><img src="{{ asset('images/gral/icons/icon-deco-right.png') }}" alt="Deco"></div> --}}
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-12 item">
                {{-- <img src="{{ asset('images/gral/icons/compra1.png') }} " alt="Compras"> --}}
                
                <p style="font-size: 1.5rem">La venta es solo mayorista <br> con un mínimo por pedido de <b class="main-color">$5000.</b></p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                <i class="fas fa-user"></i>
                <p>Para ver talles y colores de cada modelo así como para comprar debes <b>crear tu usuario e ingresar</b> al sistema.</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                <i class="far fa-clock"></i>
                <p>Los carros abiertos permanecen por <b>48 hs</b> y luego se dan de baja. No demores más de este tiempo para confirmar tu pedido o te quedarás sin stock.</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                <i class="fas fa-truck"></i>
                <p>Las opciones de pago y envío las podrás elegir antes de finalizar tu pedido. Hay varias opciones para que puedas realizar la compra a tu medida!</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                {{-- <img src="{{ asset('images/gral/icons/compra4.png') }} " alt="Compras"> --}}
                <i class="fas fa-dollar-sign"></i>
                <p>Una vez que hayas confirmado tu pedido chequeamos stock y dentro de las 48 hs te contactamos para decirte si está todo ok o si algo no está en stock. <br>
                    <span class="italic">No hagas el pago hasta ese momento!</span> </p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                {{-- <img src="{{ asset('images/gral/icons/compra5.png') }} " alt="Compras"> --}}
                <i class="fas fa-paper-plane"></i>
                <p>Luego del pago procedemos a armar tu pedido y el envío es dentro de las 48 hs siguientes.</p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 item">
                {{-- <img src="{{ asset('images/gral/icons/compra6.png') }} " alt="Compras"> --}}
                <i class="far fa-calendar-alt"></i>
                <p>Los días de despacho son Martes y Viernes por lo cual haremos tu envío lo más cercano a esas opciones. </p>
            </div>
        </div>
        {{-- <div class="row-centered lone-item">
            <div class="col-md-8 item">
                <div class="text-center">
                    <img src="{{ asset('images/gral/icons/compra7.png') }} " alt="Compras"><br>
                    <p>
                        ¡Listo! En la pantalla siguiente podrás descargar un comprobante de tu compra. Nos estaremos contactando para coordinar tu pedido. Tené en cuenta que se despacha una vez por semana, los días jueves. Una vez realizado el despacho te enviaremos la información para que
                    </p>
                </div>
            </div>
        </div> --}}
	</div>
@endsection


