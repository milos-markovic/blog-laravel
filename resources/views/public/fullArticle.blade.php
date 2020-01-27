@extends('layouts.app')

@section('content')

<section>

    <div class="container my-5">
    
        <article class="mb-5">
            <div class="row justify-content-center">
                
                <div class="col-8">
                
                    <div class="card" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-header">
                            <h1 class="m-0 text-center" style="color: #003366; font-weight: 600;">{{ $article->title }}</h1>
                            <p class="m-0 text-right">Created: {{ $article->created_at }}</p>
                        </div>
                        <img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="img-fluid" style="height: 600px;">
                        <div class="card-body">
                            <p class="card-text">{!! $article->content !!}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p class="m-0">category:&nbsp;  <b>{{ $article->category->name }}</b> </p>
                            <p class="m-0">Wrote:&nbsp;  <b>{{ $article->user->name }}</b></p>
                        </div>
                    </div>
                
                    <div class="d-flex">
                        <a href="" class="ml-auto btn btn-dark btn-sm" style="position:relative; top:35px;" id="btn_comments">Hide Comments</a>
                    </div>
                    

                    @if( count($article->comments()->where('approve',1)->get() ) )
                        <div class="card my-5" id="comments">

                            <div class="card-header">
                                <h5 class="m-0"><i class="fas fa-comments"></i>&nbsp;  Comments</h5>
                            </div>    
                            <div class="card-body">
                            
                                @foreach($article->comments as $comment)

                                    @if( $comment->approve )
                                        <div class="media mb-2">
                                            <img src="https://via.placeholder.com/50" class="mr-3" alt="...">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $comment->name }}</h5>
                                                {{ $comment->comment }}

                                                @if( count($comment->replies) )
                                                    @foreach( $comment->replies as $reply )

                                                        @if($reply->approve)
                                                            <div class="media mt-3">
                                                                <a class="mr-3" href="#">
                                                                    <img src="{{ asset('img/users/'.$reply->user->img) }}" class="mr-3" alt="{{ $reply->user->name }}" style="width: 50px; height: 50px;">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h5 class="mt-0">{{ $reply->user->name }}</h5>
                                                                    {{ $reply->reply }}
                                                                </div>
                                                            </div>
                                                        @endif

                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                                                
                            </div>
                        </div>
                    @endif

                    <div class="card border border-secondary mt-5">
                        <div class="card-header">
                            <h5 class="m-0"><i class="fas fa-comment-dots"></i>&nbsp; Create Comment</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.comments.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="article_id" value="{{ $article->id }}">

                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Your name">   
                                </div>
                                <div class="form-group">
                                    <textarea name="comment" id="" cols="30" rows="5" class="form-control" placeholder="Your comment"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" value="Insert Comment" class="btn btn-primary">                        
                                </div>
                            
                            </form>
                        </div>
                    </div>


                </div>
            
            </div>

        </article>
    
    </div>

</section>



@stop



@section('footer')
    <footer class="text-center p-2 " style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection


@section('script')

    <script>
    
        $(document).ready(function(){

            let btn_comments = $("#btn_comments");
            let comments = $("#comments");            

            btn_comments.on('click',function(e){

                e.preventDefault();

                if( this.text === 'Hide Comments' ){

                    $(this).text('Show Comments');
                    comments.hide();

                }else{
                    $(this).text('Hide Comments');
                    comments.show();
                }
                
            
            });

        });
    
    </script>

@stop