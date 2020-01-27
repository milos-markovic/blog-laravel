@extends('layouts.app')


@section('content')

    <h2>Articles of User: {{ $user->name }}</h2><br>


    {{ $articles->links() }}

    @if( count($articles) )
        <div class="card">
        
            <table class="table table-hover m-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Wrote</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td><img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="img img-thumbnail" style="width:100px; height:80px;"/></td>
                        <td>{{ $article->title }}</td>
                        <td>{{ Str::words($article->content,20) }}</td>
                        <td><strong>{{ $article->category->name }}</strong></td>
                        <td>{{ $article->user->name }}</td>
                        <td><a href="{{ route('user.articles.show',$article->id) }}">details</a></td>
                        <td><a href="{{ route('user.articles.edit',$article->id) }}" class="btn btn-primary btn-sm">Update</a></td>
                        <td>
                            <form action="{{ route('user.articles.destroy',$article->id) }}" method="POST">
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

        <h3>User doesn't have articles, create new article</h3>

    @endif

    <a href="{{ route('user.articles.create') }}" class="btn btn-primary mt-3" >Create Article</a>

@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection