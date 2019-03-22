@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ APP_BUSSINESS_NAME }} Indumentaria
        @endcomponent
    @endslot
    
# Nueva Compra Recibida
---
**Cliente: ** {{ $data->customer->name .' '.$data->customer->surname }} ({{  $data->customer->username }}) <br>
**E-Mail: ** {{ $data->customer->email }} <br>
**Teléfono: ** {{ $data->customer->phone }} @if($data->customer->phone2 != 's') | Teléfono 2: {{ $data->customer->phone2 }} @endif <br>
**Dirección: ** {{ $data->customer->address }} <br>
{{ $data->customer->geoprov->name }} | {{ $data->customer->geoloc->name }} (C.p.: {{ $data->customer->cp }}) <br>


    @slot('subcopy')
        @component('mail::subcopy')
            <!-- subcopy here -->
        @endcomponent
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
        Mensaje enviado desde <b>Vadmin</b> | Desarrollado por <a href="https://vimana.studio">Vimana Studio</a>
        @endcomponent
    @endslot
@endcomponent
