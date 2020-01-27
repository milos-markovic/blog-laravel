@extends('layouts.app')


@section('content')

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Welcome to admin section!</h1>
            
        </div>
    </div>
    

    <div class="row my-5 justify-content-center">

        <div class="col-3 mb-5">
            <a href="{{ route('user.articles.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center bg-primary">
                    <div class="card-header">
                        <h5 class="m-0">Articles</h5>
                    </div>
                    <div class="card-body">
                        <span>{{ ( count($articles) > 0 ) ?  count($articles).' '.Str::plural('Article', count($articles)) : '0'  }}</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 mb-5">
            <a href="{{ route('user.comments.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center bg-warning ">
                    <div class="card-header">
                        <h5 class="m-0">Comments</h5>
                    </div>
                    <div class="card-body">
                        {{ ( count($comments) > 0 ) ?  count($comments).' '.Str::plural('Comment', count($comments)) : '0'  }}
                    </div>
                </div>
            </a>
        </div>

    </div>

@stop


@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection