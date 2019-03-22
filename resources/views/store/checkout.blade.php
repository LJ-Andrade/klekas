@extends('store.partials.main')

@section('styles')
	<style>
			.floating-bottom-cta {  
				bottom: 70px
			}
	</style>
@endsection

@section('content')
	<input id="CartId" class="form-control" type="hidden" name="cart_id" value="{{ $activeCart['rawdata']->id }}">
	{{--------- Checkout Error Messages ----------}}
	{{-- Missing shipping method Message --}}
	@if(session('error')=='low-quantity')
		<div class="alert alert-success alert-dismissible fade show text-center margin-bottom-1x">
			<span class="alert-close" data-dismiss="alert"></span>
			<span>Para realizar compras mayorístas debe incluír al menos {{ $settings->reseller_min }} prendas.</span><br>
			<span>{{ $activeCart['totalItems'] }} prendas incluídas</span> - 
			<span>Resta incluír: {{ $activeCart['goalQuantity'] }} más </span> 
		</div>
	@endif
  	<div class="container checkout-container padding-bottom-3x mb-2 marg-top-25">
		<div class="back-to-store"><a href="{{ url('tienda') }}"><i class="icon-arrow-left"></i> Volver a la tienda</a></div>
   		<div class="row">
			<div class="col-md-12">
				<h3>Carro de Compras | Checkout</h3> 
				{{-- <p>Pedido N: #{{ $activeCart['rawdata']->id }}</p> --}}
				@if(Auth::guard('customer')->user()->group == '3')
					<div class="warning">
						@if($settings->reseller_min > 0 || $settings->reseller_money_min > 0)
							<span>Compra mínima:
							
							{{-- Minimum quantity --}}
							@if($settings->reseller_min > 0)
							<b>{{ $settings->reseller_min }} unidades</b>
							@endif
							
							@if($settings->reseller_min > 0 && $settings->reseller_money_min > 0)
							o
							@endif

							@if($settings->reseller_money_min > 0)
							{{-- Minimum money GIVE ME DA MANAAAY --}}
							<b>$ {{ $settings->reseller_money_min }}</b>
							@endif
							
							</span>
						@endif
					</div>
					{{-- @if($settings->reseller_money_min > 0)
						<div class="warning"></div>
					@endif --}}
				@endif
				<div class="table-responsive shopping-cart">
					{{-- CART PRODUCTS LIST --}}
					<table class="table">
						<thead>
							<tr>
								<th>Detalle</th>
								<th>P.U.</th>
								<th>Cantidad</th>
								<th>SubTotal</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($activeCart['rawdata']->items as $item)
							<tr id="Item{{$item->id}}">
								<td>
									<div class="product-item">
										<a class="product-thumb" href="{{ url('tienda/articulo/'.$item->article->id) }}">
											<img class="CheckCatalogImg" src="{{ asset($item->article->featuredImageName()) }}" alt="{{ $item->name }}">
										</a>
										<div class="product-info">
											<h4 class="product-title">
												<a href="{{ url('tienda/articulo/'.$item->article->id) }}">
													{{ $item->article->name }}
												</a>
											</h4>
											<span><em>Código:</em> #{{ $item->article->code }}</span>
											<span><em>Talle: {{ $item->size}}</em></span>
											<span><em>Color: {{ $item->color }}</em></span>
											<span><em>Textil: {{ $item->textile }}</em></span>
										</div>
									</div>
								</td>
								{{-- Reseller Item Prices --}}
								@php($articlePrice = '0')
								@if(Auth::guard('customer')->user()->group == '3')
								<td class="text-lg dont-break">
									$ {{ $articlePrice = showPrice($item->article->reseller_price, $item->article->reseller_discount) }}
								</td>
								
								{{-- @php($articlePrice = $item->article->reseller_price) --}}
									{{-- @if($item->article->reseller_discount > 0)
										<td class="text-lg dont-break">
											@php($articlePrice = calcArticlePrice($item->article->reseller_price, $item->article->reseller_discount))
											<del class="text-muted">$ {{ $item->article->reseller_price + 0 }} </del><br>
											$ {{ $articlePrice + 0 }}
										</td>
									@else
										<td class="text-lg dont-break">$ {{ $articlePrice + 0 }}</td>
									@endif --}}
								@else
									<td>
										$ {{ $articlePrice = showPrice($item->article->price, $item->article->discount) }}
									</td>
									{{-- Estandar Item Prices --}}
									{{-- @if($item->article->discount > 0)
										<td>
											@php($articlePrice = calcArticlePrice($item->article->price, $item->article->discount))
											<del class="text-muted dont-break">$ {{ $item->article->price + 0 }}</del><br>
											$ {{ $articlePrice }}
										</td>
									@else
										@php($articlePrice = $item->article->price)
										<td class="text-lg dont-break">${{ $articlePrice + 0 }}</td>
									@endif --}}
								@endif
								{{-- Add Quantity to Cart Item --}}
								<td>
									<div class="input-with-btn input-with-btn-mobile">
										{{-- Send this data to JSON via js with .Item-Data class --}}
										<input class="Item-Data small-input under-element" name="data" type="number" 
										min="1"  max="{{ $item->quantity + $item->variant->id }}" value="{{ $item->quantity }}" placeholder="1" required="" 
										data-price="{{$articlePrice}}" data-variant="{{ $item->variant_id }}" data-id="{{ $item->id }}">
										<div class="under-input"> Stock: {{ $item->variant->stock }} </div>
									</div>
								</td>
								<td>$ <span class="{{ $item->id }}-TotalItemPrice TotalItemPrice">{{ ($articlePrice * $item->quantity) }}</span></td>
								{{-- REMOVE ITEMS FROM CART --}}
								<td class="text-center">
									<a onclick="removeFromCart('{{ route('store.removeFromCart') }}', {{ $item->id }}, {{ $item->quantity }}, '#Item'+{{ $item->id }}, 'reload');" class="icon-only-btn"><i class="far fa-trash-alt"></i></a>
									{{-- {!! Form::open(['route' => 'store.removeFromCart', 'method' => 'POST', 'class' => 'loader-on-submit']) !!}	
										{{ csrf_field() }}
										<input type="hidden" name="itemid" value="{{ $item->id }}">
										<input type="hidden" name="quantity" value="{{ $item->quantity }}">
										<button type="submit" class="icon-only-btn"><i class="far fa-trash-alt"></i></button>
									{!! Form::close() !!} --}}
								</td>
							</tr>
							@endforeach
							<tr>
								<td></td>
								<td></td>
								<td><b>SUBTOTAL</b></td>
								<td>$ <b><span class="SubTotal"></span></b></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
					<div class="text-right hide-768">
						<button type="button" class="UpdateDataBtn btn main-btn">Actualizar <i class="fas fa-sync-alt"></i></button>
						<button type="button" class="SubmitDataBtn btn main-btn">Continuar <i class="fa fa-arrow-right"></i></button>
					</div>
				<div class="back-to-store"><a href="{{ url('tienda') }}"><i class="icon-arrow-left"></i> Volver a la tienda</a></div>
			</div>{{-- / col-md-12 --}}
		</div> {{-- / Row --}}
	</div> {{-- / Container --}}
	<div id="Error"></div>
	<button type="button" class="SubmitDataBtn btn btn-block btn-bottom mobile-finish-button main-btn">
		Continuar <i class="fas fa-arrow-right"></i>
	</button>
@endsection

@section('scripts')
	@include('store.components.bladejs')
@endsection
