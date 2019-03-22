@extends('store.partials.invoice')

@section('title', 'Comprobante | Pedido N°'.$order->id)


@section('content')
    <div class="invoice-ticket">
        <div class="header">
            <b>Comprobante de compra</b>  | Pedido N° <b>{{ $order->id }}</b>
            <div class="right">{{ transDateT($order->created_at) }}</div>
        </div>
        <div class="content">
            <div class="top-text">
                <b>Nombre y Apellido:</b> {{ $order->customer->name }} {{ $order->customer->surname }} | <b>Usuario:</b> {{ $order->customer->username }} <br>
                <b>Dirección: </b> {{ $order->customer->address }} | {{ $order->customer->geoprov->name }} | {{ $order->customer->geoloc->name }} <br>
                <b>Teléfonos: </b> {{ $order->customer->phone }} @if($order->customer->phone2) | {{ $order->customer->phone2 }} @endif<br>
                <b>E-mail: </b> {{ $order->customer->email }} <br>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Talle</th>
                        <th>Color</th>
                        <th>P.U | Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        @if($item->article != null)
                            <tr class="content">
                                <td>#{{ $item->article->code }}</td>
                                <td>{{ $item->article->name }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->color }}</td>
                                <td>$ {{ $item->final_price }} (x {{ $item->quantity }})</td>
                                <td>$ {{ number_format($item->final_price * $item->quantity, 2) }}</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class="bottom-data">
                        <td></td><td></td><td></td><td></td>
                        <td>Subtotal</td>
                        <td>$ {{ $cart['subTotal'] }}</td>
                    </tr>
                    @if($cart['orderDiscount'] > 0)
                    <tr>
                        <td></td><td></td><td></td><td></td>
                            <td>Descuento <span class="dont-break">(% {{$cart['orderDiscount']}})</span></td>
                        <td>$ - {{ $cart['discountValue'] }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td></td><td></td><td></td><td></td>
                        <td>Costo de envío</td>
                        <td>$ {{ $cart['shippingCost'] }}</td>
                    </tr>
                    <tr>
                        <td></td><td></td><td></td><td></td>
                        <td>Recargo por forma de pago <span class="dont-break">(% {{ $cart['paymentPercent'] }})</span></td>
                        <td>$ {{ calcPercent($cart['subTotal'], $cart['paymentPercent']) }}</td>
                    </tr>
                    <tr>
                        <td></td><td></td><td></td><td></td>
                        <td>TOTAL</td>
                        <td>$ {{ $cart['total'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="footer">{{ APP_BUSSINESS_NAME }}</div>
@endsection
