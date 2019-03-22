@extends('vadmin.partials.invoice')

@section('title', 'Listado de Clientes')

@section('table-titles')
    <th>Cód.</th>
    <th>Nombre y Apellido</th>
    <th>E-Mail</th>
    <th>Dirección</th>
    <th>Prov / Loc</th>
    <th>Teléfonos</th>
    <th>Compras</th>
    <th>Prendas</th>
    <th>Valor</th>
@endsection

@section('table-content')
    @foreach($items as $item)
    <tr>
        <td class="w-50">#{{ $item->id }}</td>
        <td class="max-text">{{ $item->name }} {{ $item->surname }}<br>({{ groupTrd($item->group) }}) <br>{{ $item->cuit }}</td>
        <td>{{ $item->email }}</td>
        <td>@if($item->address != '') {{ $item->address }} <br>({{$item->cp }}) @endif</td>
        <td>@if($item->geoprov['name'] != '') {{ $item->geoprov['name'] }} <br>({{ $item->geoloc['name'] }}) @endif</td>
        <td>{{ $item->phone }} <br> {{ $item->phone2 }}</td>
        <td>@if($item->staticstics('totalCarts') != 0) {{ $item->staticstics('totalCarts') }} @endif</td>
        <td>@if($item->staticstics('totalItems') != 0) {{ $item->staticstics('totalItems') }} @endif</td>
        <td>@if($item->staticstics('totalSpent') != 0) ${{ $item->staticstics('totalSpent') }} @endif</td>
    </tr>
    @endforeach			
@endsection