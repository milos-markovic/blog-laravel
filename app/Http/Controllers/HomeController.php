<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminIndex(){

        $articles = \App\Article::all();
        $users = \App\User::all();
        $comments = \App\Comment::all();
        $replies = \App\CommentReply::all();
        $categories = \App\Category::all();

        return view('admin.index',compact('articles','users','comments','replies','categories'));
    }

    public function userIndex(){
        
        $articles = Auth::user()->articles;


        $comments = collect();

        foreach($articles as $article){

           if ($article->comments()->first() !== NULL){

                $comments[] = $article->comments()->first();
           }
        }
        
        return view('user.index',compact('articles','comments'));
    }
}
