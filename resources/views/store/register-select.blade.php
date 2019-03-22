@extends('store.partials.main')


@section('content')
<div class="container padding-bottom-3x">
    <div id="ResellerCTA" class="row centered-form text-center" style="margin-top: 0">
        <div class="login-box inner" style="padding-bottom: 30px">
            <h3>Registro de Usuario</h3>
            {{-- RESELLER BOX REQUIRED Edisplay: none;--}}
            <div class="row registration-selector">
                <div class="inner-col col-xs-12 col-sm-6 col-md-6">
                    <a href="{{ route('customer.register-reseller') }}">
                        <div class="big-btn">
                            <div class="icon-btn">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text-btn">
                                <span class="text-1">Registrarme como</span>
                                <span class="text-2">Mayorísta</span>
                            </div>
                        </div>    
                    </a>
                </div>
                <div class="inner-col col-xs-12 col-sm-6 col-md-6">
                    <a href="{{ route('customer.register') }}">
                        <div class="big-btn">
                            <div class="icon-btn">
                                <i class="fa fa-user"></i> 
                            </div>
                            <div class="text-btn">
                                <span class="text-1">Registrarme como</span>
                                <span class="text-2">Minorísta</span>
                            </div>
                        </div> 
                    </a>
                </div>
            </div>
        </div>
    </div>
	
</div>

@endsection
    
@section('scripts')
    @include('store.components.bladejs')
@endsection
