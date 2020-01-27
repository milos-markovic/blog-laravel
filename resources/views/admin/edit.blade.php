@extends('layouts.app')

@section('content')


<div class="container py-5">

    <div class="w-50 mx-auto">

        <h2 class="text-center dispalay-4">Update User: {{ $user->name }}</h2>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="{{ $user->password }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" id="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"

                            @if($role->name === $user->role->name)

                                {{ 'selected' }}

                            @endif
                        
                        >{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="img"></label>
                <input type="file" name="img" id="img" class="form-control-file" >
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </form>
    
    </div>

</div>


@stop