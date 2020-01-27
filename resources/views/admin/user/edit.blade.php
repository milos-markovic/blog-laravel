@extends('layouts.app')


@section('content')

    <h2>Update User {{ $user->name }}:</h2>


    <form action="{{ route('admins.update',$user->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" class="form-control" value="{{ $user->password }}" >
        </div>
        <div class="form-group">
            <label for="usertype">Usertype: </label>
            <select name="usertype" id="usertype" class="form-control" >
                <option value="1"  {{ $user->usertype === 1 ? 'selected' : ''}}  >Admin</option>
                <option value="0" {{ $user->usertype === 0 ? 'selected' : ''}}  >User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="img">Pick image for upload:</label>
            <input type="file" name="img" id="img" class="form-control-file">
        </div>
        <div class="form-group">
            <input type="submit" value="Update User" class="btn btn-primary">
        </div>

    </form>

@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection