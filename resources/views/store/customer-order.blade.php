@extends('store.partials.main')

@section('content')
    {{-- @if(Auth::guard('customer')->check())
    <div class="CheckoutCart checkout-cart checkout-cart-floating">
        @include('store.partials.checkout-cart')
    </div>
    @endif --}}
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row">
            <div class="container white-container padding-bottom-3x mb-1">
                <h2>Pedido N° {{ $cart['rawdata']->id }}</h2>
                Estado:  {{ orderStatusTrd($cart['rawdata']->status) }}
                <!-- Shopping Cart-->
                <div class="table-responsive shopping-cart">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Detalle</th>
                                <th class="text-center">P.U.</th>
                                <th class="text-center">Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{--  Calc  Order Total Value  --}}
                            @foreach($cart['rawdata']->items as $item)
                                <tr id="Detail{{$item->id}}">
                                    <td>
                                        <div class="product-item"><a class="product-thumb" href="{{ url('tienda/articulo/'.$item->article->id) }}">
                                            <img class="CheckCatalogImg" src="{{ asset($item->article->featuredImageName() ) }}" alt="{{ $item->name }}"></a>
                                            <div class="product-info">
                                                <h4 class="product-title"><a href="{{ url('tienda/articulo/'.$item->article->id) }}">{{ $item->article->name }}</a></h4>
                                                <span><b>Código:</b> #{{ $item->article->code }}</span>
                                                <span><b>Categoría:</b> {{ $item->article->category->name}}</span>
                                                <span><b>Tela:</b> {{ $item->article->textile }}</span>
                                                <span><b>Color:</b> {{ $item->article->color }}</span>
                                                <span><b>Talle:</b> 
                                                    @foreach($item->article->atribute1 as $size)
                                                        {{ $size->name }}
                                                    @endforeach
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $item->final_price }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->final_price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td><td></td>
                                <td><b>SubTotal: </b></td>
                                <td>$ {{ $cart['subTotal'] }} </td>
                                <td></td>
                            </tr>
                            @if($cart['orderDiscount'] > 0)
                            <tr>
                                <td></td><td></td>
                                <td><b>Descuento: </b> <span class="dont-break">% {{$cart['orderDiscount']}}</span></td>
                                <td>$ - {{ $cart['discountValue'] }}</td>
                                <td></td>
                            </tr>
                            @endif
                            <tr>
                                <td></td><td></td>
                                <td><b>Método de pago:</b> {{ $cart['rawdata']->payment->name }} <span class="dont-break">(% {{$cart['rawdata']->payment->percent }})</span></td>
                                <td>$ {{ $cart['paymentCost'] }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td><td></td>
                                <td><b>Envío: </b>{{ $cart['rawdata']->shipping->name }} <span class="dont-break">($ {{$cart['rawdata']->shipping->price }})</span></td>
                                <td>$ {{ $cart['shippingCost'] }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td><td></td>
                                <td><b>TOTAL:</b></td>
                                <td><h3>$ {{ $cart['total'] }}</h3></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="shopping-cart-footer">
                    <div class="column">
                        <a class="btn btn-outline-secondary" href="{{ route('store') }}"><i class="icon-arrow-left"></i>&nbsp;Volver a la tienda</a>
                    </div>
                    <div class="column">
                        <a class="btn btn-primary" href="{{ url('tienda/descargar-comprobante', [$cart['rawdata']->id, 'download']) }}" target="_blank"><i class="fas fa-download"></i> Descargar Comprobante</a>
                        <a class="btn btn-primary" href="{{ url('tienda/descargar-comprobante', [$cart['rawdata']->id, 'stream']) }}" target="_blank"><i class="fas fa-file-pdf"></i> Ver Comprobante</a>
                    </div>
                </div>
            </div>
		</div>
		<div id="Error"></div>
    </div>

@endsection

@section('scripts')
	@include('store.components.bladejs')
@endsection