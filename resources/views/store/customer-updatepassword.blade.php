@extends('layouts.store.main')

@section('content')
    {{-- @if(Auth::guard('customer')->check())
    <div class="CheckoutCart checkout-cart checkout-cart-floating">
        @include('store.partials.checkout-cart')
    </div>
    @endif --}}
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row">
            <div class="col-lg-4">
                @include('layouts.store.partials.profile-aside')
            </div>
            <div class="col-lg-8">
                <br>                    
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <form class="row" method="POST" action="{{ route('store.updatePassword') }}">
                    {{ csrf_field() }}
                    <div class="ModifyPassword col-md-6"> 
                        <div class="form-group">
                            <label for="account-pass">Nueva Contraseña</label>
                            <input class="form-control" name="password" type="password" id="account-pass">
                        </div>
                    </div>
                    <div class="ModifyPassword col-md-6">
                        <div class="form-group">
                            <label for="account-confirm-pass">Confirmar Contraseña</label>
                            <input class="form-control" name="confirmpassword" type="password_confirmation" id="account-confirm-pass">
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <label class="custom-control custom-checkbox d-block">
                                
                            </label>
                            <button class="btn btn-primary margin-right-none" type="submit">Actualizar Contraseña</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
