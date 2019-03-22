@extends('store.partials.main')

@section('content')
{{--@if(Auth::guard('customer')->check())
 <div class="CheckoutCart checkout-cart checkout-cart-floating">
    @include('store.partials.checkout-cart')
</div> 
@endif--}}
<div class="container padding-bottom-3x mb-1 marg-top-25">
	<div class="row product-show">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-xl-6 col-xs-pull-12 image">
			{{-- Title Mobile --}}
			<div class="title-mobile">
				<span class="text-medium">Categoría:&nbsp;</span>
				<a class="navi-link" href="#">{{ $article->category->name }}</a>
				{{--  Article Name  --}}
				<h2 class="text-normal">{{ $article->name }}</h2>
			</div>
			<a href="{{ url('tienda') }}" class="top-action">
				<button  class="btn btn-main-sm">
					<i class="icon-arrow-left"></i>&nbsp;Volver a la tienda
				</button>
			</a>
			<div class="row product-gallery">
				<div class="col-xs-12 col-sm-3 col-md-3 pad0">
					<ul class="product-thumbnails">
						@foreach($article->images as $image)
						<li>
							<a href="#{{ $image->id }}">
									<img src="{{ asset('webimages/catalogo/'. $image->name) }}" class="CheckCatalogImg" alt="Producto Bruna">
								</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-9 images-container pad0">
						<div class="gallery-wrapper">
							@foreach($article->images as $index => $image)
							<div class="gallery-item {{ $index == 0 ? 'active' : '' }}">
							<a href="{{ asset('webimages/catalogo/'. $image->name) }}" data-hash="{{ $image->id }}" data-size="500x750"><i class="icon-zoom-in"></i></a>
						</div>
						@endforeach
					</div>
					<div class="product-carousel owl-carousel">
						@if(!$article->images->isEmpty())
						@foreach($article->images as $image)
						<div data-hash="{{ $image->id }}"><img class="CheckCatalogImg" src="{{ asset('webimages/catalogo/'. $image->name) }}" alt="Product"></div>
						@endforeach
						@else
						<img src="{{ asset($article->featuredImageName()) }}" class="CheckCatalogImg" alt="Producto del Catálogo">
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="padding-top-2x hidden-md-up"></div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 col-xl-6 products-details">
			{{-- Favs --}}
			<div class="fav-container">
				@if(Auth::guard('customer')->check())
					<a class="AddToFavs fa-icon fav-icon-nofav @if($isFav) fav-icon-isfav @endif"
					data-id="{{ $article->id }}" data-toggle="tooltip" title="Agregar a Favoritos">
					</a>
					@else
					<a href="{{ url('tienda/login') }}" class="fa-icon fav-icon-nofav"></a>
				@endif
			</div>
			{{-- Title Desktop --}}
			<div class="title-desktop">
				<span class="text-medium">Categoría:&nbsp;</span>
				<a class="navi-link" href="#">{{ $article->category->name }}</a>
				{{--  Article Name  --}}
				<h2 class="text-normal">{{ $article->name }}</h2>
				<div class="mb-3"> #{{ $article->code }}</div>
			</div>
			{{-- PRICE --}}
			@if($article->reseller_discount > 0)
				DESCUENTO % {{ $article->reseller_discount }}!!
				<span class="h2 d-block">
					<del class="text-muted text-small">$ {{ $article->reseller_price }}</del>
					&nbsp; ${{ calcValuePercentNeg($article->reseller_price, $article->reseller_discount) }}
				</span>
			@else
				<span class="h2 d-block">$ {{ $article->reseller_price }}</span>
			@endif
			{{-- Article Description --}}
			<p>{{ strip_tags($article->description) }}</p>
			<div class="item"><div class="title">Tela: <b>{{ $article->textile }}</b></div> <br></div>
			@if(Auth::guard('customer')->check())
			<div class="row">
				<div class="col-sm-12 descriptions">
					{!! Form::open(['id' => 'AddToCartForm', 'class' => 'form-group price', 'onchange' => 'checkVariantStock()', 
					'data-route' => (url('tienda/checkVariantStock')) ]) !!}
						<input type="hidden" name="article_id" value="{{ $article->id }}">
						<div class="row">
							{{-- AUGUSTA --}}
							{{-- <div class="col-xs-4 col-sm-4 col-md-4">
								<div class="form-group">
									<select name="color_id" class="form-control" placeholder="Color" required>
										<option value="" selected disabled>Color</option>
										@foreach($colors as $id => $name)
											<option value="{{ $id }}">{{ $name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4">
								<div class="form-group">
									<select name="size_id" class="form-control" placeholder="Talle" required>
											<option selected disabled>Talle</option>
										@foreach($sizes as $id => $name)
											<option value="{{ $id }}">{{ $name }}</option>
										@endforeach
									</select>
								</div>
							</div> --}}
							{{-- <div class="col-xs-4 col-sm-4 col-md-4">
								<div class="form-group">
									{!! Form::number('quantity', null, ['id' => 'MaxQuantity', 'class' => 'form-control', 'min' => '0', 'required' => '', 'placeholder' => 'Cantidad']) !!}
								</div>
							</div> --}}
							{{-- SIZES --}}
							<div class="col-md-12 form-row">
								<label class="margin-left-0 pad0" for="">Talles: </label>
								<br>
								<div class="btn-group-toggle" data-toggle="buttons">
									@foreach($sizes as $id => $name)
										<label class="SizesSelector btn button-radio-hidden">
											<input onclick="checkVariantStock()" name="size_id" value="{{ $id }}" type="radio" autocomplete="off"> {{ $name }}
										</label>
									@endforeach
								</div>
							</div>
							{{-- COLORS --}}
							<div class="col-md-12 form-row">
								<label class="pad0 marg0" for="">Colores:</label>
								<br>
								<div class="btn-group-toggle" data-toggle="buttons">
									@foreach($colors as $id => $name)
										<label class="ColorsSelector btn button-radio-hidden">
											<input onclick="checkVariantStock()" name="color_id" value="{{ $id }}" 
											type="radio" autocomplete="off"> {{ $name }}
										</label>
									@endforeach
								</div>
							</div>
						</div>
						@if($article->status != 1)
						<div class="row">
							<span class="action-info-container">
								Este artículo no está disponible al momento
							</span>
						</div>
						@else
						<div class="row">
							{{-- Display Remaining Stock --}}
							<span class="AvailableStock action-info-container"></span>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="input-with-btn">
									<input id="MaxQuantity" class="form-control input-field short-input" name="quantity" type="number" 
									min="1" max="{{ $article->stock }}" value="1" placeholder="1" required>
									<input type="submit" id="AddToCartFormBtn" class="btn input-btn"" value="Agregar al carro" disabled>
								</div>
							</div>
						</div>
						@endif
					{!! Form::close() !!}
				</div>
			</div>
			@else
			<div class="item"><div class="title">Talles: <b>@foreach($colors as $name) {{ $name }} @if(!$loop->last) | @endif @endforeach</b></div> <br></div>
			<div class="item"><div class="title">Colores: <b>@foreach($sizes as $name) {{ $name }} @if(!$loop->last) | @endif @endforeach</b></div> <br></div>
			@endif
			
		</div>
	</div>
</div>
	
<!-- Photoswipe container // This Shows Big Image Preview -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="pswp__bg"></div>
	<div class="pswp__scroll-wrap">
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>
		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
				<button class="pswp__button pswp__button--share" title="Share"></button>
				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
				<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
			</div>
			<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
			<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>
		</div>
	</div>
</div>
<div id="Error"></div>
@endsection

@section('scripts')
	@include('store.components.bladejs')

	<script>
		let sizes = $('.SizesSelector');
		let colors = $('.ColorsSelector');

		if(sizes.length == 1)
			sizes.click();
		if(colors.length == 1)
			colors.click();
	</script>
@endsection