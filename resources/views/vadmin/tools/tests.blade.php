@extends('vadmin.partials.main')

@section('title', 'Vadmin | Tests')

@section('styles')
    {!! Html::style('plugins/jqueryFileUploader/jquery.fileuploader.css') !!}
	{!! Html::style('plugins/jqueryFileUploader/jquery.fileuploader-thumbnailtheme.css') !!}
@endsection

@section('content')
	<div class="dashboard">
		<div class="content-body">
			<h1>Tests SandBox</h1>
            <hr class="softhr">
            <h2>Email Sending</h2>
            <div class="row">
                <div class="col-md-3">
                    {!! Form::open(['route' => 'vadmin.testMailSending', 'method' => 'POST', 'class' => 'settings-form']) !!}	
                        {{ csrf_field() }}
                        <h5 for="">Test: mails de notificaciones</h5>
                        <label for="">Clase: </label>
                        <div class="form-group">
                            <select name="mailclass" id="" class="font-control">
                                <option value="SendMail">SendMail</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail destino</label>
                            <input class="form-control" type="text" name="maildestiny" value="info@vimana.studio">
                        </div>
                        <input class="btnSm btnBlue" type="submit" value="Enviar">
                    {!! Form::close() !!}
                </div>
                <div class="col-md-3">
                    {!! Form::open(['route' => 'updateSettings', 'method' => 'POST', 'class' => 'settings-form']) !!}	
                        {{ csrf_field() }}
                        <h5 for="">Test: mails de notificación de carros activos con más de 24hs</h5>
                        <label for="">Cliente: </label>
                        <div class="form-group">
                            <select name="" id="" class="font-control">
                                @foreach($carts as $cart)
                                <option value="">Órder: #{{ $cart->id}} ({{ $cart->customer->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail destino</label>
                            <input class="form-control" type="text" name="email" value="dev@vimana.studio">
                        </div>
                        <input class="btnSm btnBlue" type="submit" value="Enviar">
                    {!! Form::close() !!}
                </div>
            </div>
            <hr class="softhr">
            <h2>Mercadopago API Integration</h2>
            <div class="row">
                <div class="col-md-6">
                    {!! Form::open(['route' => 'vadmin.testMP', 'method' => 'POST', 'class' => 'settings-form']) !!}	
                        {{ csrf_field() }}
                        <label for="">Test</label>
                        <input class="btnSm btnMain" type="submit" value="Enviar">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


   <div id="Error"></div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('plugins/jqueryFileUploader/jquery.fileuploader.min.js')}} "></script>
    <script type="text/javascript" src="{{ asset('js/vadmin-forms.js') }}" ></script>
    @include('vadmin.components.bladejs')
@endsection

@section('custom_js')
@endsection
