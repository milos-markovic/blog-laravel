@extends('layouts.app')


@section('content')


    <div class="d-flex">
        <form action="" class="form-inline ml-auto">
            <label for="search">Search Article: </label>
            <input type="text" name="search" id="search" class="form-control ml-3" placeholder="Search article by Title">
        </form>
    </div>

    <h1>Articles:</h1><br>


    <div id="articles">

        {{ $articles->links() }}

        @if( count($articles) )
            <div class="card">
            
                <table class="table table-hover m-0 display" id="myTable">
                    <thead>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Wrote</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td><img src="{{ asset('img/articles/'.$article->img) }}" class="img img-thumbnail" style="width: 120px; height: 80px;" /></td>
                            <td>{{ $article->title }}</td>
                            <td>{!! Str::words($article->content,5) !!}</td>
                            <td><strong>{{ $article->category->name }}</strong></td>
                            <td>{{ $article->user->name }}</td>
                            <td>
                                <a href="{{ route('admin.article.approve',$article->id) }}" class="<?php echo ($article->approve === 0) ? 'btn btn-warning btn-sm' : 'btn btn-secondary btn-sm' ;?>">
                                    {{ ( $article->approve === 0 ) ? 'Approve' : 'Desapprove' }}
                                </a>
                            </td>
                            <td><a href="{{ route('admin.articles.show',$article->id) }}">Details</a></td>
                            <td><a href="{{ route('admin.articles.edit',$article->id) }}" class="btn btn-primary btn-sm">Update</a></td>
                            <td>
                                <form action="{{ route('admin.articles.destroy',$article->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        @else

            <h3>Create new Article</h3>

        @endif
    
    </div>

    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mt-4 mb-4">Create Article</a>

@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection



@section('ajax')

    <script>
        $(document).ready(function(){

            let search = $("#search");
            let articles = $("#articles");

            search.on('keyup',function(){

                let input_value = $(this).val();

                $.ajax({
                    url: 'http://localhost/blog/public/admin/article/serachArticle',
                    method: 'GET',
                    data: {search: input_value}
                }).done(function(res){

                    articles.html( res );

                });

            });

        });
    
    </script>

@stop


