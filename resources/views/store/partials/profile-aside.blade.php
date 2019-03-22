<aside class="user-info-wrapper">
    {{--  Cambiar fondo de cabecera de aside  --}}
     <div class="user-cover" style="background-image: url(img/account/user-cover-img.jpg);">
        {{-- <div class="info-label" data-toggle="tooltip" title="You currently have 290 Reward Points to spend"><i class="icon-medal"></i>290 points</div> --}}
    </div> 


    <div class="user-info">
        <div class="user-avatar"><a id="UpdateCustomerAvatarBtn" class="edit-avatar" href="#"></a>
        <img src="{{ asset('webimages/customers/'.Auth::guard('customer')->user()->avatar ) }}" class="Image-Container CheckImg" alt="">
        {{-- @if(Auth::guard('customer')->user()->avatar == '')
            <img class="Image-Container" src="{{ asset('webimages/gen/logo-gen.jpg') }}" alt="Imágen de Usuario">
        @else
            <img class="Image-Container" src="{{ asset('webimages/customers/'.Auth::guard('customer')->user()->avatar ) }}" alt="Imágen de Usuario">
        @endif --}}
        </div>  
        <div class="user-data">
            <h4>{{ Auth::guard('customer')->user()->name }} {{ Auth::guard('customer')->user()->surname }}</h4>
            <span>Miembro desde {{ transDateT(Auth::guard('customer')->user()->created_at) }}</span>    
            @if(Auth::guard('customer')->user()->group == '3')
                <span><i style="color: #aace1c" class="fas fa-certificate"></i> <b>{{  groupTrd(Auth::guard('customer')->user()->group) }}</b></span>
            @endif
        </div>
    </div>
    {!! Form::open(['url' => 'tienda/updateCustomerAvatar', 'method' => 'POST', 'files' => true]) !!}
        {{-- <form enctype="multipart/form-data" action="profile" method="POST"> --}}
        {{ csrf_field() }}
        <input type="file" name="avatar" class="Hidden" id="CustomerAvatarInput" required>
        <input type="hidden" name="id" value="{{ Auth::guard('customer')->user()->id }}">
        <button type="submit" class="btn btn-outline-primary btn-sm Hidden" style="margin-left: 20px" id="ConfirmChange"><i class="fa fa-check"></i> Confirmar cambio</button>
    {!! Form::close() !!}  
</aside>

<nav class="list-group">
    <a class="list-group-item {{ Menu::activeMenu('cuenta') }}" href="{{ route('store.customer-account') }}"><i class="icon-head"></i>Cuenta</a>
    <a class="list-group-item justify-content-between {{ Menu::activeMenu('pedidos') }}" href="{{ route('store.customer-orders') }}">
            <span><i class="icon-bag"></i>Mis Pedidos</span>
    </a>
    <a class="list-group-item justify-content-between {{ Menu::activeMenu('favoritos') }}" href="{{ route('store.customer-wishlist') }}">
        <span><i class="icon-heart"></i>Favoritos</span>
        </span>
    </a>
    @if($activeCart != null)
    <a class="list-group-item justify-content-between" href="{{ route('store.checkout') }}">
        <span><i class="icon-tag"></i>CheckOut</span>
    </a>
    @endif
    {{-- <a class="list-group-item justify-content-between" href="#">
        <span><i class="icon-tag"></i>Ayuda y Reclamos</span>
    </a> --}}
    <a class="list-group-item" href="{{ route('store') }}"><i class="icon-arrow-left"></i> Volver a la Tienda</a>
</nav>