<div id="SideContainer" class="side-container">
	<div class="close" onclick="checkoutSidebar('close')">X</div>
	<div  class="inner">
		<h2>CARRO DE COMPRAS</h2>
		<div id="SideContainerItems">
			@if(isset($activeCart))
				<div class="text-right">
					<button id="UpdateDataBtn" type="button" class="main-btn-sm">Actualizar <i class="fas fa-sync-alt"></i></button>
					<button id="SubmitDataBtn" type="button" class="main-btn-sm">Continuar <i class="fa fa-arrow-right"></i></button>
					@if(isset($activeCart) && $activeCart != null)
					@endif
				</div>
				<br>
				<div class="top-info">
					Productos
					<div class="total-price-top">Total: <b>$<span>{{ $activeCart['cartTotal'] }}</span></b></div>
				</div>
				@foreach($activeCart['rawdata']->items as $item)
					<div id="Item{{ $item->id }}" class="row item">
						<div class="image">
							<img src="{{ asset($item->article->featuredImageName()) }}" alt="Product">
						</div>
						<div class="col-9 details">
							<a href="{{ url('tienda/articulo/'.$item->article->id) }}">
							@if(strlen($item->article->name) > 50)
								{{ substr($item->article->name, 0, 50) }}...
							@else
								{{ $item->article->name }}
							@endif
							</a> <br>
							{{-- PRICE --}}
							@php($articlePrice = '0')
							@if(Auth::guard('customer')->user()->group == '3')
								@php($articlePrice = $item->article->reseller_price)
								@if($item->article->reseller_discount > 0)
									<td class="text-lg">
										@php($articlePrice = calcValuePercentNeg($item->article->reseller_price, $item->article->reseller_discount))
										<del class="text-muted">$ {{ $item->article->reseller_price }}</del>
										$ {{ $articlePrice }}
									</td>
								@else
									<td class="text-lg">$ {{ $articlePrice }}</td>
								@endif
							@else
								{{-- Estandar Item Prices --}}
								@if($item->article->discount > 0)
									<td>
										@php($articlePrice = calcValuePercentNeg($item->article->price, $item->article->discount))
										<del class="text-muted">$ {{ $item->article->price }}</del><br>
										$ {{ $articlePrice }}
									</td>
								@else
									@php($articlePrice = $item->article->price)
									<td class="text-lg">${{ $articlePrice }}</td>
								@endif
							@endif
							<br>
							{{ $item->color }} | Talle: {{ $item->size }} 
						</div>
						<div class="col-3 quantity">
							<div class="input-with-btn input-with-btn-mobile">
								{{-- Send this data to JSON via js with .Item-Data class --}}
								<input class="Item-Data small-input under-element" name="data" type="number" 
								min="1" max="{{ $item->quantity + $item->article->stock }}" value="{{ $item->quantity }}" required="" 
								data-price="{{$articlePrice}}" data-id="{{ $item->id }}">
							</div>
							<div class=""> Stock: {{ $item->article->stock }} </div>
						</div>
						<div class="delete-item">
							<button class="icon-only-btn" onclick="removeFromCart('{{ route('store.removeFromCart') }}', {{ $item->id }}, {{ $item->quantity }}, '#Item'+{{ $item->id }}, 'reload');"><i class="far fa-trash-alt"></i></button>
						</div>
					</div>{{-- / .item --}}
				@endforeach
			<hr>
			<div class="total-price-bottom">
				Total de prendas: X 
				Total:  <b>$<span>{{ $activeCart['cartTotal'] }}</span></b>
			</div>
			<button id="UpdateDataBtn" type="button" class="main-btn-sm">Actualizar totales<i class="fas fa-sync-alt"></i></button>
		@else
			<div class="empty-cart">
				El carro de compras está vacío
			</div>
		@endif
		</div>
		<div class="text-right">
			<button id="SubmitDataBtn" type="button" class="main-btn-sm">Continuar <i class="fa fa-arrow-right"></i></button>
			@if(isset($activeCart) && $activeCart != null)
			@endif
		</div>
		<div class="SideContainerError side-container-error"></div>
	</div>{{-- / .inner --}}
</div> {{-- / .side-container --}}
