<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Article;
use App\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::orderBy('id','DESC')->paginate(10);

        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view( 'admin.articles.create',compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'img' => 'required',
            'category_id' => 'required',
        ]);

        $file = $request->img;
        $imgName = $file->getClientOriginalName();

        if( $file->storeAs('img/articles',$imgName) ){

            $validatedData['img'] = $imgName;
            $validatedData['user_id'] = Auth::user()->id;

            $createArticle = Article::create($validatedData);

            return redirect()->route('admin.articles.index')->with('status','New article is created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.details',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
       // dd($article);

        $categories = Category::all();

        return view('admin.articles.edit',compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        if($request->hasFile('img')){

            if( file_exists(public_path().'/img/articles/'.$article->img) ){
                unlink( public_path().'/img/articles/'.$article->img );
            }

            $file = $request->img;
            $imgName = $file->getClientOriginalName();

            if( $file->storeAs('img/articles',$imgName) ){

                $validatedData['img'] = $imgName;
 
            }
        }

        $updateArticle = $article->update($validatedData);

        return redirect()->route('admin.articles.index')->with('status','Article is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if( file_exists(public_path().'/img/articles/'.$article->img) ){
            unlink( public_path().'/img/articles/'.$article->img );
        }

        $deleteArticle = $article->delete();

        return redirect()->route('admin.articles.index')->with('status','Article is deleted');
    }

    public function fullArticle(Article $article){

        return view('admin.articles.fullArticle',compact('article'));
    }

    public function searchArticle(Request $request){

      //  var_dump($request->all());
        $title = $request->search;

        $articles = Article::where('title','Like','%'.$title.'%')->get();

        return view('admin.articles.searchArticle',compact('articles'));
    }

    public function approve(Article $article){

        if($article->approve === 1){
            $article->approve = 0;
        }else{
            $article->approve = 1;
        }

        $article->save();

        return redirect()->back()->with('status','Status of article has been changed');
    }
}
