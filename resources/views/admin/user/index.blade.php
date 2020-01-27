@extends('layouts.app')


@section('content')

    <h1>Users: </h1><br>

    @if( count($users) )

        <div class="card">
            <table class="table table-hover m-0">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Usertype</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                        <td><img src="{{ asset('img/users/'.$user->img) }}" class="img img-thumbnail" style="width: 80px; height: 80px;" /></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><strong>{{ ( $user->usertype == 1 ) ? 'Admin' : 'User' }}</strong></td>
                            <td><a href="{{ route('admins.edit',$user->id) }}" class="btn btn-primary btn-sm">Update</a></td>
                            <td>
                                <form action="{{ route('admins.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @else

        <h2>Create new User:</h2>

    @endif

    <a href="{{ route('admins.create') }}" class="btn btn-primary mt-4">Create User</a>

@stop


@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection