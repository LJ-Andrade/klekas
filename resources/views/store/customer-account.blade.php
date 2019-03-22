@extends('store.partials.main')

@section('content')
    {{-- @if(Auth::guard('customer')->check())
    <div class="CheckoutCart checkout-cart checkout-cart-floating">
        @include('store.partials.checkout-cart')
    </div>
    @endif --}}
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                @include('store.partials.profile-aside')
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                <h2>Datos de contacto y entrega</h2>
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                @if(app('request')->input('from') == 'checkout')
                <form class="row small-form" method="POST" action="{{ route('store.updateCustomer', array('from' => 'checkout')) }}">
                @else
                <form class="row small-form" method="POST" action="{{ route('store.updateCustomer') }}">
                @endif
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" value="{{ Auth::guard('customer')->user()->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre de Usuario</label>
                            <input class="form-control" type="text" name="username" value="{{ Auth::guard('customer')->user()->username }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" type="text" name="name" value="{{ Auth::guard('customer')->user()->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Apellido</label>
                            <input class="form-control" type="text" name="surname" value="{{ Auth::guard('customer')->user()->surname }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input class="form-control" type="text" name="phone" value="{{ Auth::guard('customer')->user()->phone }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono 2</label>
                            <input class="form-control" type="text" name="phone2" value="{{ Auth::guard('customer')->user()->phone2 }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input class="form-control" type="text" name="address" value="{{ Auth::guard('customer')->user()->address }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Código Postal</label>
                            <input class="form-control" type="text" name="cp" value="{{ Auth::guard('customer')->user()->cp }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Provincia</label>
                            {!! Form::select('geoprov_id', $geoprovs, Auth::guard('customer')->user()->geoprov_id,
                            ['class' => 'GeoProvSelect form-control', 'placeholder' => 'Seleccione una opción']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Localidad</label>
                            @if(Auth::guard('customer')->user()->geoloc)
                            <select id='GeoLocsSelect' name="geoloc_id" 
                                data-actualloc="{{ Auth::guard('customer')->user()->geoloc->name }}" 
                                data-actuallocid="{{ Auth::guard('customer')->user()->geoloc->id }}" 
                                class="form-control GeoLocsSelect" required>
                            </select>
                            @else
                            <select id='GeoLocsSelect' name="geoloc_id" 
                                data-actualloc="" 
                                data-actuallocid="" 
                                class="form-control GeoLocsSelect" required>
                            </select>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>CUIT</label>
                            <input class="form-control" type="text" name="cuit" value="{{ Auth::guard('customer')->user()->cuit }}" placeholder="Ingrese su número de CUIT"
                             @if(Auth::guard('customer')->user()->group == '3') required @endif/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <button class="btn btn-main margin-right-none" type="submit">Actualizar Datos</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="Error"></div>
    </div>
@endsection

@section('scripts')
    @include('store.components.bladejs')
    <script>
        // Check for locality
        $(document).ready(function(){
            var actualGeoProv = "{{ Auth::guard('customer')->user()->geoprov_id }}";
            
            if(actualGeoProv != ''){
                getGeoLocs(actualGeoProv);
            }
            
            $('.GeoProvSelect').on('change', function(){
                let prov_id = $(this).val();
                getGeoLocs(prov_id);
            });
        });
        </script>
@endsection
