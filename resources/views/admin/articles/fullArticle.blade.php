@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
    
        <div class="col-12">
        
            <div class="card" >
                <div class="card-header">
                    <h1 class="m-0 text-center">{{ $article->title }}</h1>
                    <p class="m-0 text-right">Created: {{ $article->created_at }}</p>
                </div>
                <img src="{{ asset('img/articles/'.$article->img) }}" alt="{{ $article->title }}" class="img-fluid">
                <div class="card-body">
                    <p class="card-text">{!! $article->content !!}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <p class="m-0">category:&nbsp;  <b>{{ $article->category->name }}</b> </p>
                    <p class="m-0">Wrote:&nbsp;  <b>{{ $article->user->name }}</b></p>
                </div>
            </div>
        
        </div>


    </div>

@stop