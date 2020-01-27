@extends('layouts.app')


@section('content')

    <h1>Comments:</h1><br>

    @if( count($comments) )
        <div class="card">
            <table class="table table-hover m-0 text-center">
                <thead>
                    <tr>
                        <th>Comment wrote</th>
                        <th>Text of comment</th>
                        <th>Comment to Article</th>
                        <th>Replies</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <b>{{ $comment->article->title }}</b><br>
                            Wrote by:&nbsp; {{ $comment->article->user->name }}
                        </td>
                        <td>
                            {{ ( count($comment->replies) > 0 ) ?  count($comment->replies).' '.Str::plural('Reply', count($comment->replies)) : 'No replies'  }}
                        </td>
                        <td>
                            <a href="{{ route('reply.index',$comment->id) }}">Reply</a>
                        </td>
                        <td><a href="{{ route('admin.comment.approve',$comment->id) }}" class="<?php echo ($comment->approve) ? 'btn btn-info btn-sm' : 'btn btn-warning btn-sm' ;?>">
                        
                            {{ ($comment->approve) ? 'Desapprove' : 'Approve' }}
                        
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
    @else

        <h3>Articles doesn't have comments</h3>

    @endif


@stop


@section('footer')
    <footer class="text-center p-2 fixed-bottom text-white" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection