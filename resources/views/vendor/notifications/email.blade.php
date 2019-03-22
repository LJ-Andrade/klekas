@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Ups!
@else
# Hola!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Saludos ,<br>{{ APP_BUSSINESS_NAME }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Si tiene problemas con el botón "{{ $actionText }}", utilice la siguiente URL en su explorador:
[{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
