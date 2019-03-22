@extends('errors.main')
@section('title')
  {{ APP_BUSSINESS_NAME }}
@endsection

@section('content')
    <div class="container-fluid error-page">
        <div class="row inner">
            <h1>UPS !</h1>
            <p>La página que está buscando no existe</p>
            <hr class="softhr">
            {{-- <a href="{{ url('/') }}"><button class="btn">Volver al inicio</button></a> --}}
            <a href="{{ url('/') }}"><button class="btn">Volver al inicio</button></button></a>
        </div>
    </div>
@endsection
