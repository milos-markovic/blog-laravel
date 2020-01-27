@extends('layouts.app')

@section('content')

    <h2>Update Category: {{ $category->name }}</h2><br>

    <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="category">Category: </label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    
    </form>

@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection