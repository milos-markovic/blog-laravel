@extends('layouts.app')


@section('content')

    <h2>Create New User:</h2>

    <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="usertype">Usertype: </label>
            <select name="usertype" id="usertype" class="form-control">
                <option value="1">Admin</option>
                <option value="0">User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="img">Pick image for upload:</label>
            <input type="file" name="img" id="img" class="form-control-file">
        </div>
        <div class="form-group">
            <input type="submit" value="Create User" class="btn btn-primary">
        </div>

    </form>

@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection