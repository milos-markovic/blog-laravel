<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Category;
use App\Article;

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
        $articles = Auth::user()->articles()->paginate(10);
        $user = Auth::user();

        return view('user.articles.index',compact('articles','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('user.articles.create',compact('categories'));
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

            return redirect()->route('user.articles.index')->with('status','New article is created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Article $article )
    {
        return view('user.articles.details',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('user.articles.edit',compact('article','categories'));
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

        return redirect()->route('user.articles.index')->with('status','Article is updated');
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

        return redirect()->route('user.articles.index')->with('status','Article is deleted');
    }

    public function fullArticle(Article $article){

        
        return view('user.articles.fullArticle',compact('article'));
    }
}
