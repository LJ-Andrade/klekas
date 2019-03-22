@extends('vadmin.partials.main')
@section('title', 'VADmin | Editar Item')

@section('styles')
	{!! Html::style('plugins/texteditor/trumbowyg.min.css') !!}
	{!! Html::style('plugins/fileuploader/css/jquery.fileuploader.css') !!}
	{!! Html::style('plugins/fileuploader/css/jquery.fileuploader-theme-dragdrop.css') !!}
	{!! Html::style('plugins/fileuploader/css/jquery.fileuploader-theme-dropin.css') !!}
	{!! Html::style('plugins/fileuploader/css/jquery.fileuploader-theme-onebutton.css') !!}
	{!! Html::style('plugins/fileuploader/css/jquery.fileuploader-theme-thumbnails.css') !!}

	

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
				<h1>Edición de artículo</h1>
				{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="inner-wrapper">
		{!! Form::model($article, [
				'id' => 'UpdateArticleForm',
				'method' => 'PATCH',
				'url' => ['vadmin/catalogo', $article->id],
				'enctype' => 'multipart/form-data',
				'files' => true,
				'class' => 'row big-form', 
				'data-parsley-validate' => ''
			]) !!}
			<input type="hidden" name="article_id" value="{{ $article->id }}" >
			@include('vadmin.catalog.form')
			<div class="form-actions right">
				<a href="{{ route('catalogo.index')}}">
					<button type="button" class="btn btnRed">
						<i class="icon-cross2"></i> Cancelar
					</button>
				</a>
				<button id="EditArticleBtn" type="button" class="btn btnGreen">
					<i class="icon-check2"></i> Guardar
				</button>
			</div>
		{!! Form::close() !!}
	</div>  
	<div id="Error"></div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/texteditor/trumbowyg.min.js')}} "></script>
	<script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/fileuploader/js/jquery.fileuploader.js')}} "></script>
	<script type="text/javascript" src="{{ asset('js/vadmin-forms.js') }}" ></script>
	@include('vadmin.components.bladejs')
	<script>
		// ---- Textarea Text Editor ----- //
		// Path to icons
		$.trumbowyg.svgPath = '{{ asset('plugins/texteditor/icons.svg') }}';
		// Init
		$('.Textarea-Editor').trumbowyg();
		

		// Validate and Sumbit form
		$('#EditArticleBtn').click(function(){
			let formData = $('#UpdateArticleForm').serialize();
			$.ajax({
				url: "{{ route('vadmin.catalog_update_validation') }}",
				method: 'POST',
				dataType: 'JSON',
				data: formData,
				success: function (data) {	
					if(data.response == 'success')
					{
						$('#UpdateArticleForm').submit();
					}
					else
					{
						let errors = "";
						for (var i = 0; i <= data.details.length -1; i++){
							errors += data.details[i] + "</br>";
						}
						alert_error("", errors);
					}

				},
				error: function (data) {
					$('#Error').html(data.responseText);
					// alert_error("", data.responseText);
					console.log(data);
				}
			});

		});

	</script>
@endsection


