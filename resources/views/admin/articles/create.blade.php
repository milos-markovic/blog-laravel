@extends('layouts.app')

@section('content')

    <h2>Create Article</h2>

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Title: </label>
          <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Content: </label>
            <textarea name="content" id="mytextarea" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="img">Pick image for upload: </label>
            <input type="file" name="img" class="form-control">
        </div>
        <div class="form-group">
            <label for="category">Pick Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="New article" class="btn btn-primary">
        </div>
    
    </form>

@stop

@section('script')

    <script type="text/javascript">
        $(document).ready(function(){
            tinymce.init({
                selector: '#mytextarea'
            });
        });
    </script>

@stop


