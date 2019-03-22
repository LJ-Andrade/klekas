@extends('vadmin.partials.main')
@section('title', 'Vadmin | Perfil de Usuario')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Usuarios</a></li>
            <li class="breadcrumb-item active">Perfil de <b>{{ $user->username }}</b></li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                 <span style="color: #ada8a8">Perfil | </span>{{ $user->username }}
            @endslot
            @slot('content')
                <div class="centered-content">
                    <div class="round-image-card">
                        <div class="inner">
                            <div class="image">
                                @if($user->avatar == '')
                                    <img id="Avatar" class="Image-Container CheckImg" src="{{ asset('images/users/default.jpg') }}" alt="Imágen de Usuario">
                                @else	
                                    <img id="Avatar" class="Image-Container CheckImg" src="{{ asset('images/users/'.$user->avatar) }}" alt="Imágen de Usuario">
                                @endif
                                <span class="over-text">Cambiar imágen</span>
                            </div>
                            <div class="card-content">
                                <span><b>Nombre de Usuario:</b> {{ $user->username }} </span><br>
                                <span><b>Nombre:</b> {{ $user->name }} </span><br>
                                <span><b>E-Mail:</b> {{ $user->email }}  </span><br><br>
                                <span class="tag tag-pill btnBlue"><b>Rol:</b> {{ roleTrd($user->role) }}  </span> 
                                <span class="tag tag-pill btnGreen"><b>Grupo:</b> {{ groupTrd($user->group) }}  </span>   
                            </div>
                        </div>
                    </div>
                    <div class="ActionContainer Hidden">
                        <hr class="softhr">
                        {!! Form::open(['url' => 'vadmin/updateAvatar', 'method' => 'POST', 'class' => 'UpdateAvatarForm Hidden', 'files' => true]) !!}
                            {{-- <form enctype="multipart/form-data" action="profile" method="POST"> --}}
                            {{ csrf_field() }}
                            <input type="file" name="avatar" class="Hidden" id="ImageInput">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="submit" class="btn btnGreen" id="ConfirmChange" value="Confirmar">
                        {!! Form::close() !!}    
                        {{-- <button id="UpdateProfileBtn" class="btn btnGreen"><i class="icon-check2"></i> Actualizar</button> --}}
                    </div>
                </div>  
            @endslot
        @endcomponent
    </div>
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
                    $('.ActionContainer').removeClass('Hidden');
				}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#ImageInput").change(function(){
			readURL(this);
			$('.UpdateAvatarForm').removeClass('Hidden');
		});
	</script>
@endsection