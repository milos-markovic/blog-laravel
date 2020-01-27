@extends('layouts.app')


@section('content')

    <h2>Details of article: {{ $article->title }}</h2>


    <div class="card my-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Created at</th>
                    <th>Updated at</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('user.article.fullArticle',$article->id) }}" class="text-decoration-none text-dark">

        <div class="card">
            <div class="card-header text-center">
                <h3 class="m-0">{{ $article->title }}</h3>
            </div>
            <div class="card-body">
            
                <div class="row">
                
                    <div class="col-4">
                    
                        <img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="img-fluid img-thumbnail">

                    </div>
                
                    <div class="col-8">
                    
                        {{ Str::words($article->content, 30) }}

                    </div>

                </div>

            </div>
            <div class="card-footer d-flex justify-content-between">
            
                <div>Wrote at: <b>{{ $article->created_at->diffForHumans() }}</b></div>
                <div>Wrote: <b>{{ $article->user->name }}</b></div>

            </div>
        </div>

    </a>


    @if( count($article->comments) )

        <div class="card my-5">

            <div class="card-header">
                Comments of Article
            </div>
            <div class="card-body">

                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Comment wrote</th>
                            <th>Comment</th>
                            <th>Replies</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($article->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                {{ ( count($comment->replies) > 0 ) ?  count($comment->replies).' '.Str::plural('Reply', count($comment->replies)) : 'No replies'  }}
                            </td>
                            <td><a href="{{ route('user.reply.index',$comment->id) }}">Reply</a></td>
                            <td>
                                <a href="{{ route('user.comment.approve',$comment->id) }}" class="<?php echo ($comment->approve) ? 'btn btn-secondary btn-sm' : 'btn btn-warning btn-sm'; ?>">
                                
                                    {{ ($comment->approve) ? 'Disapprove' : 'Approve' }}
                                
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('user.comments.destroy',$comment->id) }}" method="POST">
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