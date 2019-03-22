@extends('vadmin.partials.main')
@section('title', 'VADmin | Publicar similar')

@section('styles')
	{!! Html::style('plugins/texteditor/trumbowyg.min.css') !!}
	{!! Html::style('plugins/jqueryFileUploader/fileuploader.css') !!}
	{!! Html::style('plugins/jqueryFileUploader/jquery.fileuploader.css') !!}
	{!! Html::style('plugins/jqueryFileUploader/jquery.fileuploader-thumbnailtheme.css') !!}
	{!! Html::style('plugins/jqueryfiler/themes/jquery.filer-dragdropbox-theme.css') !!}
	{!! Html::style('plugins/chosen/chosen.min.css') !!}	
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('catalogo.index')}}">Listado de artículos</a></li>
			<li class="breadcrumb-item active">Edición de artículo</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Crear artículo similar</h1>
				{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="inner-wrapper">
		{!! Form::model($inheritData, [
				'method' => 'POST',
				'route' => ['catalogo.store'],
				'files' => true,
				'class' => 'row big-form', 
				'data-parsley-validate' => ''
			]) !!}
            @include('vadmin.catalog.form')
            <div class="form-actions right">
                <a href="{{ route('catalogo.index')}}">
                    <button type="button" class="btn btnRed">
                        <i class="icon-cross2"></i> Cancelar
                    </button>
                </a>
                <button type="submit" class="btn btnGreen">
                    <i class="icon-check2"></i> Guardar
                </button>
            </div>
		{!! Form::close() !!}
		<div id="Error"></div>
	</div>  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/texteditor/trumbowyg.min.js')}} "></script>
	<script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/jqueryFileUploader/jquery.fileuploader.min.js')}} "></script>
	<script type="text/javascript" src="{{ asset('js/vadmin-forms.js') }}" ></script>
	@include('vadmin.components.bladejs')
@endsection

@section('custom_js')
	<script>
		$('.CatalogLi').addClass('open');
		// ---- Textarea Text Editor ----- //
		// Path to icons
		$.trumbowyg.svgPath = '{{ asset('plugins/texteditor/icons.svg') }}';
		// Init
        $('.Textarea-Editor').trumbowyg();
		$('#ColorInput, #CodeInput').val('');
	</script>
@endsection


