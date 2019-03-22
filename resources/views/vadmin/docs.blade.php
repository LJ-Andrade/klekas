@extends('vadmin.partials.main')
{{-- PAGE TITLE --}}
@section('title', 'Vadmin | Documentación')
@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Documentación</li>
		@endslot
		@slot('actions')@endslot
		@slot('searcher')@endslot
	@endcomponent
@endsection

@section('content')
    <div class="documentation">
        <h1>Documentación</h1>
        <hr class="softhr">
        <h3>FAQ - Preguntas Frequentes</h3>
        <hr class="softhr">
        <h2>- ¿ Qué es una URL Amigable ? </h2>
        <p>
            Es una dirección web más comprensible para el usuario. <br>
            Proporcionan a simple vista información sobre cual es el contenido de la web a la que está apuntando. <br>
            Tiene la ventaja de ser preferidas por los buscadores para posicionar, por eso es recomendable que en esta URL se encuentra la palabra
            clave principal del contenido destino. <br>
            La URL amigable, en lo posible, no debe contener símbolos extraños y los espacios deben ser reemplazados por guiones medios (-). <br><br>
            <b>Ejemplo de URL amigables:</b> web.com/hermoso-vestido-floreado-temporada-primavera <br>
            <b>Ejemplo de URL no amigable:</b> web.com/show.php?viewsc=vestido+nosoy+amigable&user=123
        </p>
    </div>
@endsection

@section('custom_js')
	<script>
	    
    </script>
@endsection
