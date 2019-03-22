<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Vimana Studio"/>
    	<meta name="owner" content="{{ APP_BUSSINESS_NAME }}" />
    	<meta name="copyright" content="Copyright (c) 2018 - Vimana Studio" />
		<link rel="shortcut icon" href="{{ asset('web/img/so-logo_new.jpg') }}"><!-- Favicon -->
		<link rel="stylesheet" type="text/css" href="{{ asset('web/css/bootstrap.css') }}">
		{{-- Original Styles --}}
		<link rel="stylesheet" media="screen" href="{{ asset('css/store-custom.css') }}">
		<style>
			body {
				margin: 0
			}
		</style>
	</head>
	<body>
		@yield('content')
	</body>
</html>