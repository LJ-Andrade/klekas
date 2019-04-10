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

<div class="container">
    <div class="row section-about-us">
        <div class="col-md-6 ">
            <img src="{{ asset('images/web/about-us.jpg') }}" alt="About Us">
        </div>
        <div class="col-md-6">
            <h2>Quienes Somos</h2>

            <hr>
            <br>
            <p>Hola! somos <b>Guada y Cami</b>, amigas y diseñadoras textiles recibidas de la UBA. 
                En el año 2012 arrancamos con este proyecto que hoy es somos Klekas. 
                Nos dedicamos a diseñar y fabricar tejidos confeccionados con materiales muy nobles y suaves. 
                Cuando creamos pensamos en un producto que sea funcional, 
                que quede canchero en distintos ámbitos y que se pueda usar en infinidad de colores. 
                Nos inspiramos en viajes, fotos, pinturas, mujeres, la calle y el día a día. <br><br>

            También nos encargamos de hacer producto terminado y colaboraciones para otras marcas. <br><br>
            Nuestro mail de contacto es: <b>somosklekas@gmail.com</b> <br><br>

            Ojalá les guste la nueva temporada; la realizamos con amor y dedicación!


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
				navText: [
					// "<i class='fa fa-caret-left'></i>",
					// "<i class='fa fa-caret-right'></i>"
				],
				dots:true
			});
		});

	</script>
@endsection


