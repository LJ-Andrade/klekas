@extends('store.partials.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('plugins/owl/assets/owl.carousel.min.css') }}">
@endsection

@section('content')
<div id="Error"></div>
<div class="container-fluid container-fluid-1500 article-show">
    <div class="row top-article-bar">
        {{-- Top Info --}}
    </div>
    <div class="row">
        {{-- Mobile --}}
        <div class="article-images-mobile">
            <div class="owl-carousel owl-theme">
                @foreach($article->images as $image)
                    <div class="item">
                        <img src="{{ asset('webimages/catalogo/'. $image->name) }}" class="CheckCatalogImg" alt="{{ $article->name }}">
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Desktop --}}
        <div class="article-images">
			<ul>
				@if(count($article->images) > 0)
				@foreach($article->images as $image)
					<li><img src="{{ asset('webimages/catalogo/'. $image->name) }}" class="CheckCatalogImg" alt="{{ $article->name }}"></li>
				@endforeach
				@else
					<li><img src="{{ asset($article->featuredImageName()) }}" alt="{{ $article->name }}"></li>
				@endif
			</ul>
        </div>
        <div class="article-details">
            <div class="details-container">
				<div class="before-title">
					<span class="text-medium">Categoría:&nbsp;</span>
					<a class="navi-link" href="#">{{ $article->category->name }}</a>
				</div>
				<h2 class="title">{{ $article->name }}</h2>
                {{-- <div class="code"> #{{ $article->code }}</div> --}}
                <div class="price-container">
					{{-- PRICES --}}
                    @if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->group == '3')
						{{-- Reseller Price --}}	
						@if($article->reseller_discount > 0)
							<span class="price">
								<del class="original-price">$ {{ $article->reseller_price }}</del>
								&nbsp; ${{ calcValuePercentNeg($article->reseller_price, $article->reseller_discount) }}
							</span>
						@else
							<span class="h2 d-block">$ {{ $article->reseller_price }}</span>
						@endif	
						
					@else
						{{-- Normal Price --}}
						@if($article->discount > 0)
							<span class="price">
								<del class="original-price">$ {{ $article->price }}</del>
								&nbsp; ${{ calcValuePercentNeg($article->price, $article->discount) }}
							</span>
						@else
							<span class="h2 d-block">$ {{ $article->price }}</span>
						@endif
					@endif
				</div>
						
				<p class="description">{{ strip_tags($article->description) }}</p>
				<div class="item"><div class="title">Tela: <b>{{ $article->textile }}</b></div></div>
					@if(Auth::guard('customer')->check() || env('ALLOW_ANON_CHECKOUT'))
						{!! Form::open(['id' => 'AddToCartForm', 'class' => 'form-group price', 'onchange' => 'checkVariantStock()', 
							'data-route' => (url('tienda/checkVariantStock'))]) !!}
							<input type="hidden" name="article_id" value="{{ $article->id }}">
							<div class="row">
								{{-- SIZES --}}
								<div class="col-md-12 form-row attributes">
									<label class="margin-left-0 pad0" for="">Talles: </label>
									<br>
									<div class="btn-group-toggle" data-toggle="buttons">
										@foreach($sizes as $id => $name)
											<label class="SizesSelector btn button-radio-hidden btn-round">
												<input onclick="checkVariantStock()" name="size_id" value="{{ $id }}" type="radio" autocomplete="off"> {{ $name }}
											</label>
										@endforeach
									</div>
								</div>
								{{-- COLORS --}}
								<div class="col-md-12 form-row attributes">
									<label class="pad0 marg0" for="">Colores:</label>
									<br>
									<div class="btn-group-toggle" data-toggle="buttons">
										@foreach($colors as $id => $name)
											<label class="ColorsSelector btn button-radio-hidden btn-round">
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
									<div class="col-md-12 submit-article-actions">
										<div class="input-with-btn">
											@if(env('ALLOW_ANON_CHECKOUT'))
												<input id="MaxQuantity" class="form-control input-field short-input" name="quantity" type="number" 
												min="1" max="{{ $article->stock }}" value="1" placeholder="1" required>
												<input type="submit" id="AddToCartFormBtn" class="btn input-btn"" value="Agregar al carro" disabled>
											@else
												{{-- Registered customers --}}
												<input id="MaxQuantity" class="form-control input-field short-input" name="quantity" type="number" 
												min="1" max="{{ $article->stock }}" value="1" placeholder="1" required>
												<input type="submit" id="AddToCartFormBtn" class="btn input-btn"" value="Agregar al carro" disabled>
											@endif
										</div>
									</div>
								</div>
							@endif
						{!! Form::close() !!}
					@else
						<div class="item"><div class="title">Colores: 
						@foreach($colors as $id => $name)
							<b>{{ $name }}</b> @if(!$loop->last) | @endif
						@endforeach
						</div> <br></div>
						<div class="item"><div class="title">Talles: 
							@foreach($sizes as $id => $name)
								<b>{{ $name }}</b> @if(!$loop->last) | @endif
							@endforeach
							</div> <br></div>
						<a href="{{ route('customer.login') }}" class="btn input-btn"> Comprar </a>
					@endif
					<br>
				<a href="{{ url('tienda') }}" class="btn btn-light"><i class="fas fa-long-arrow-alt-left"></i> Volver a la tienda</a>
            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')
	@include('store.components.bladejs')
    <script type="text/javascript" src="{{ asset('plugins/owl/owl.carousel.min.js') }}" ></script>
	<script>
        
        $(document).ready(function(){
			$('.owl-carousel').owlCarousel({
				stagePadding: 0,
				items: 1,
				loop: true,
				margin: 0,
				singleItem: true,
				nav: false,
				dots: false,
                responsive:{
                    0:{
                        items:1
                    }
                },
				dots:true
			});
		});

		let sizes = $('.SizesSelector');
		let colors = $('.ColorsSelector');

		if(sizes.length == 1)
			sizes.click();
		if(colors.length == 1)
			colors.click();
	</script>
@endsection