@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ APP_BUSSINESS_NAME }} Indumentaria
        @endcomponent
    @endslot

#<center>Hemos recibido tu compra</center>
###<center> Nos pondremos en contacto a la brevedad</center>

#<center> Muchas gracias !</center>

    @slot('subcopy')
        @component('mail::subcopy')
            <!-- subcopy here -->
        @endcomponent
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
        Mensaje enviado desde <b>Vadmin</b> | Desarrollado por <a href="https://vimana.studio/es">Vimana Studio</a>
        @endcomponent
    @endslot
@endcomponent
