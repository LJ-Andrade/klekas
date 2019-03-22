@extends('vadmin.partials.invoice-excel')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Cód.</th>
                <th>Nombre</th>
                <th>E-Mail</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <td class="w-50">#{{ $item->id }}</td>
            <td class="max-text">{{ $item->name }}</td>
            <td class="">{{ $item->email }}</td>    
        </tr>
        @endforeach			
        </tbody>
    </table>
@endsection