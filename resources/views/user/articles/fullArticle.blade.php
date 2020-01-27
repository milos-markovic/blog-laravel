@extends('layouts.app')


@section('content')



    <div class="card">
        <div class="card-header">
            <h2 class="text-center">{{ $article->title }}</h2>
            <div class="text-right">Created: {{ $article->created_at }}</div>
        </div>
        <img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="img-fluid">
        <div class="card-body">

            {{ $article->content }}

        </div>
        <div class="card-footer d-flex justify-content-between">
            <div>Category:&nbsp; <b>{{ $article->category->name }}</b></div>
            <div>Wrote:&nbsp; <b>{{ $article->user->name }}</b></div>
        </div>
    </div>

@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection