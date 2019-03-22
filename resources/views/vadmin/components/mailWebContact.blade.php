@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Contacto desde la Web
        @endcomponent
    @endslot

    Nombre: {{ $content->name }} <br />
    Teléfono: {{ $content->phone }} <br />
    E-Mail: {{ $content->email }} <br />
    Mensaje: {{ $content->message }} <br />

    @slot('subcopy')
        @component('mail::subcopy')
            <!-- subcopy here -->
        @endcomponent
    @endslot


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            Mensaje enviado desde el sistema Vadmin - <?php echo date('Y') ?>
        @endcomponent
    @endslot
@endcomponent
