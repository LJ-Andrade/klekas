<!-- Toolbar-->
<div class="toolbar">
    <div class="inner">
        <div class="text-links">
            {{-- <a href="{{ url('como-comprar') }}"><i class="far fa-question-circle"></i> Como comprar</a>         --}}
        </div>
        <div class="tools">
                <div class="gen-menu">
                    <a class="btn btn-main-borderless" href="">LA MARCAS</a>
                    <a class="btn btn-main-borderless" href="">EXCLUSIVIDADES</a>
                </div>
            @if(Auth::guard('customer')->check())
                {{-- @include('store.partials.cart-resumen-desktop') --}}
                {{-- Cart Sidebar Trigger --}}
                {{-- <div class="favs">
                    <a href="{{ route('store.customer-wishlist') }}" data-toggle="tooltip" title="Mis Favoritos">
                        <i class="FavMainIcon {{ count($favs['favs']) > 0 ? "fa" : "far" }} fa-heart"></i>
                    </a>
                </div> --}}
                <div class="CartResumen cart" onclick="checkoutSidebar();">
                    <img class="cart-icon" src="{{ asset('images/web/cart-icon.png') }}" alt="">
                    <span class="TotalCartItems count">@if($activeCart['totalItems'] == 0) 0 @else {{ $activeCart['totalItems'] }} @endif</span>
                    <span class="CartSubTotal subtotal">@if($activeCart['totalItems'] != 0) $ {{ $activeCart['cartSubTotal'] }} @endif</span>
                </div>
                {{-- User Avatar --}}
                <div class="account"><a href="#" onclick="event.preventDefault();"></a>
                    <img src="{{ asset('webimages/customers/'.Auth::guard('customer')->user()->avatar ) }}" class="CheckImg" alt="">
                    {{-- @if(Auth::guard('customer')->user()->avatar)
                    @else
                        <i class="icon-head"></i>
                    @endif --}}
                    <ul class="toolbar-dropdown">
                        <li class="sub-menu-title"><span>Hola,</span> {{ Auth::guard('customer')->user()->name }}</li>
                        <li><a href="{{ route('store.customer-account') }}">Cuenta</a></li>
                        <li><a href="{{ route('store.customer-orders') }}">Mis Pedidos</a></li>
                        <li><a href="{{ route('store.customer-wishlist') }}">Favoritos</a></li>
                        <li class="sub-menu-separator"></li>
                        <li>
                            <a href="{{ route('customer.logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-unlock"></i> Desconectar
                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </li> 
                    </ul>
                </div>
            @else
                <div class="access-buttons">
                    <a href="{{ route('customer.login') }}" class="btn btn-main-sm-hollow">Ingresar</a>
                    <a href="{{ url('tienda/registro') }}" style="margin-left: -4px" class="btn btn-main-sm">Registrarse</a>
                </div>
                {{-- <div class="access-icons">
                    <a href="{{ route('customer.login') }}"><button class="icon-button"><i class="fas fa-sign-in-alt"></i></button></a>
                    <a href="{{ route('customer.register') }}"><button class="icon-button"><i class="fas fa-user-plus"></i></button></a>
                </div> --}}
            @endif
        </div>
    </div>
</div>