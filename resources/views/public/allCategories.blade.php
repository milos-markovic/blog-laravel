@extends('layouts.app')


@section('content')

<section>

    <div class="container my-5">
    
        <div class="row">

            <div class="col-2">
            
                <div class="list-group">
                    @foreach($categories as $category)

                        <a href="{{ route('public.categoryArticles',$category->id) }}" class="list-group-item list-group-item-action text-center text-primary">{{ $category->name }}</a>

                    @endforeach
                </div>
            
            </div>

            <div class="col-10">

                <div class="d-flex mb-3">
                    <form action="" class="form-inline ml-auto">
                        <label for="search">Search Article:</label>
                        <input type="text" name="search" id="search" class="form-control ml-2" placeholder="Search article by Title">
                    </form>
                </div>
            
                <h1 class="text-center">All Articles:</h1>

                <div id="articles">
                
                    @foreach($articles as $article)

                        @if( $article->approve === 1)
                            <a href="{{ route('public.fullArticle',$article->id) }}" class="text-decoration-none text-dark">
                                <div class="card my-5 " style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <div class="card-header text-center" >
                                        <h2 class="m-0" style="color: #003366; font-weight: 600;">{{ $article->title }}</h2>
                                        <p class="m-0">Created at: {{ $article->created_at }}</p>
                                    </div>

                                    <div class="card-body">
                                        
                                        <div class="row">
                                        
                                            <div class="col-5">
                                            
                                                <img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="img-fluid img-thumbnail" style="height: 300px; width: 100%;">
                                            
                                            </div>

                                            <div class="col-7">
                                            
                                                <p>{!! Str::words($article->content, 30) !!}</p>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-footer text-right d-flex text-dark" >
                                        <p class="m-0">
                                            <span class="mr-4">Category: <b>{{ $article->category->name }}</b></span>
                                            <span> Comments: <b>{{ ( count($article->comments) ) ? count($article->comments).' '. Str::plural('comment', count($article->comments)) : 'No comments' }}</b></span>
                                        </p>
                                        <p class="ml-auto m-0">Wrote: <b>{{ $article->user->name }}</b></p>
                                    </div>
                                </div>
                            </a>
                            <hr>
                        @endif


                    @endforeach
                
                
                    {{ $articles->links() }}
                
                </div>

            </div>    
        
        </div>

    </div>

</section>


@stop


@section('footer')
    <footer class="text-center p-2 " style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection


@section('ajax')

    <script>
    
        let search = $("#search");

        let articles = $("#articles");

        search.on('keyup',function(e){

            e.preventDefault();

            let search_input = $(this).val();

            $.ajax({

                url: 'http://localhost/blog/public/articles/searchArticle',
                method: 'GET',
                data: {search: search_input}

            }).done(function(res){

                articles.html( res );

            });

        });  
    
    </script>

@stop