@extends('layouts.vadmin.main')
@section('title', 'VADmin | Nuevo Artículo')

@section('styles')
	{!! Html::style('plugins/texteditor/trumbowyg.min.css') !!}
	{!! Html::style('plugins/jqueryFileUploader/jquery.fileuploader.css') !!}
	{{-- {!! Html::style('plugins/jqueryfiler/themes/jquery.filer-dragdropbox-theme.css') !!} --}}
	{!! Html::style('plugins/jqueryfiler/jquery.filer.css') !!}
	{!! Html::style('plugins/chosen/chosen.min.css') !!}
	{!! Html::style('plugins/colorpicker/spectrum.css') !!}
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('portfolio.index')}}">Listado de Artículos</a></li>
			<li class="breadcrumb-item active">Crear Artículo</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Creación de Nuevo Artículo</h1>
				{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="inner-wrapper">
		{!! Form::open(['route' => 'portfolio.store', 'method' => 'POST', 'files' => true, 'id' => 'NewItemForm', 'class' => 'row big-form', 'data-parsley-validate' => '']) !!}	
			@include('vadmin.portfolio.form')
			{{-- <div class="row centered">
				{!! Form::submit('Agregar artículo', ['class' => 'btn btnGreen']) !!}
			</div> --}}
			<div class="form-actions right">
				<a href="{{ route('portfolio.index')}}">
					<button type="button" class="btn btnRed">
						<i class="icon-cross2"></i> Cancelar
					</button>
				</a>
				<button type="submit" class="btn btnGreen">
					<i class="icon-check2"></i> Guardar
				</button>
			</div>
		{!! Form::close() !!}
	</div>  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/texteditor/trumbowyg.min.js')}} "></script>
	{{-- <script type="text/javascript" src="{{ asset('plugins/jqueryfiler/jquery.filer.min.js')}} "></script> --}}
	<script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/jqueryFileUploader/jquery.fileuploader.min.js')}} "></script>
	<script type="text/javascript" src="{{ asset('plugins/colorpicker/spectrum.js')}} "></script>
	<script type="text/javascript" src="{{ asset('plugins/colorpicker/jquery.spectrum-es.js')}} "></script>
	<script type="text/javascript" src="{{ asset('js/vadmin-forms.js') }}" ></script>
@endsection

@section('custom_js')
	
	<script>
		$('.PortfolioLi').addClass('open');
		$('.PortfolioNew').addClass('active');
		// ------------------- Textarea Text Editor --------------------------- //
		// Path to icons
		$.trumbowyg.svgPath = '{{ asset('plugins/texteditor/icons.svg') }}';
		// Init
		$('.Textarea-Editor').trumbowyg();

		// ----------------------- Color Picker --------------------------------//
		// Add Color Selector
		$(".ColorPicker").spectrum({
			color: "#fff",
			change: function(color) {
				// var div = ;
				var hex = color.toHexString(); // #ff0000
				// alert(div);
				$('.ColorPickerList').append("<div class='picked-color' style='background-color:"+ hex +"'><input type='hidden' name='color[]' value='"+ hex +"'></div>");
				console.log(hex);
			}
		});
	</script>

@endsection


