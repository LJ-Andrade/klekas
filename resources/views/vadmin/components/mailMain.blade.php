@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Sistema VADMIN
        @endcomponent
    @endslot

    Nombre: {{ $content['fullname']}}<br>
    E-Mail: {{ $content['email']}}<br>
    Teléfono: {{ $content['contact']}}<br>
    Mensaje: {{ $content['comment']}}<br>

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
