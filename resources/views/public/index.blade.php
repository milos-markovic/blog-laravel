@extends('layouts.app')

@section('content')


    <section id="firstSection" class="pt-5 pb-5" style="background-color: #e1e1e1;">
        
        <div class="container">

            <h1 class="text-center">Last Articles from section</h1><br>
    
            <div class="row">
            
                <div class="col-8 " style="height: 600px;">
                
                    <a href="{{ route('public.fullArticle',$lastArticlesByCategories[0]->id) }}">
    
                        <article style="position: relative;" class="text-white">
    
                            <img src="{{ asset('img/articles/'.$lastArticlesByCategories[0]->img) }}" alt="" class="img-fluid" style="height: 600px; width: 100%;">
    
                            <div style="position: absolute; left: 20px; bottom: 20px;" class="">
    
                                <a href="{{ route('public.categoryArticles',$lastArticlesByCategories[0]->category->id) }}" class="btn btn-primary btn-lg">{{ $lastArticlesByCategories[0]->category->name }}</a>
    
                                <h3 class="my-3" style="background: rgba(0,0,0,0.5); padding: 20px; border-radius: 5px; color: yellow;">Title: {{ $lastArticlesByCategories[0]->title }}</h3>
                                <p style="background: rgba(0,0,0,0.5); padding: 10px; border-radius: 5px;">Wrote: {{ $lastArticlesByCategories[0]->user->name }}</p>
    
                            </div>
    
                        </article>
    
                    </a>                
    
                </div>
    
                <div class="col-4 d-flex flex-column justify-content-between" style="height: 600px;">
    
                    <div class="" style="height: 47%;">
    
                        <a href="{{ route('public.fullArticle',$lastArticlesByCategories[1]->id) }}" class="h-100">
    
                            <article class="h-100 text-white" style="position: relative;">
    
                                <img src="{{ asset('img/articles/'.$lastArticlesByCategories[1]->img) }}" alt="" class="h-100 w-100 img-fluid">
    
                                <div style="position: absolute; left: 20px; bottom: 5px;" class="">
    
                                    <a href="{{ route('public.categoryArticles',$lastArticlesByCategories[1]->category->id) }}" class="btn btn-lg" style="background: orange;">{{ $lastArticlesByCategories[1]->category->name }}</a>
    
                                    <h5 class="my-3" style="background: rgba(0,0,0,0.5); padding: 10px; border-radius: 5px; color: yellow;">Title: {{ $lastArticlesByCategories[1]->title }}</h5>
                                    <p style="background: rgba(0,0,0,0.5); padding: 5px; border-radius: 5px;">Wrote: {{ $lastArticlesByCategories[1]->user->name }}</p>
    
                                </div>
    
                            </article>
    
                        </a>
    
                    </div>
    
                    <div class="" style="height: 47%;">
    
                        <a href="{{ route('public.fullArticle',$lastArticlesByCategories[2]->id) }}" class="h-100">
    
                            <article class="h-100 text-white" style="position: relative;">
    
                                <img src="{{ asset('img/articles/'.$lastArticlesByCategories[2]->img) }}" alt="" class="h-100 w-100 img-fluid">
    
                                <div style="position: absolute; left: 20px; bottom: 5px;" class="">
    
                                    <a href="{{ route('public.categoryArticles',$lastArticlesByCategories[2]->category->id) }}" class="btn btn-warning btn-lg">{{ $lastArticlesByCategories[2]->category->name }}</a>
    
                                    <h5 class="my-3" style="background: rgba(0,0,0,0.5); padding: 10px; border-radius: 5px; color: yellow;">Title: {{ $lastArticlesByCategories[1]->title }}</h5>
                                    <p style="background: rgba(0,0,0,0.5); padding: 5px; border-radius: 5px;">Wrote: {{ $lastArticlesByCategories[1]->user->name }}</p>
                                    
                                </div>
    
                            </article>
    
                        </a>
    
                    </div>
    
                </div>
    
            </div>

        </div>
    
    </section>


    <section class="py-5 main_bg">

        <div class="container">

            <h2 class="text-center text-white">Music Articles</h2>

            <div class="owl-carousel mx-auto">
                
                @foreach($musicArticles as $article)
                    
                <div class="card m-3">
                    <img src="{{ asset('img/articles/'.$article->img) }}" class="card-img-top" alt="..." style="height: 200px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text text-justify">{!! Str::words($article->content,10) !!}</p>
                        <a href="{{ route('public.fullArticle',$article->id) }}" class="btn btn-outline-dark">Full Article</a>
                    </div>
                </div>

                @endforeach
            </div>

        </div>

    </section>

    <section class="py-5" style="background-color: #e1e1e1;">
    
        <div class="container">

            <h2 class="text-center mb-4">Film Articles</h2>
        
            <div class="row justify-content-center">
            
                @foreach($filmArticles as $article)
                    <div class="col-5">

                        <a href="{{ route('public.fullArticle',$article->id) }}" class="text-decoration-none text-dark">

                            <div class="card border border-secondary">
                                <div class="card-header">
                                    <h5 class="m-0 text-center">{{ $article->title }}</h5>
                                </div>
                                <div class="card-body text-dark">
                                    <div class="media">
                                        <img src="{{ asset('img/articles/'.$article->img) }}" class="mr-3 w-25 img-thumbnail rounded-circle border border-dark" alt="..." style="height: 100px;" >
                                        <div class="media-body">
                                            {!! Str::words($article->content, 10) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex">
                                    <p class="m-0">Category: {{ $article->category->name }}</p>
                                    <p class="m-0 ml-auto">Wrote: {{ $article->user->name }}</p>
                                </div>
                            </div>
                        
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    
    </section>


    <section class="main_bg py-5">

        <div class="container">

            <h2 class="text-center mb-4 text-light">Sport Articles</h2>

            <div class="owl-carousel owl-theme">

                @foreach($sportArticles as $article)
                    <div class="">
                        <div class="card m-3">
                            <img src="{{ asset('img/articles/'.$article->img) }}" class="card-img-top" alt="..." style="height: 250px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{!! Str::words($article->content,10) !!}</p>
                                <a href="{{ route('public.fullArticle',$article->id) }}" class="btn btn-outline-dark">Full Article</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                
            </div>

        </div>

    </section>


@stop


@section('footer')
    <footer class="text-center p-2 text-light" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection


@section('script')

<script>

    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            autoplay: true,
            autoplayHoverPause: true,
            items: 3,
            nav: true,
            dots: true,
            loop: true,
        });
    });

</script>


@stop





