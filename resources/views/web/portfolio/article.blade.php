@extends('layouts.web.main')


@section('title', 'Vimana Studio '. $article->title)

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ secure_asset('plugins/swiper-slider/swiper.min.css') }}">
@endsection	

@section('content')
	<div id="ActualSection" data-section="portfolio"></div> {{-- JS - This Section --}}
    <div class="container container-top single-item">
        <div class="row">	
			<h1>{!! $article->title !!}</h1>

			<div class="col-md-6">
			<!-- Slider main container -->
				<div class="swiper-container">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						{{-- Show generic Image if img not exist --}}
						@if(count($article->images) == 0)
							<div class="swiper-slide"><img src="{{ secure_asset('webimages/gen/article-gen.jpg') }}" class="slider-image"></div>
						@else 
							@foreach($article->images as $image)
							<div class="swiper-slide"><img src="{{ secure_asset('webimages/portfolio/'.$image->name ) }}" class="slider-image"></div>
							@endforeach
						@endif
					</div>
					<!-- Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Navigation buttons -->
					<div class="swiper-button-prev"><i class="ion-ios-arrow-left"></i></div>
					<div class="swiper-button-next"><i class="ion-ios-arrow-right"></i></div>
					<!-- Scrollbar -->
					<div class="swiper-scrollbar"></div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="content">
					<p>{!! $article->content !!}</p>
				</div>
				<hr>
			</div>
        </div>
            	
        <div class="row pull-right">
			<div class="info">
				<span class="title">Categoría: </span>
				<a href="{{ route('web.search.category', $article->category->name ) }}">
					<span class="badge badgeRed">{!! $article->category->name !!}</span>
				</a>
				 | 
				<span class="title">Tags: </span>
				@foreach($article->tags as $tag)
					<a href="{{ route('web.search.tag', $tag->name ) }}"><span class="badge badgeBlue">{!! $tag->name !!}</span></a>
				@endforeach
			</div>
		</div>
		<div class="date">
    		<span class="text"><i class="ion-ios-clock-outline"></i>  {{ $article->created_at->diffForHumans() }}</span>
    	</div>
    </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{secure_asset('plugins/swiper-slider/swiper.jquery.min.js')}}"></script>
@endsection

@section('custom_js')
    <script type="text/javascript">
		$('body').addClass('portfolio-body');
	
		var mySwiper = new Swiper ('.swiper-container', {
			// Optional parameters
			direction: 'horizontal',
			loop: true,
			autoHeight: true,
			
			// If we need pagination
			pagination: '.swiper-pagination',
			
			// Navigation arrows
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			
			// And if we need scrollbar
			scrollbar: '.swiper-scrollbar',
		});    
    </script>
@endsection