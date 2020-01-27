@extends('layouts.app')


@section('content')

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Welcome to admin section!</h1>
            
        </div>
    </div>
    

    <div class="row my-5">

        <div class="col-3 mb-5">
            <a href="{{ route('admins.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center bg-primary">
                    <div class="card-header">
                        <h5 class="m-0">Users</h5>
                    </div>
                    <div class="card-body">
                        <span>{{ ( count($users) > 0 ) ?  count($users).' '.Str::plural('User', count($users)) : '0'  }}</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 mb-5">
            <a href="{{ route('admin.articles.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center bg-warning ">
                    <div class="card-header">
                        <h5 class="m-0">Articles</h5>
                    </div>
                    <div class="card-body">
                        {{ ( count($articles) > 0 ) ?  count($articles).' '.Str::plural('Article', count($articles)) : '0'  }}
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 mb-5">
            <a href="{{ route('admin.categories.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center bg-success">
                    <div class="card-header">
                        <h5 class="m-0">Categories</h5>
                    </div>
                    <div class="card-body">
                        {{ ( count($categories) > 0 ) ?  count($categories).' '.Str::plural('Category', count($categories)) : '0'  }}
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3 mb-5">
            <a href="{{ route('admin.comments.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center" style="background: orange;">
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