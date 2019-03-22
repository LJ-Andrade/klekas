<!DOCTYPE html>
<html lang="es" data-textdirection="ltr" class="loading">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="Gestion de contenido">
		<meta name="keywords" content="">
		<meta name="author" content="Vimana Studio">
		<title>@yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
		<!-- BEGIN VENDOR CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/bootstrap.css') }}">
		<!-- font icons-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/fonts/icomoon.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/vendors/css/extensions/pace.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/bootstrap-extended.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/js/core/libraries/jquery-ui.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/core/colors/palette-gradient.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/all.css') }}">
		<!-- END VENDOR CSS-->
		<!-- BEGIN Custom CSS-->
		<!-- END Custom CSS-->
		@yield('styles')
		<link rel="stylesheet" type="text/css" href="{{ asset('css/vadmin.css') }}">
	</head>
  	<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns fixed-navbar">

		@include('vadmin.partials.nav')
		@include('vadmin.components.fullLoader')
		<div class="app-content content container-fluid">
			<div class="content-wrapper">
				<div class="container-fluid pad0">
					@yield('header')
				</div>
				@yield('top-space')
				<div class="container-fluid">
					{{-- Errors --}}
					@if(count($errors) > 0)
						<div class="alert alert-error"> 
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
							<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach		
							</ul>
						</div>
					@endif
					{{-- Messages --}}
					@if(Session::has('message'))
						<div class="alert alert-success"> 
							{{ Session::get('message') }}
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
						</div> 
					@endif
					{{-- Content --}}
					@yield('content')
				</div>	
			</div>
		</div>
		<div class="main-copyright">
			<div class="inner pull-right">
				<div class="text">Desarrollado por <a href="https://vimana.studio">Vimana Studio</a></div>
				<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank">
				<img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a>
				{{-- <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"></a> --}}
			</div>
		</div>
		<!-- BEGIN VENDOR JS-->
	</body>
	<script src="{{ asset('vadmin-ui/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/js/core/libraries/jquery-ui.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/tether.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/js/core/libraries/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/unison.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/blockUI.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
	{{-- <script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/screenfull.min.js') }}" type="text/javascript"></script> --}}
	<script src="{{ asset('vadmin-ui/app-assets/vendors/js/extensions/pace.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vadmin-ui/app-assets/js/core/app.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/vadmin-ui.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/vadmin-functions.js') }}" type="text/javascript"></script>
	@include('vadmin.components.appjs')
	@yield('scripts')
	<script>
		
		let count = 0;
		setInterval(function(){
			count++;
			let dots = new Array(count % 10).join('.');
			document.getElementById('LoadingText').innerHTML = "." + dots;
		}, 1000);
		
		// Check If Img Is Broken and replace with default img 
		// Add ".CheckImg" ass Class in any Img to add this function
		// $('.CheckImg').on('error', function(){
		// 	var defaultImg = "{{ asset('images/users/default.jpg') }}"
		// 	$(this).attr('src', defaultImg);
		// });

		$('.BtnLoader').click(function(){
			let loadertext = $(this).data('loadertext');
			let svg  = "<img src='{{ asset('images/gral/loader-sm.svg') }}'>";
			$(this).html(svg + ' ' + loadertext);
		});
		
		let allowEnterOnForms = false;	
	</script>
	@yield('custom_js')
</html>
