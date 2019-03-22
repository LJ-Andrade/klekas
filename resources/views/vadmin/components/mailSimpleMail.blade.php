@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ APP_BUSSINESS_NAME }} Indumentaria
        @endcomponent
    @endslot

    #<center>{{ $data }}</center>

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
