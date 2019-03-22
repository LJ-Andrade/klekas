<!DOCTYPE html>
<html lang="es" data-textdirection="ltr" class="loading">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Vimana Studio">
		<title>{{ config('app.name') }}</title>
		<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logos/favicon.png') }}">
		<link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- BEGIN VENDOR CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/bootstrap.css') }}">
		<!-- font icons-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/fonts/icomoon.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/vendors/css/extensions/pace.css') }}">
		<!-- END VENDOR CSS-->
		<!-- BEGIN ROBUST CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/bootstrap-extended.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/app.css') }}">
		<!-- END ROBUST CSS-->
		
		<!-- END Page Level CSS-->
		<!-- BEGIN Custom CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/vadmin.css') }}">
		
		<!-- END Custom CSS-->
	</head>
    <body class="login-page">
        @yield('content')
    </body>
	<script>
		function closeParent(element){
			var parent = element.parentNode;
			parent.style.display = 'none';
		}
	</script>
</html>