@extends('vadmin.partials.main')

@section('title', 'Vadmin | Configuración')

@section('styles')
@endsection

@section('content')
	<div class="dashboard">
		<div class="content-body">
			
			<h1>Configuraciones Generales</h1>
            <hr class="softhr">
            <div class="row">
                <div class="container-fluid">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-block">
                                {!! Form::open(['route' => 'updateSettings', 'method' => 'POST']) !!}	
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Cantidad de prendas</label>
                                        <input class="form-control" type="text" name="reseller_min" value="{{ $settings->reseller_min }}" placeholder="Ingrese mínimo">
                                    </div>
                                    <div class="form-group">
                                        <label>Monto mínimo ($)</label>
                                        <input class="form-control" type="text" name="reseller_money_min" value="{{ $settings->reseller_money_min }}" placeholder="Ingrese mínimo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">E-mail primario</label>
                                        <input class="form-control" type="text" name="email" value="{{ $settings->email }}">
                                    </div>
                                    <input class="btnSm btnBlue" type="submit" value="Actualizar">
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-block">
                                {!! Form::open(['route' => 'updateSettings', 'method' => 'POST', 'class' => '']) !!}	
                                    {{ csrf_field() }}
                                    <label>
                                        <a data-toggle="modal" data-target="#GaHelpModal">
                                            <i class="far fa-question-circle"></i>
                                        </a>
                                        Código de Google Analytics
                                    </label>
                                    <textarea class="form-control" name="google_analytics" style="margin-bottom: 5px; min-height: 200px">{{ $settings->google_analytics }}</textarea>
                                    <input class="btnSm btnBlue" type="submit" value="Actualizar">
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                  
            </div>
            {{-- <div class="settings-options table-responsive">
                <table id="TableList" class="table">
                    <tbody>
                        <tr>
                            <td class="left">Notificaciones vía E-mail</tdc>
                            <td class="right">
                                <label class="switch">
                                    <input class="UpdateStatus switch-checkbox" type="checkbox" 
                                    data-model="" data-id=""
                                    @if($settings->notifications == 1)
                                    checked
                                    @endif
                                    >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            
        </div>
    <div id="Error"></div>
    
    {{-- Analytics Help Modal --}}
    <div class="modal fade" id="GaHelpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title"><b>Cómo insertar el código de Google Analytics</b></h5>
                <br>
                El código deberá insertarse tal cual lo proveé Google. <br>
                Es muy importante no obviar las etiquetas &lt;script&gt;&lt;/script&gt; de apertura y cierre del código. <br><br>
                De lo contrario, el código quedará expuesto en la parte superior de la web pública.
                <hr class="softhr">
                <b>Ejemplo de código correcto:</b> <br><br>
                &lt;script async src=&quot;https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID&quot;&gt;&lt;/script&gt; <br>
                &lt;script&gt;<br>
                    window.dataLayer = window.dataLayer || []; <br>
                    function gtag(){dataLayer.push(arguments);} <br>
                    gtag('js', new Date()); <br><br>

                    gtag('config', 'GA_TRACKING_ID'); <br>
                &lt;/script&gt;
            </div>
            <div class="modal-footer" style="border-top: 0">
                <button type="button" data-dismiss="modal" class="btn btnMain">Entendido!</button>
            </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
	
@endsection

@section('custom_js')

@endsection
