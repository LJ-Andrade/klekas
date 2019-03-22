@extends('vadmin.partials.invoice')

@section('title', 'Listado de Usuarios')

@section('table-titles')
    <th>Cód.</th>
    <th>Nombre</th>
    <th>E-Mail</th>
@endsection

@section('table-content')
    @foreach($items as $item)
    <tr>
        <td class="w-50">#{{ $item->id }}</td>
        <td class="max-text">{{ $item->name }}</td>
        <td class="">{{ $item->email }}</td>    
    </tr>
    @endforeach			
@endsection