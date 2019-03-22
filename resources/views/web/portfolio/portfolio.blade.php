@extends('layouts.web.main')

@section('title', 'Studio Vimana | Portfolio')

@section('styles')
@endsection

@section('content')
    <div id="ActualSection" data-section="portfolio"></div> {{-- JS - This Section --}}

    <div class="container-fluid dark-container-top">
        @include('web.portfolio.partials.filter')
    </div>

    <div class="container-fluid portfolio-container">

        <div class="row ">
            @if(! count($articles))
                <div class="container">
                    <h2>No se encontraron artículos</h2>
                    <hr>
                    <h4>Puede realizar una nueva búsqueda o  <a href="{{ route('web.portfolio') }}"></i> ver todos los trabajos</a></h4>
                </div>
            @endif

            @foreach($articles as $article)
            <div class="col-sm-6 col-md-4 col-lg-3 portfolio-item">
                <div class="inner">
                    {{-- <a href="{!! route('web.portfolio.article',$article->slug ) !!}"></a> --}}
                    {{-- IMAGE --}}
                    {{-- Prevents error when No image is uploaded in article --}}
                    <a href="{!! route('web.portfolio.article',$article->slug ) !!}">
                        @if (count($article->images))
                            <img src="{{ secure_asset('webimages/portfolio/'. $article->images->first()->name ) }}" class="img-responsive" alt="">
                        @else
                            <img src="{{ secure_asset('webimages/gen/genlogo.jpg') }}" class="img-responsive" alt="">
                        @endif
                    </a>

                    {{-- ARTICLE INFO --}}
                    <div class="info">
                        {{-- SLUG --}}
                        <a href="{!! route('web.portfolio.article',$article->slug ) !!}">
                            <span class="text title"> {!! $article->title !!} </span> <br>
                        </a>
                        {{-- CATEGORY --}}
                        <a href="{{ route('web.search.category', $article->category->name ) }}">
                            <span class="text cat-title">Categoría: </span><span class="text cat-text">{{ $article->category->name }}</span>
                        </a>
                        <hr>
                        <div class="bottom-content">
                            {{-- TAGS --}}
                            <div class="tags">
                                @foreach($article->tags as $tag)
                                    <a href="{{ route('web.search.tag', $tag->name ) }}">
                                        <span class="badgeHollow">{!! $tag->name !!}</span>
                                    </a>
                                @endforeach
                            </div>
                            {{-- DATE --}}
                            <div class="date">
                                <span class="text">{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            @endforeach
        </div>
        {!! $articles->render(); !!}
    </div>

@endsection


@section('scripts')
@endsection

@section('custom_js')
    <script type="text/javascript">

        $('.Show-Mobile-Filter').click(function(){
            
            var filter = $('.Fiter-Inner');

            if(filter.hasClass('Hidden')){
                filter.removeClass('Hidden');
            } else {
                filter.addClass('Hidden');
            }
        });

    </script>
@endsection




   
