<!-- Navbar-->
<!-- Remove ".navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="navbar navbar-sticky">
	<ul class="nav navbar-nav left-nav-items">
		{{-- <li><a href="{{ url('como-comprar') }}"><i class="far fa-question-circle"></i> Cómo comprar?</a></li> --}}
		{{-- If you want to center this, move outide UL --}}
		<div class="site-branding">
			<!-- Site Logo-->
			<a href="{{ url('/') }}">
				<img src="{{ asset('webimages/web/app-logo.png') }}" alt="Augustamoi">
			</a>
		</div>
	</ul>
	<!-- Main Navigation-->
	@include('store.partials.userbar')
</header>
<div class="under-nav-container">
	@if(!Auth::guard('customer')->check())
		<div class="login-register-btn-mobile">
			<a href="{{ route('customer.login') }}"><button class="btn btn-primary btn-main-sm-hollow">Ingresar</button></a>
			<a href="{{ url('tienda/registro') }}"><button class="btn btn-primary btn-main-sm">Registrarse</button></a>
		</div>
	@endif
	{{-- <div class="text-links"> --}}
		{{-- {{-- @if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->group == '3' ) --}}
		{{-- <a href="{{ url('politica-de-exclusividad') }}">Política de Exclusividad</a> --}}
		{{-- <a href="{{ url('condiciones-de-compra') }}">Condiciones de Compra</a> --}}
		{{-- @endif --}}
	{{-- </div> --}}
</div>
