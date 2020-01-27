@extends('layouts.app')

@section('content')

    <h2 class="text-center">Details of article: {{ $article->title }}</h2><br>


    <div class="card">
        <table class="table table-hover m-0">
            <thead>
                <tr>
                    <th>Created at</th>
                    <th>Updated at</th>
                </tr>
            </thead>
            <tbody>
                <td>{{ $article->created_at }}</td>
                <td>{{ $article->updated_at }}</td>
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.article.fullArticle',$article->id) }}" class="text-decoration-none text-dark">
        <div class="card my-5">
            <div class="card-header">
                <h3 class="m-0 text-center">{{ $article->title }}</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="float-left img-thumbnail m-3" style="width:200px; height: 200px;">
                {{ Str::words($article->content,30) }}
            </div>
            <div class="card-footer d-flex">
                <span>Wrote at: <strong>{{ $article->created_at->diffForHumans() }}</strong></span>
                <span class="ml-auto">Wrote: <strong>{{ $article->user->name }}</strong></span>
            </div>
        </div>
    </a>

    @if( count($article->comments) )
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="text-center">Comments of article</h3>
            </div>
            <div class="card-body">

                <table class="table table-borderless table-hover text-center">
                    <thead>
                        <tr>
                            <th>Comment wrote</th>
                            <th>Comment</th>
                            <th>Replies</th>
                            <th></th>
                            <th></th>
                    </thead>
                    <tbody>
                        @foreach($article->comments as $comment)
                        
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    {{ ( count($comment->replies) > 0 ) ?  count($comment->replies).' '.Str::plural('Reply', count($comment->replies)) : 'No replies'  }}
                                </td>
                                <td><a href="{{ route('reply.index',$comment->id) }}">Reply</a></td>
                                <td><a href="{{ route('admin.comment.approve',$comment->id) }}" class="<?php echo ($comment->approve) ? 'btn btn-secondary btn-sm' : 'btn btn-warning btn-sm'; ?>">
                                
                                    {{ ($comment->approve) ? 'Disapprove' : 'Approve' }}
                                
                                </a></td>
                                <td>
                                    <form action="{{ route('admin.comments.destroy',$comment->id) }}" method="POST">
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
           

        </div>
    @endif

@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection