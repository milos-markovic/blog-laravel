
@if( count($articles) )
        <div class="card">
        
            <table class="table table-hover m-0 display" id="myTable">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Category</th>
                    <th>Wrote</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td><img src="{{ asset('img/articles/'.$article->img) }}" class="img img-thumbnail" style="width: 120px; height: 80px;" /></td>
                        <td>{{ $article->title }}</td>
                        <td>{!! Str::words($article->content,15) !!}</td>
                        <td><strong>{{ $article->category->name }}</strong></td>
                        <td>{{ $article->user->name }}</td>
                        <td><a href="{{ route('admin.articles.show',$article->id) }}">Details</a></td>
                        <td><a href="{{ route('admin.articles.edit',$article->id) }}" class="btn btn-primary btn-sm">Update</a></td>
                        <td>
                            <form action="{{ route('admin.articles.destroy',$article->id) }}" method="POST">
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

        <h3>Create new Article</h3>

    @endif