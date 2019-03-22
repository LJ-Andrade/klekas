@extends('layouts.vadmin.main')
@section('title', 'VADmin | Editar Artículo')

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
			<li class="breadcrumb-item active">Edición de Artículo</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Edición de Artículo</h1>
				{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')

	<div class="inner-wrapper">
		{!! Form::model($article, [
				'method' => 'PATCH',
				'url' => ['vadmin/portfolio', $article->id],
				'files' => true,
				'class' => 'row big-form', 
				'data-parsley-validate' => ''
			]) !!}
			@include('vadmin.portfolio.form')
			@if(count($article->images) == 0 )
			@else
				<div class="row">
					<div class="col-md-12 actual-images horizontal-list">
						<h2>Imágenes publicadas</h2>
						<ul>
							@foreach($article->images as $image)
							<li id="Img{{ $image->id }}" class="Delete-Porfolio-Img" data-imgid="{{ $image->id }}">	
								<img src="{{ asset('webimages/portfolio/'.$image->name) }}">
								<div class="overlayItemCenter"><i class="icon-ios-trash-outline"></i></div>
							</li>
							@endforeach
						</ul>
						<hr class="softhr">
					</div>
				</div>
			@endif
			<div class="row centered">
				{!! Form::submit('Actualizar artículo', ['class' => 'btn btnGreen']) !!}
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
	@include('vadmin.components.bladejs')
@endsection

@section('custom_js')
	
	<script>

		// ---- Textarea Text Editor ----- //
		// Path to icons
		$.trumbowyg.svgPath = '{{ asset('plugins/texteditor/icons.svg') }}';
		// Init
		$('.Textarea-Editor').trumbowyg();


		// ----- Image Delete Ajax ------- //
		// Ask Delete Confirmation
		//$('.Edit_Actual_Image').click(function(){
		//	var id = $(this).data('imgid');
		//	confirm_delete(id, 'Cuidado','Desea eliminar esta imágen permanentemente?');
		//});
//
		// Proceed to deletion
		//function delete_item(id) {	
		//
		//	var route = "{{ url('vadmin/deleteArticleImg') }}/"+id+"";
		//	console.log(route);
		//	$.ajax({
		//			url:  route,
		//			method: 'post',             
		//			dataType: "json",
		//			data: {id: id, _token: $('input[name="_token"]').val()
		//			},
		//				success: function(data){
		//			},
		//			complete: function(data)
		//			{
		//				console.log(data);
		//				
		//				if(data.responseText == 1)
		//				{
		//					swal(
		//					  'Ok!',
		//					  'Imágen eliminada !',
		//					  'success'
		//					);
		//					$('#Img'+id).hide(400);
		//				} else {
		//					swal(
		//					  'Ups!',
		//					  'La imágen no se pudo eliminar ! <br> Contacte al servicio técnico.',
		//					  'error'
		//					);
		//				}
//
		//			},
		//			error: function(data)
		//			{
		//				// console.log(data);
		//			},
		//		});
//
		//}
	
		
	</script>

@endsection


