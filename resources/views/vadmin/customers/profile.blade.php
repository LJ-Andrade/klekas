@extends('vadmin.partials.main')
@section('title', 'Vadmin | Creación de Usuario')

@section('content')
	Perfil
@endsection

@section('custom_js')
	<script>
		$(document).ready(function() {
			$('#Avatar').click(function(){
				$('#ImageInput').click();
			});       
		});
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('.Image-Container').attr('src', e.target.result);
				}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#ImageInput").change(function(){
			readURL(this);
			$('#ConfirmChange').removeClass('Hidden');
		});
	</script>
@endsection