@extends('layouts.app')


@section('content')

    <h2>User: {{ $user->name }}</h2><br>

    <div class="card">
    
        <table class="table table-hover m-0">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Usertype</th>
            </thead>
            <tbody>
                <tr>
                    <td><img src="{{ asset('img/users/'.$user->img) }}" style="width:80px; height:80px;"/></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><strong>{{ ( $user->usertype === 0 ) ? 'User' : '' }}</strong></td>
                </tr>
            </tbody>
        </table>
    
    </div>


@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection