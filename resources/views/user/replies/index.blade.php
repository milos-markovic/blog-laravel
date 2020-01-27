@extends('layouts.app')


@section('content')

    <blockquote class="blockquote text-right">
        <h3 class="mb-0">Article name: {{ $comment->article->title }}</h3>
        <footer class="blockquote-footer">Article wrote: <cite title="Source Title">{{ $comment->article->user->name }}</cite></footer>
    </blockquote>

    <blockquote class="blockquote text-left">
        <h1 class="mb-0">Comment: {{ $comment->comment }}</h1>
        <footer class="blockquote-footer">Comment wrote: <cite title="Source Title">{{ $comment->name }}</cite></footer>
    </blockquote>

    @if( count($comment->replies) )
        <div class="card my-5 border border-secondary">
        
            <div class="card-header d-flex align-items-center">

                <img src="{{ asset('img/users/'.Auth::user()->img) }}" alt="user_img" class="img-fluid rounded-circle mr-4" style="width: 60px; height:60px; "> 
                <h2>My responses to the comment</h2>          

            </div>
            <div class="card-body">
            
                @foreach($comment->replies as $reply)

                    <div class="row align-items-center my-2">
                     
                        <div class="col-4">
                        
                            {{ $reply->reply }}

                        </div>
                        <div class="col-3">
                        
                            <div class="d-flex">

                                <a href="{{ route('user.reply.approve',$reply->id) }}" class="<?php echo ($reply->approve) ? 'btn btn-outline-secondary' : 'btn btn-outline-warning' ;?> mr-2">
                                
                                    {{ ($reply->approve) ? 'Disapprove' : 'Approve' }}

                                </a>
                                <form action="{{ route('user.reply.destroy',[$comment->id,$reply->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Delete" class="btn btn-outline-danger">
                                </form>
                            
                            </div>

                        </div>
                
                    </div>

                @endforeach

            </div>
        
        </div>
    @endif


    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
        Reply
    </button>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <form action="{{ route('user.reply.store',$comment->id) }}" method="POST">
        @csrf

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Text of Reply</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

            <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Reply</button>
        </div>
      
      </form>

    </div>
  </div>
</div>

@stop