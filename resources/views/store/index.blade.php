@extends('store.partials.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('plugins/owl/assets/owl.carousel.min.css') }}">
@endsection

@section('header-image')
	{{-- Carousel Banner --}}
	<div class="owl-carousel">
		<img src="{{ asset('images/web/home-banner.jpg')}}" alt="Klekas Home Banner">
		<img src="{{ asset('images/web/home-banner2.jpg')}}" alt="Klekas Home Banner">
	</div>
@endsection
	
	@section('content')
	<div class="mobile-filters">
		@include('store.partials.filters-mobile')
	</div>
	{{-- @include('store.partials.filterbar') --}}
	<div id="main" class="main-container container-fluid container-fluid-1500 pad-top-0 padding-bottom-3x mb-1">
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3 pad0 hide-768">
				@include('store.partials.filter-sidebar')
			</div>
			<div id="MainContent" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				@if(!isset($_GET['checkout-on']))
					@if(isset($_GET['page']) && !isset($search) && count($_GET) == 1)
					@else
						@if(isset($search) && $search == true || count($_GET) > 0 && !isset($_GET['results']))
							<div class="results-info">
								@if($articles->count() == '1')
									1 artículo encontrado <br>
								@elseif($articles->count() == '0')
						
								@else
									Mostrando resultados de la búsqueda.
								@endif
							</div>
						@endif
					@endif
				@endif
				<!-- Products Grid -->
				<div class="row articles-container">
					@if($articles->count() == '0')
					<div class="no-articles">
						<h3>No se han encontrado artículos</h3>
					</div>
					@endif
					@foreach($articles as $article)
						<div class="col-xs-6 col-sm-6 col-md-4 article">
							<div class="inner">
								{{-- =========== Discount Badge =========== --}}
								{{-- ====================================== --}}
								@if($article->reseller_discount > 0)
									<div class="overlay-ribbon top-right-ribbon">
										<div class="text">-{{ $article->reseller_discount }}%</div>
									</div>
								@endif
								{{-- Reseller Discount --}}
								{{-- @if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->group == '3')
									@if($article->reseller_discount > 0)
										<div class="overlay-ribbon top-right-ribbon">
											<div class="triangle"></div>
											<div class="text">	%{{ $article->reseller_discount }} <br> off !!</div>
										</div> 
									@endif
								@else --}}
									{{-- Normal Customer Discount --}}
									{{-- @if($article->discount > 0)
										<div class="overlay-ribbon top-right-ribbon">
											<div class="triangle"></div>
											<div class="text">	%{{ $article->discount }} <br> off !!</div>
										</div> 
									@endif
								@endif --}}
								
								{{-- =============== Image ================ --}}
								{{-- ====================================== --}}
								<div class="image">
									{{-- @if($article->stock < $article->stockmin)
										<div class="overlay-ribbon bottom-left-ribbon">
											<div class="triangle"></div>
											<div class="text">Bajo <br>Stock</div>
										</div> 
									@endif --}}
									<img src="{{ asset($article->featuredImageName()) }}" alt="Producto del Catálogo">
									@if(Auth::guard('customer')->check())
									{{--  Check if product is in favs  --}}
									<a class="AddToFavs add-to-favs fa-icon fav-icon-nofav fav-btn
										@if(in_array($article->id, $favs['articleFavs'])) fav-icon-isfav @endif"
										data-id="{{ $article->id }}" data-toggle="tooltip" title="Agregar a Favoritos">
									</a>
									@endif
									<a href="{{ url('tienda/articulo/'.$article->id) }}">
										<div class="overlay text-center">
											<button class="btn overlay-button">Ver producto</button>
										</div>
									</a>
								</div>
								{{-- ============== Content =============== --}}
								{{-- ====================================== --}}
								{{-- =============== Footer =============== --}}
								<div class="content">
									<div class="title">
										<a class="product-title max-text"href="{{ url('tienda/articulo/'.$article->id) }}">{{ $article->name }}</a>	
									</div>
									<div class="article-price">
										<span class="price">
											@if(Auth::guard('customer')->check())
												@if(Auth::guard('customer')->user()->group == '3')
													$ {{ showPrice($article->reseller_price, $article->reseller_discount + 0) }}
												@endif
											@else
												$ {{ showPrice($article->price, $article->discount + 0) }}
											@endif
										</span>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				@if($articles->count() != '0')
				<div class="pagination-results">
					<span class="title"><b>Resultados por página:</b></span>
					<a href="{{ route('store', ['results' => '24']) }}">24</a> | 
					<a href="{{ route('store', ['results' => '96']) }}">96</a> |
					<a href="{{ route('store', ['results' => '142']) }}">142</a>
				</div>
				@endif
				{!! $articles->appends(request()->query())->render()!!}
			</div>
		</div>
	</div>
	<div id="Error"></div>
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
				navText: [
					// "<i class='fa fa-caret-left'></i>",
					// "<i class='fa fa-caret-right'></i>"
				],
				dots:true
			});
		});

	</script>
@endsection


