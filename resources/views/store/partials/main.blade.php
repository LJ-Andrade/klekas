<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>{{ APP_BUSSINESS_NAME }} | Tienda</title>
		<!-- SEO Meta Tags-->
		<meta name="description" content="{{ APP_BUSSINESS_NAME }} | Tienda">
		<meta name="keywords" content="bruna, indumentaria, ropa, vestidos, ropa interior, lenceria, bombachas, tangas">
		<meta name="author" content="Vimana Studio">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Mobile Specific Meta Tag-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- Favicon and Apple Icons-->
		{{--  <link rel="icon" type="image/x-icon" href="favicon.ico">  --}}
		<link rel="icon" type="image/png" href="{{ asset('store-ui/images/favicon.png') }}">
		<link rel="apple-touch-icon" href="{{ asset('store-ui/images/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('store-ui/images/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('store-ui/images/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="167x167" href="{{ asset('store-ui/images/favicon.png') }}">
		<!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
		<link rel="stylesheet" media="screen" href="{{ asset('store-ui/css/vendor.min.css') }}">
		<link rel="stylesheet" media="screen" href="{{ asset('store-ui/css/iziToast.min.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/all.css') }}">
		<!-- Main Template Styles-->
		<link rel="stylesheet" media="screen" href="{{ asset('css/store-custom.css') }}">
		@yield('styles')
		<!-- Modernizr-->
		<script src="{{ asset('store-ui/js/modernizr.min.js') }}"></script>
		{!! $google_analytics !!}
	</head>
	<!-- Body-->
	<body>
		<div class="main-wrapper">
			{{-- <div id="MainOverlay" class="main-overlay"></div> --}}
			<div id="full-loader" class="full-loader Hidden">
				<div class="inner">
					<img src="{{ asset('store-ui/images/loader.gif') }}" alt="Loader">
				</div>
			</div>
			
			@yield('modal')
			{{-- @include('store.partials.topbar') --}}
			@include('store.partials.nav') {{-- ToolBar is inside this nav include --}}
			@include('store.partials.alerts')
			
			{{-- Checkout Sidebar --}}
			@include('store.partials.cart-sidebar')
			<div class="container-fluid custom-page-title pad0"> @yield('header-image') </div>
			
			{{-- Site Content --}}
			<div class="content"> @yield('content') </div>
		</div>	
			<!-- Site Footer-->
			<div class="container-fluid widgets-footer">
				<div class="row">
					<div class="col-md-4 item">
						<h4>Contacto</h4>
						<p>Guadalupe: (+54)9 11-3826-4084 <br>
						Camila: (+54)9 11-6276-1443 </p>
					</div>
					<div class="col-md-4 item">
						<h4>Redes</h4>
						<ul>
							<li><a href="https://www.facebook.com/somosklekas/" target="_blank"><i class="fab fa-facebook-f social-icons"></i></li>
							<li><a href="https://www.instagram.com/somosklekas/" target="_blank"><i class="fab fa-instagram social-icons"></i></a></li>
							{{-- <li><i class="fab fa-twitter-square"></i></li> --}}
						</ul>
					</div>
					<div class="col-md-4 item">
						{{-- <h4>Otros</h4> --}}
					</div>
				</div>
			</div>
			<footer class="site-footer">
				<div class="container">
					<p class="footer-copyright">
						© {{ date('Y') }} - Desarrollado por <a href="https://vimana.studio/es" target="_blank">&nbsp; Vimana Studio </a>
					</p>
				</div>
			</footer>

			{{-- Whats App Cta--}}
			<div class="floating-bottom-cta">
				<div class="inner">
					<a href="https://wa.me/54912121212" target="_blank"><i class="fab fa-whatsapp"></i></a>
				</div>
			</div>
		
			{{-- Back To Top Button --}}
			<a class="scroll-to-top-btn" href="#"> <i class="icon-arrow-up"></i> </a>

			{{-- Backdrop --}}
			<div class="site-backdrop"></div>

			{{-- JavaScript (jQuery) libraries, vendor and custom scripts --}}
			<script src="{{ asset('store-ui/js/vendor.min.js') }}"></script>
			<script src="{{ asset('store-ui/js/iziToast.min.js') }}"></script>
			<script src="{{ asset('store-ui/js/scripts.min.js') }}"></script>
			<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
			<script src="{{ asset('js/scripts.js') }}"></script>
			@include('store.partials.scripts')
			@yield('scripts')
			@if(isset($_GET['checkout-on']))
				<script>
					checkoutSidebar('show');
				</script>
			@endif
		
	</body>
</html>





