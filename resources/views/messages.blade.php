
@if ($errors->any())
    
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    
@endif



@if (session('status'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>
      
            {{ session('status') }}
      
    </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif



    