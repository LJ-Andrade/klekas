@extends('store.partials.main')

@section('content')
    {{-- @if(Auth::guard('customer')->check())
    <div class="CheckoutCart checkout-cart checkout-cart-floating">
        @include('store.partials.checkout-cart')
    </div>
    @endif --}}
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                @include('store.partials.profile-aside')
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 white-container">
                <h3>Órdenes realizadas</h3>
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <div class="table-responsive">
                    <table class="table table-hover margin-bottom-none">
                        <thead>
                            <tr>
                                <th>Pedido #</th>
                                <th>Fecha de Compra</th>
                                <th>Estado</th>
                                <th>Comprobante</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                    <tbody>
                    @if(!$carts->isEmpty())
                        @foreach($carts as $cart)
                            <tr>
                                <td class="text-medium">{{ $cart->id }}</td>
                                <td>{{ transDateAndTime($cart->created_at) }}</td>
                                <td>{{ orderStatusTrd($cart->status) }}</td>
                                <td class="dont-wrap">
                                    <a href="{{ url('tienda/descargar-comprobante', [$cart->id, 'download']) }}" target="_blank"><span class="btnIcon"><i class="icon-download"></i></span></a>
                                    <a href="{{ url('tienda/descargar-comprobante', [$cart->id, 'stream']) }}" target="_blank"><span class="btnIcon"><i class="icon-eye"></i></span></a>
                                </td>
                                <td>
                                    <span class="dont-wrap"><a href="{{ route('store.customerOrder', ['id' => $cart->id]) }}"> Ver</a></span>
                                </td>
                            </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td>
                                No se han realizado órdenes al momento.
                            </td>
                            <td></td><td></td><td></td><td></td><td></td>
                        </td>
                        @endif
                        </tbody>
                    </table>
                </div>
                <hr>
            @if($activeCart != null)
                <div class="row">
                    <div class="col-md-6">
                        <div class="column"><a class="btn btn-sm btn-block btn-primary" href="{{ route('store.checkout') }}"> <i class="fas fa-shopping-cart"></i> Ver carro de compras activo</a></div>
                    </div>
                    <div class="col-md-6">
                        <div class="column">
                            {!! Form::open(['route' => 'store.removeCartReturnStock', 'method' => 'POST']) !!}	
                                {{ csrf_field() }}
                                <input type="hidden" name="itemid" value="{{ $activeCart['rawdata']->id }}">
                                <button type="submit" class="btn btn-sm btn-block btn-danger">
                                    <i class="far fa-trash-alt"></i> Eliminar carro activo
                                </button>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            @endif
            </div>
		</div>
		<div id="Error"></div>
    </div>
@endsection

@section('scripts')
	@include('store.components.bladejs')
@endsection