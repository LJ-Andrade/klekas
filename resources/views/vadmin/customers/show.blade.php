@extends('vadmin.partials.main')
@section('title', 'Vadmin | Perfil de Usuario')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customers.index')}}">Clientes</a></li>
            <li class="breadcrumb-item active">Perfil de <b>{{ $customer->customername }}</b></li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
        @slot('title')
                <span style="color: #ada8a8">Perfil | </span>{{ $customer->name }} <br>
                <span class="small"> Compras realizadas: {{ $customer->staticstics('totalCarts')}} | </span>  
                <span class="small"> Prendas compradas: {{ $customer->staticstics('totalItems')}} | </span>
                <span class="small"> Total gastado: $ {{ $customer->staticstics('totalSpent')}}<br> </span>
            @endslot
            @slot('content')
                <div class="col-md-3">
                    <div class="round-image-card">
                        <div class="inner">
                            <div class="image">
                                <img id="Avatar" src="{{ asset('webimages/customers/'.$customer->avatar ) }}" class="Image-Container" alt="">
                            </div>
                        </div>
                    </div>
                    
                    {{-- EDIT BUTTON --}}
                    {{-- <a href="{{ url('vadmin/customers/'. $customer->id .'/edit') }}" class="btn btnMain"><i class="icon-pencil2"></i> Editar</a> --}}


                    {{-- <div class="ActionContainer Hidden">
                        <hr class="softhr">
                        {!! Form::open(['url' => 'vadmin/updateCustomerAvatar', 'method' => 'POST', 'class' => 'UpdateAvatarForm Hidden', 'files' => true]) !!}
                            {{ csrf_field() }}
                            <input type="file" name="avatar" class="Hidden" id="ImageInput">
                            <input type="hidden" name="id" value="{{ $customer->id }}">
                            <input type="submit" class="btn btnGreen" id="ConfirmChange" value="Confirmar">
                        {!! Form::close() !!}
                    </div> --}}
                </div>
                <div class="col-md-9">
                    <div class="column-data">
                        <div class="row item">
                            <div class="label"><b>Nombre de usuario: </b></div>
                            <span class="data">{{ $customer->username }}</span>
                        </div> <br>
                        <div class="row item">
                            <div class="label"><b>Nombre y apellido: </b></div>
                            <span class="data">{{ $customer->name }} {{ $customer->surname }}</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>E-Mail: </b></div>
                            <span class="data">{{ $customer->email }}</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Dirección: </b></div>
                            <span class="data">{{ $customer->address }}</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Provincia: </b></div>
                            <span class="data">@if(!$customer->geoprov) @else
                                    {{ $customer->geoprov->name }}@endif</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Localidad: </b></div>
                            <span class="data">@if(!$customer->geoloc) @else
                                    {{ $customer->geoloc->name }}@endif</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Código Postal: </b></div>
                            <span class="data">{{ $customer->cp }}</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Teléfono: </b></div>
                            <span class="data">{{ $customer->phone }}</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Teléfono 2: </b></div>
                            <span class="data">@if($customer->phone2) {{ $customer->phone2 }} @endif</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Cuit: </b></div>
                            <span class="data">{{ $customer->cuit }}</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Dni: </b></div>
                            <span class="data">{{ $customer->dni }}</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Tipo de cliente: </b></div>
                            <span class="data">{{ clientGroupTrd($customer->group) }}</span>
                        </div><br>
                        <div class="row item">
                            <div class="label"><b>Fecha de ingreso: </b></div>
                            <span class="data">{{ transDateT($customer->created_at) }}</span>
                        </div>
                    </div>
                </div>
            @endslot
        @endcomponent
    </div>
@endsection

@section('custom_js')
	{{-- <script>
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
	</script> --}}
@endsection