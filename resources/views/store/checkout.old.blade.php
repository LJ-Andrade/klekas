@extends('store.partials.main')

@section('content')
	<input id="CartId" class="form-control" type="hidden" name="cart_id" value="{{ $activeCart['rawdata']->id }}">
  	<div class="container checkout-container padding-bottom-3x mb-2 marg-top-25">
   		<div class="row">
			<div class="col-xl-9 col-lg-8">
				<h3>Carro de Compras | Checkout</h3> 
				{{-- <p>Pedido N: #{{ $activeCart['rawdata']->id }}</p> --}}
				@if(Auth::guard('customer')->user()->group == '3')
				<div class="warning"><span>Compra mínima: <b>12 unidades</b></span></div>
				@endif
				{{--------- Checkout Error Messages ----------}}
				{{-- Missing shipping method Message --}}
				@if(session('error')=='low-quantity')
					<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x">
						<span class="alert-close" data-dismiss="alert"></span>
						<strong>Para realizar compras mayorístas debe incluír al menos 12 prendas.</strong> <br>
						<span>Prendas incluídas: {{ $activeCart['totalItems'] }} </span><br>
						<span>Resta incluír: {{ $activeCart['goalQuantity'] }} </span> 
					</div>
				@endif
				{{-- Missing shipping method Message --}}
				@if(session('error')=='missing-shipping')
					<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x">
						<span class="alert-close" data-dismiss="alert"></span>
						<strong>Debe elegir un método de envío</strong> <br>
					</div>
				@endif
				{{-- Missing payment method Message --}}
				@if(session('error')=='missing-payment')
					<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x">
						<span class="alert-close" data-dismiss="alert"></span>
						<strong>Debe elegir una forma de pago</strong> <br>
					</div>
				@endif
				{{-- Incomplete Customer Data Message --}}
				@if(session('error')=='missing-data')
					<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x">
						<span class="alert-close" data-dismiss="alert"></span>
						<strong>Debe completar todos sus datos para poder realizar pedidos</strong> <br>
						<a href="{{ route('store.customer-account', array('from' => 'checkout')) }}">Completar datos</a>
					</div>
				@endif
				<div class="accordion checkout-accordion" id="checkout-accordion" role="tablist">
					<div class="card">
						<div class="card-header" role="tab">
							<h6><a href="#client-data-accordion" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" class="collapsed">Productos</a></h6>
						</div>
						<div class="collapse show" id="client-data-accordion" role="tabpanel" aria-expanded="false" style="">
							<div class="card-block">
								<div class="table-responsive shopping-cart">
									{{-- CART PRODUCTS LIST --}}
									<table class="table">
										<thead>
											<tr>
												<th>Detalle</th>
												<th>P.U.</th>
												<th>Cantidad</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@foreach($activeCart['rawdata']->items as $item)
											<tr>
												<td>
													<div class="product-item">
														<a class="product-thumb" href="{{ url('tienda/articulo/'.$item->article->id) }}">
															<img class="CheckCatalogImg" src="{{ asset('webimages/catalogo/'. $item->article->featuredImageName()) }}" alt="{{ $item->name }}">
														</a>
														<div class="product-info">
															<h4 class="product-title">
																<a href="{{ url('tienda/articulo/'.$item->article->id) }}">{{ $item->article->name }}<small>{{ $item->article->size }}</small></a>
															</h4>
															
															<span><em>Código:</em> #{{ $item->article->code }}</span>
															<span><em>Talle: @foreach($item->article->atribute1 as $atribute) {{ $atribute->name }} @endforeach</em></span>
															<span><em>Color: {{ $item->color }}</em></span>
															<span><em>Textil: {{ $item->textile }}</em></span>
														</div>
													</div>
												</td>
												{{-- Reseller Item Prices --}}
												@if(Auth::guard('customer')->user()->group == '3')
													@if($item->article->reseller_discount > 0)
														<td class="text-lg">
															<del class="text-muted">$ {{ $item->article->reseller_price }}</del><br>
															$ {{ calcValuePercentNeg($item->article->reseller_price, $item->article->reseller_discount) }}
														</td>
													@else
														<td class="text-lg">${{ $item->article->reseller_price }}</td>
													@endif
												@else
													{{-- Estandar Item Prices --}}
													@if($item->article->discount > 0)
														<td class="">
															<del class="text-muted">$ {{ $item->article->price }}</del><br>
															$ {{ calcValuePercentNeg($item->article->price, $item->article->discount) }}
														</td>
													@else
														<td class="text-lg">${{ $item->article->price }}</td>
													@endif
												@endif
												<td><input type="text" value="{{ $item->quantity }}"></td>
												{{-- REMOVE ITEMS FROM CART --}}
												<td class="text-center">
													{!! Form::open(['route' => 'store.removeFromCart', 'method' => 'POST']) !!}	
														{{ csrf_field() }}
														<input type="hidden" name="itemid" value="{{ $item->id }}">
														<input type="hidden" name="quantity" value="{{ $item->quantity }}">
														<button type="submit" class="icon-only-btn"><i class="far fa-trash-alt"></i></button>
													{!! Form::close() !!}
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="anchor" id="pago-y-envio"></div>					
					<div class="row">
					{{-- Choose Payment and Shipping --}}
						<div class="col-md-6 flex-h-100">
							<div class="card flex-h-inner">
								<div class="card-header">
									<h6>Forma de Pago y de Envío</h6>
								</div>
								<div class="card-block">
									{!! Form::open(['route' => 'store.updatePaymentAndShipping', 'id' => 'form-test', 'method' => 'POST']) !!}	
										<input type="hidden" name="id" value="{{ $activeCart['rawdata']->id }}">
										{!! Form::label('payment_method', 'Forma de pago') !!}
											<select onchange="submit()" name="payment_method_id" class="Select-Atribute form-control mb-3" placeholder="Seleccionar forma de pago">
												@if($activeCart['rawdata']->payment_method_id == null)
													<option selected disabled>Seleccione una forma de pago</option>
												@endif
											@foreach($payment_methods as $payment)
												<option  value="{{ $payment->id }}" @if($payment->id == $activeCart['rawdata']->payment_method_id ) selected @endif>
													{{ $payment->name }} @if($payment->percent > 0) - (Recargo %{{ $payment->percent }})@endif
												</option>
											@endforeach
											</select>
										{!! Form::label('shipping', 'Envío') !!}
											<select onchange="submit()" name="shipping_id" class="Select-Atribute form-control" placeholder="Seleccionar forma de pago">
												@if($activeCart['rawdata']->shipping_id == null)
													<option selected disabled>Seleccione forma de envío</option>
												@endif
											@foreach($shippings as $shipping)
												<option value="{{ $shipping->id }}" @if($shipping->id == $activeCart['rawdata']->shipping_id ) selected @endif>
													{{ $shipping->name }} @if($shipping->price > 0) - (Costo ${{ $shipping->price }})@endif
												</option>
											@endforeach
											</select>
									{!! Form::close() !!}
								</div>
							</div>
						</div>
						{{-- Discount Coupon --}}
						<div class="col-md-6 flex-h-100">
							<div class="card flex-h-inner">
								<div class="card-header" role="tab">
									<h6>Cupón de descuento</h6>
								</div>
								<div class="card-block">
									<div class="form-group">
										@if($activeCart['orderDiscount'] > 0)
										{{-- If order has claimed coupon --}}
										<div class="coupon-message">
											<div class="inner">
												<span class="small">Esta compra cuenta con un</span><br>
												<span class="big">% {{ $activeCart['rawdata']->order_discount }} de descuento !</span>
											</div>
										</div>
										@else
											<div id="CouponDiv">
												<label for="">Ingrese un número de cupón</label>
												<input id="CuponCodeInput" class="form-control" type="" name="coupon_id" value="">
												
												<div class="button-and-loader">
													<button id="CheckCoupon" class="btn btn-blue btm-sm">Ingresar</button>
													<div class="CouponLoader Hidden"><img src="{{ asset('images/gral/loader-sm.svg') }}" alt=""> Validando...</div>
													<div id="CouponValidationMessage"></div>
												</div>
											</div>
											<div id="SettedCoupon" class="coupon-message Hidden">
												<div class="inner">
													<span class="big">Cupón válido !</span>
												</div>
											</div>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Choose Shipment Method --}}
					<div class="card">
						<div class="card-header" role="tab">
							<h6><a href="#customer-data-accordion" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" class="collapsed show">Datos personales y de entrega</a></h6>
						</div>
						<div class="collapse show" id="customer-data-accordion" role="tabpanel" aria-expanded="false" style="">
							<div class="card-block">
								<p>
									<b>Nombre de Usuario:</b> {{ Auth::guard('customer')->user()->username }} <br>
									<b>Email:</b> {{ Auth::guard('customer')->user()->email }} <br>
									<b>Nombre:</b> {{ Auth::guard('customer')->user()->name }} <br>
									<b>Apellido:</b> {{ Auth::guard('customer')->user()->surname }} <br>
									<b>Teléfono:</b> {{ Auth::guard('customer')->user()->phone }} <br>
									<b>Teléfono 2:</b> {{ Auth::guard('customer')->user()->phone2 }} <br>
									<b>Dirección:</b> {{ Auth::guard('customer')->user()->address }} <br>
									<b>Código Postal:</b> {{ Auth::guard('customer')->user()->cp }} <br>
									<b>Provincia:</b> @if(!is_null(Auth::guard('customer')->user()->geoprov)) 
														{{ Auth::guard('customer')->user()->geoprov->name }}
													  @else
													  	<span class="text-danger">* Debe completar este dato</span>
													  @endif <br>
									<b>Localidad:</b> @if(!is_null(Auth::guard('customer')->user()->geoloc)) 
														{{ Auth::guard('customer')->user()->geoloc->name }}
													  @else
													  <span class="text-danger">* Debe completar este dato</span>	
													  @endif <br>
									<b>Cuit: </b>	  @if(!is_null(Auth::guard('customer')->user()->cuit))
														{{ Auth::guard('customer')->user()->cuit }}
													  @else
															@if(Auth::guard('customer')->user()->group == '3')
																<span class="text-danger">* Debe completar este dato</span>	
															@endif
													  @endif
									<a href="{{ route('store.customer-account', array('from' => 'checkout')) }}"> <h6>Editar</h6></a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="back-to-store"><a href="{{ url('tienda') }}"><i class="icon-arrow-left"></i> Volver a la tienda</a></div>
			</div>
			<!-- Sidebar -->
			<div class="col-xl-3 col-lg-4">
				@include('store.partials.checkout-aside')
			</div>
		</div>
	</div>
	<div id="Error"></div>
@endsection

@section('scripts')
	@include('store.components.bladejs')
	<script>	
		$( "form" ).on('submit', function() {
			$('#full-loader').removeClass('Hidden');
			return true;
		});

		$( "form" ).on('change', function() {
			$('#full-loader').removeClass('Hidden');
			return true;
		});
	</script>
@endsection
