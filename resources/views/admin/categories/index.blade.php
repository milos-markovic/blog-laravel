@extends('layouts.app')


@section('content')

    <h1>Categories: </h1><br>


    <div class="row justify-content-between">
    
        <div class="col-5">
        
            <div class="card">

                <table class="table table-hover m-0 text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-primary btn-sm">Update</a></td>
                            <td>
                                <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">
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
        
        </div>
    
        <div class="col-7">
        
            <form action="{{ route('admin.categories.store') }}" method="POST" class="form-inline">
                @csrf
                <div class="form-group mr-2">
                    <label for="name">Name:</label>&nbsp;
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name of category">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create Category">
                </div>
            </form>
        
        </div>

    </div>


@stop

@section('footer')
    <footer class="text-center p-2 fixed-bottom" style="border-top: 1px solid black;">
        <p class="m-0">Napravio: Miloš Marković</p>
    </footer>
@endsection