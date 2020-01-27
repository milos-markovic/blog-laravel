@extends('layouts.app')

@section('content')

    <h2>Update Article: {{ $article->title }}</h2>

    <form action="{{ route('user.articles.update',$article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title: </label>
          <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content: </label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $article->content }}</textarea>
        </div>
        <div class="form-group">
            <img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="img img-thumbnail" style="width: 200px; height:150px;">
            <label for="img">Pick image for upload: </label>
            <input type="file" name="img" id="img" class="form-control">
        </div>
        <div class="form-group">
            <label for="category">Pick Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 

                        @if($article->category_id === $category->id)

                            {{ 'selected' }}

                        @endif
                    
                    >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Update article" class="btn btn-primary">
        </div>
    
    </form>

@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection