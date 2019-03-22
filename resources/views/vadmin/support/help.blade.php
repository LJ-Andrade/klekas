@extends('vadmin.partials.main')
{{-- PAGE TITLE --}}
@section('title', 'Vadmin | Documentación')
@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Soporte Técnico</li>
		@endslot
		@slot('actions')@endslot
		@slot('searcher')@endslot
	@endcomponent
@endsection

@section('content')
    <div class="documentation">
        <h1>Soporte Técnico</h1>
        <hr class="softhr">
        <div class="row col-md-12">
            <div class=" card">
                <div class="card-header">
                    <h2 class="" id="basic-layout-card-center">Estamos para atender cualquier duda o problema.</h2>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <div class="card-text">
                            <p>
                                Detallenos el evento y nos pondremos en contacto lo antes posible.
                            </p>
                        </div>
                        <form class="form" action="{{ route('vadmin.sendSupportMail') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="eventRegInput1">Nombre</label>
                                            <input type="text" id="eventRegInput1" class="form-control" placeholder="Ingrese su nombre" name="fullname">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="eventRegInput4">Email</label>
                                            <input type="email" id="eventRegInput4" class="form-control" placeholder="Ingrese su E-mail" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="eventRegInput5">Número de Contacto</label>
                                            <input type="tel" id="eventRegInput5" class="form-control" name="contact" placeholder="Ingrese su teléfono o celular">
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="eventRegInput5">Consulta o Mensaje</label>
                                <textarea id="projectinput8" rows="5" class="form-control" name="comment" placeholder=""></textarea>
                            </div>
                            Por urgencias puede comunicarse al <code>15-3046-6598</code>
                            <div class="form-actions center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
	<script>
	    $('.DocsLi').addClass('active');
    </script>
@endsection
