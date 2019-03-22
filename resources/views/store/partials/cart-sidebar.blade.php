<div class="CheckoutCart cart-sidebar">
    <div id="SideContainerItemsFixed" class="inner">
        <div class="close" onclick="checkoutSidebar('hide')">X</div>
        @if(isset($activeCart))
            <div class="top row">
                <div class="col-md-12 title">
                    <i class="fas fa-shopping-cart"></i> Carro de Compras
                    <hr>
                </div>
                <div class="items">
                    <div class="text values"> 
                        Prendas: <b><span class="TotalCartItemsSidebar count">@if($activeCart['totalItems'] == 0) 0 @else {{ $activeCart['totalItems'] }} @endif </b>
                        <br>
                        Total: <b>$<span>{{ $activeCart['cartTotal'] }}</span></b></div>
                    <div class="button">
                        {{-- <button class="SubmitDataBtn main-btn-sm" type="button">Continuar <i class="fa fa-arrow-right"></i></button> --}}
                        <a href="{{ route('store.checkout')}}" class="main-btn-sm">Continuar <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @foreach($activeCart['rawdata']->items as $item)
                @if($item->article != null)
                    <div id="Item{{ $item->id }}" class="row item">
                        <img src="{{ asset($item->article->featuredImageName()) }}" alt="Product">
                        <div class="details-1">
                            <a href="{{ url('tienda/articulo/'.$item->article->id) }}">
                            @if(strlen($item->article->name) > 50)
                                {{ substr($item->article->name, 0, 50) }}...
                            @else
                                {{ $item->article->name }}
                            @endif
                            </a>
                        </div>
                        <div class="col-xs-12">
                            {{ $item->color }} / {{ $item->size }} 
                        </div>
                        <div class="details-2">
                            <div class="column-1 price">
                                {{-- PRICE --}}
                            @php($articlePrice = '0')
                            @if(Auth::guard('customer')->user()->group == '3')
                                @php($articlePrice = $item->article->reseller_price)

                                $ {{ showPrice($articlePrice, $item->article->reseller_discount) }}

                                {{-- @if($item->article->reseller_discount > 0)
                                    @php($articlePrice = calcValuePercentNeg($item->article->reseller_price, $item->article->reseller_discount))
                                    <del class="text-muted small">$ {{ $item->article->reseller_price }}</del>
                                @endif
                                $ {{ $articlePrice }} --}}
                            @else
                                $ {{ showPrice($articlePrice, $item->article->discount) }}
                                {{-- Estandar Item Prices --}}
                                {{-- @if($item->article->discount > 0)
                                        @php($articlePrice = calcValuePercentNeg($item->article->price, $item->article->discount))
                                        <del class="text-muted small">$ {{ $item->article->price }}</del>
                                @else
                                    @php($articlePrice = $item->article->price)
                                @endif
                                $ {{ $articlePrice }} --}}
                            @endif
                            </div>
                            {{-- <div class=""> Stock: {{ $item->article->stock }} </div> --}}
                        </div>
                        <div class="input-with-btn quantity">
                            {{-- Send this data to JSON via js with .Item-Data class --}}
                            <input class="Item-Data small-input under-element" name="data" type="number"  
                            min="1" max="{{ $item->quantity + $item->article->stock }}" value="{{ $item->quantity }}" required="" 
                            data-price="{{$articlePrice}}" data-id="{{ $item->id }}" data-variant="{{ $item->variant_id }}" data-toggle="tooltip" data-placement="top" title="Stock máximo {{ $item->article->stock }}">
                        </div>
                        <div class="delete-item">
                            <a onclick="removeFromCart('{{ route('store.removeFromCart') }}', {{$item->id}}, {{ $item->variant_id }}, {{ $item->quantity }}, '#Item'+{{ $item->id }}, 'reload');"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>{{-- / .item --}}
                @endif
            @endforeach
        <div class="update-btn">
            <button class="UpdateDataBtn block-btn-hollow"><i class="fas fa-sync"></i> Calcular nuevos totales</button>
        </div>
        <hr>
        <div class="total-price-bottom row">
            <div class="col-xs-6 col-md-6 text-left inner-text" class="">
                Prendas: <b><span class="TotalCartItemsSidebar count">@if($activeCart['totalItems'] == 0) 0 @else {{ $activeCart['totalItems'] }} @endif </b>
            </div>
            <div class="col-xs-6 col-md-6 text-rigth inner-text">
                Total: <b>$<span>{{ $activeCart['cartTotal'] }}</span></b>
            </div>
        </div>
        <div class="text-right">
            {{-- <button type="button" class="SubmitDataBtn main-btn-sm">Continuar <i class="fa fa-arrow-right"></i></button> --}}
            <a href="{{ route('store.checkout')}}" class="main-btn-sm">Continuar <i class="fa fa-arrow-right"></i></a>
        </div>
    @else
        <div class="empty-cart">
            El carro de compras <br> está vacío
        </div>
    @endif
    </div>
    <div class="SideContainerError side-container-error"></div> 
</div>