@extends('vadmin.partials.main')
{{-- PAGE TITLE --}}
@section('title', 'Vadmin | Sobre Vadmin')
@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Sobre Vadmin</li>
		@endslot
		@slot('actions')@endslot
		@slot('searcher')@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row content-body">
        <section class="card">
            <div class="card">
                <div class="card-block">
                    <div class="documentation">
                        <h3><i class="icon-fast-forward2"></i> ¿ Qué es <b>VADMIN</b> ?</h3>
                        <p> 
                            Vadmin es un gestor de contenido y administración para empresas desarrollado por <b><a href="https://vimana.studio" style="color: blue">Vimana Studio.</a></b>  <br>
                            Potenciado por la tecnología de <b>Laravel</b> asegura un alto nivel de seguridad.
                        </p>
                        <hr class="softhr">
                        <h3><i class="icon-fast-forward2"></i>  ¿ Qué puede hacer <b>VADMIN</b> ?</h3>
                        <p>
                            - Gestionar los productos de una <b>TIENDA ONLINE</b>. </br>
                            - Gestionar el contenido de secciones <b>de una WEB</b>. </br>
                            - Gestionar contenido público (listados de precios, información, etc). </br>
                            - Contenido disponible para <b>distintos tipos de visitantes</b> (Mayorístas, minorístas, etc.).</br>
                            - Registro de <b>Usuarios y Administradores</b> con distintos permisos.  </br>
                            - <b>Recibir mensajes</b> de formularios y administrarlos. </br>
                            - Gestionar <b>stock</b> de items. </br>
                            - Generar <b>listados.</b> </br>
                            - Exportar e importar <b>archivos XLS</b> (Excel). </br>
                            - Exportar a <b>PDF</b>. </br>
                            - Enviar mails con <b>reportes o alertas</b>. </br>
                            - Dispone buscadores en todas las secciones. </br>
                            - Conexiones con sistemas externos. </br>
                        </p>
                        <hr class="softhr">
                        <h3><i class="icon-fast-forward2"></i>  ¿ Dónde se puede usar <b>VADMIN</b> ?</h3>
                        <p>
                            - <b>Donde sea que haya una conexión a internet.</b> </br>
                            - <b>En cualquier dispositivo</b> que pueda mostrar una página web (Celulares, Pcs de escritorio, tablets, notebooks, laptops. etc.) </br>
                            - La interfaz se acomoda automáticamente alineando el contenido en columnas, si es necesario, para una mejor lectura y usabilidad.
                        </p>
                        <hr class="softhr">
                        <h3> <i class="icon-fast-forward2"></i> ¿ Eso es <b>todo</b> ?</h3>
                        <p>
                            <b>Por supuesto que <b>no...</b></b><br>
                            Desarrollamos secciones personalizadas <b>pensadas junto con el cliente.</b> <br>
                            Cada sección puede tener <b>una funcionalidad o cubrir una necesidad específica.</b> <br><br>
                            <b>Es posible desarrollar:</b> <br>
                            - Secciones para utilizar como herramienta de trabajo. <br>
                            - Secciones para recoger estadísticas. <br>
                            - Secciones de administración interna. <br>
                            - etc. <br><br>
                            
                            <b>Estas secciones a su vez admiten funcionalidades especiales</b><br>
                            - Calcular precios según cotización de distintas monedas <br>
                            - Calcular precios basados en distintos factores o tipos de usuario. <br>
                            - Realizar cálculos complejos. <br>
                            - Realizar fórmulas. <br>
                            - Buscadores y filtrado de datos. <br>
                            - etc.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('custom_js')
	<script>
	    $('.DocsLi').addClass('active');
    </script>
@endsection
