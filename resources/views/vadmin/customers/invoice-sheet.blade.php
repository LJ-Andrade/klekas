@extends('vadmin.partials.invoice-excel')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Cód.</th>
            <th>Nombre y Apellido</th>
            <th>Tipo de Cliente</th>
            <th>E-Mail</th>
            <th>CUIT</th>
            <th>Dirección</th>
            <th>Provincia</th>
            <th>Localidad</th>
            <th>C.P.</th>
            <th>Teléfono</th>
            <th>Teléfono</th>
            <th>Compras Realizadas</th>
            <th>Prendas Compradas</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
    <tr>
        <td class="w-50">#{{ $item->id }}</td>
        <td class="max-text">{{ $item->name }} {{ $item->surname }}</td>
        <td>{{ groupTrd($item->group) }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->cuit }}</td>
        <td>{{ $item->address }}</td>
        <td>{{ $item->geoprov['name'] }}</td>
        <td>{{ $item->geoloc['name'] }}</td>
        <td>{{$item->cp }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ $item->phone2 }}</td>
        <td>@if($item->staticstics('totalCarts') != 0) {{ $item->staticstics('totalCarts') }} @endif</td>
        <td>@if($item->staticstics('totalItems') != 0) {{ $item->staticstics('totalItems') }} @endif</td>
        <td>@if($item->staticstics('totalSpent') != 0) ${{ $item->staticstics('totalSpent') }} @endif</td>
    </tr>
    @endforeach			
    </tbody>
</table>
@endsection