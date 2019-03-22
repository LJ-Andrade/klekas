@extends('vadmin.partials.invoice')

@section('title', 'Items del Catálogo')

@section('table-titles')
    <th>Cód.</th>
    <th>Título</th>
    <th>Stock</th>
    <th>Precio Min.</th>
    <th>Precio May.</th>
    <th>Categoría</th>
@endsection

@section('table-content')
    @foreach($items as $item)
    <tr>
        <td class="w-50">#{{ $item->code }}</td>
        <td class="max-text">{{ $item->name }}</td>
        {{--  STOCK  --}}
        <td>
            @if($item->stock > $item->stockmin)
                <div class="center">{{ $item->stock }}</div>
            @else
                <div class="center highlight">{{ $item->stock }}</div>
            @endif
        </td>
        {{-- Standard Price --}}
        <td>
            @if($item->discount > '0')
            <span class="Extra-Data"> $ {{ calcValuePercentNeg($item->price, $item->discount) + 0 }}</span>
            <span class="Extra-Data">(%</span><span class="DisplayDiscountData">{{ $item->discount }})</span>
            @else
                <span class="Extra-Data">$ </span><span class="DisplayPriceData">{{ $item->price + 0}}</span>
            @endif
        </td>
        {{-- Reseller Price --}}
        <td>
            @if($item->reseller_discount > '0')
            <span class="Extra-Data"> $ {{ calcValuePercentNeg($item->reseller_price, $item->reseller_discount) + 0 }}</span>
            <span class="Extra-Data">(%</span><span class="DisplayDiscountData">{{ $item->reseller_discount }})</span>
            @else
                <span class="Extra-Data">$ </span><span class="DisplayPriceData">{{ $item->reseller_price + 0}}</span>
            @endif    
        </td>
        {{--  DATE   --}}
        <td class="w-200">{{ $item->category->name }}</td>		
    </tr>
    @endforeach			
@endsection