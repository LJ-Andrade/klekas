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
				<h2>Productos favoritos</h2>
				<div class="padding-top-2x mt-2 hidden-lg-up"></div>
				<!-- Wishlist Table-->
				<div class="table-responsive wishlist-table margin-bottom-none">
					<table class="table">
						<thead>
							<tr>
								<th>Productos Favoritos</th>
								@if($favs['favs']->count() > '0')
								<th class="text-center"><a class="RemoveAllFromFavs btn btn-sm btn-outline-danger" data-customerid="{{ $customer->id }}" href="">Limpiar Lista</a></th>
								@endif
							</tr>
						</thead>
						<tbody>
							@if($favs['favs']->count() > '0')
								@foreach($favs['favs'] as $item)
									@if(!$item == null)
									<tr>
										<td>
											<div class="product-item">
												<a class="product-thumb" href="{{ url('tienda/articulo/'.$item->article->id) }}">
													<img class="CheckCatalogImg" src="{{ asset($item->article->featuredImageName()) }}" alt="Producto del Catálogo">
												</a>
												<div class="product-info">
													<h4 class="product-title"><a href="{{ url('tienda/articulo/'.$item->article->id) }}">
													{{ $item->article->name }}</a>
													</h4>
													<div class="text-lg text-medium text-muted">
														Tela : {{ $item->article->textile }}
													</div>
													@if($item->article->status == '0')
														<div class="dont-wrap">
															<div class="stock-title">Disponibilidad: </div>
															<div class="color-grey">No disponible</div>
														</div>
													@else
														@if($item->article->stock > 1)
															<div class="dont-wrap">
																<div class="stock-title">Disponibilidad: </div>
																<div class="color-green"> En stock</div>
															</div>
															@if(Auth::guard('customer')->check())
																{{-- <div class="small-btn-and-input">
																	{!! Form::open(['class' => 'AddToCart price']) !!}	
																		{{ csrf_field() }}
																		<input type="number" min="1" max="{{ $item->article->stock }}" name="quantity" class="quantity-input" value="1"
																		data-toggle="tooltip" data-placement="top" title="Stock máximo {{ $item->article->stock }}">
																		<input type="submit" class="input-button" value="Agregar" data-toggle="tooltip" data-placement="top" title="Stock máximo {{ $item->article->stock }}">
																		<input type="hidden" value="{{ $item->article->id }}" name="articleId">
																	{!! Form::close() !!}
																</div> --}}
															@endif
															<br>
															<a href="{{ url('tienda/articulo/'.$item->article->id) }}">
																<button class="btn btn-main-sm mt-1"> Agregar al carro</button>
															</a>
														@else
														<div class="dont-wrap">
															<div class="stock-title">Disponibilidad: </div>
															<div class="color-grey"> Sin stock</div>
														</div>
														@endif
													@endif
												</div>
											</div>
										</td>
										<td class="text-center"><a class="RemoveFromFavs remove-from-cart cursor-pointer" data-favid="{{ $item->id }}" data-toggle="tooltip" title="Remover de Favoritos"><i class="icon-cross"></i></a></td>
									</tr>
									@endif
								@endforeach
							@else 
								<tr>
									<td>
										No tiene productos favoritos al momento...
									</tr>
								</td>
							@endif
						</tbody>
					</table>
				</div>
				<hr class="mb-4">
				{{--  <label class="custom-control custom-checkbox d-block">
					<input class="custom-control-input" type="checkbox" checked><span class="custom-control-indicator"></span><span class="custom-control-description">Inform me when item from my wishlist is available</span>
				</label>  --}}
            </div>
		</div>
		<div id="Error"></div>
    </div>

@endsection

@section('scripts')
	@include('store.components.bladejs')
@endsection