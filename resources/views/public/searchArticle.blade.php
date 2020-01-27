

@foreach($articles as $article)

    <a href="{{ route('public.fullArticle',$article->id) }}" class="text-decoration-none text-dark">
        <div class="card my-5" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-header text-center">
                <h2 class="m-0" style="color: #003366; font-weight: 600;">{{ $article->title }}</h2>
                <p class="m-0">Created at: {{ $article->created_at }}</p>
            </div>

            <div class="card-body">
                
                <div class="row">
                
                    <div class="col-5">
                    
                        <img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="img-fluid img-thumbnail" style="height: 300px; width: 100%;">
                    
                    </div>

                    <div class="col-7">
                    
                        <p>{{ Str::words($article->content, 30) }}</p>

                    </div>

                </div>

            </div>

            <div class="card-footer text-right d-flex">
                <p class="m-0">
                    <span class="mr-4">Category: <b>{{ $article->category->name }}</b></span>
                    <span> Comments: <b>{{ ( count($article->comments) ) ? count($article->comments).' '. Str::plural('comment', count($article->comments)) : 'No comments' }}</b></span>
                </p>
                <p class="ml-auto m-0">Wrote: <b>{{ $article->user->name }}</b></p>
            </div>
        </div>
    </a>

@endforeach
